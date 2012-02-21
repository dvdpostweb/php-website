<?php

//
// $Id: test.php 1343 2008-07-08 21:28:20Z shodan $
//
require ( "sphinxapi.php" );

//////////////////////
// parse command line
//////////////////////

// for very old PHP versions, like at my home test server
// search mots à rechercher
// type = champs de recherche dans un index ( champs d'une table)
// index choisir l'index de recherche ... (*= all actors, products,products_adult )
// argv argument speciaux
function replace_ponctuation($search,$tab){
	for($i=0;$i<count($tab);$i++)
	{
		
		$search=str_replace(' '.$tab[$i].' ',' ',$search);
		if(strpos($search,($tab[$i].' '))===0)
		{
			$search=substr($search,strlen($tab[$i])+1,strlen($search));
		}
	}
	return $search;
}
function search ($search,$type,$index,$argv,$verbose )
{ 
	$tab=array('&','et','and','ou','or','le','la','the','les','des');
	$search=replace_ponctuation($search,$tab);


	$search=str_replace('-' ,' ',$search);
	$search=str_replace("'" ," ",$search);
	$search=str_replace(' ','* *',$search);
	$search='*'.$search.'*';	
	$_SERVER["argv"] = $argv;
	$args = array();
	$error='';
	$query='';
	$result='';
	$is_error=false;
	$limit=200;
	$list="-1";
	
	foreach ( $_SERVER["argv"] as $arg )
		$args[] = $arg;
	
	$mode = SPH_MATCH_EXTENDED2;
	$host = SPHINX_HOST;
	$port = 3312;
	$groupby = "";
	//$groupsort = "@group desc";
	//$filter = "group_id";
	$filtervals = array();
	$distinct = "";
	$sortby = "";
	
	$offset=0;
	$ranker = SPH_RANK_PROXIMITY_BM25;
	for ( $i=0; $i<count($args); $i++ )
	{
		$arg = $args[$i];

		if ( $arg=="-h" || $arg=="--host" )				$host = $args[++$i];
		else if ( $arg=="-p" || $arg=="--port" )		$port = (int)$args[++$i];
		else if ( $arg=="-i" || $arg=="--index" )		$index = $args[++$i];
		else if ( $arg=="-s" || $arg=="--sortby" )		{ $sortby = $args[++$i]; $sortexpr = ""; }
		else if ( $arg=="-S" || $arg=="--sortexpr" )	{ $sortexpr = $args[++$i]; $sortby = ""; }
		else if ( $arg=="-a" || $arg=="--any" )			$mode = SPH_MATCH_ANY;
		else if ( $arg=="-b" || $arg=="--boolean" )		$mode = SPH_MATCH_BOOLEAN;
		else if ( $arg=="-e" || $arg=="--extended" )	$mode = SPH_MATCH_EXTENDED;
		else if ( $arg=="-e2" )							$mode = SPH_MATCH_EXTENDED2;
		else if ( $arg=="-ph"|| $arg=="--phrase" )		$mode = SPH_MATCH_PHRASE;
		else if ( $arg=="-f" || $arg=="--filter" )		$filter = $args[++$i];
		else if ( $arg=="-v" || $arg=="--value" )		$filtervals[] = $args[++$i];
		else if ( $arg=="-g" || $arg=="--groupby" )		$groupby = $args[++$i];
		else if ( $arg=="-gs"|| $arg=="--groupsort" )	$groupsort = $args[++$i];
		else if ( $arg=="-d" || $arg=="--distinct" )	$distinct = $args[++$i];
		else if ( $arg=="-l" || $arg=="--limit" )		$limit = (int)$args[++$i];
		else if ( $arg=="-r" )
		{
			$arg = strtolower($args[++$i]);
			if ( $arg=="bm25" )		$ranker = SPH_RANK_BM25;
			if ( $arg=="none" )		$ranker = SPH_RANK_NONE;
			if ( $arg=="wordcount" )$ranker = SPH_RANK_WORDCOUNT;
		}
		else
			$search .= $args[$i] . " ";
	}

	////////////
	// do query
	////////////

	$cl = new SphinxClient (); 
	$cl->SetServer ( $host, $port ); 
	$cl->SetConnectTimeout ( 1 ); 
	$cl->SetWeights ( array ( 100, 1 ) ); 
	$cl->SetMatchMode ( $mode ); 
	if ( count($filtervals) ) $cl->SetFilter ($filter, $filtervals ); 
	if ( $groupby ) $cl->SetGroupBy ( $groupby, SPH_GROUPBY_ATTR, $groupsort ); 
	if ( $sortby ) $cl->SetSortMode ( SPH_SORT_EXTENDED, $sortby ); 
	if ( $sortexpr ) $cl->SetSortMode (SPH_SORT_EXPR, $sortexpr ); 
	if ( $distinct ) $cl->SetGroupDistinct ( $distinct );
	if ( $limit ) $cl->SetLimits ( 0, $limit, ($limit>1000 ) ? $limit : 1000 ); 
	$cl->SetRankingMode ( $ranker ); $cl->SetArrayResult ( true ); 
	$res = $cl->Query ($type.' '. $search.'',  $index);
#-echo $search."<br />";
	////////////////
	// print me out
	////////////////

	if ( $res===false )
	{
		$error= "Query failed: " . $cl->GetLastError() . ".\n";
		$is_error=true;

	} else
	{
		if ( $cl->GetLastWarning() ){
			$error= "WARNING: " . $cl->GetLastWarning() . "\n\n";
			$is_error=true;
			}

		$query .= "Query '$search' retrieved $res[total] of $res[total_found] matches in $res[time] sec.\n";
		$query .= "Query stats:\n";
		if ( is_array($res["words"]) )
			foreach ( $res["words"] as $word => $info )
				$result.= "    '$word' found $info[hits] times in $info[docs] documents\n";
	

		if ( is_array(@$res["matches"]) )
		{
			$n = 1;
			
			foreach ( $res["matches"] as $docinfo )
			{
				$result.= "$n. doc_id=$docinfo[id], weight=$docinfo[weight]";
				$list.=','.$docinfo['id'];
				foreach ( $res["attrs"] as $attrname => $attrtype )
				{
					$value = $docinfo["attrs"][$attrname];
					if ( $attrtype & SPH_ATTR_MULTI )
					{
						$value = "(" . join ( ",", $value ) .")";
					} else
					{
						if ( $attrtype==SPH_ATTR_TIMESTAMP )
							$value = date ( "Y-m-d H:i:s", $value );
					}
					$result.= ", $attrname=$value";
				}
				$result.= "\n";
				$n++;
			}
		}
	}
	if($verbose==true)
	{
		echo '<pre>'. $error.'\n';
		echo '<pre>'. $index.'\n';
		echo '<pre>'. $query.'\n';
		echo '<pre>'. $result.'\n';
		
		echo '</pre>';
	}
	return $list;
}
//
// $Id: test.php 1343 2008-07-08 21:28:20Z shodan $
//

?>