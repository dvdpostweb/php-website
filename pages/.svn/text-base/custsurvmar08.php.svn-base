	<style type="text/css">
	<!--
	.input {
		font-family: Verdana, Arial, Helvetica, sans-serif;
		font-size: 13px;
		width:550px; 
	}
	.input_text {
		font-family: Verdana, Arial, Helvetica, sans-serif;
		font-size: 13px;
		width:200px; 
	}
	
	.borderzz {
		border-top:#275189 solid 1px;
		border-bottom:#275189 solid 1px;
		border-right:#275189 solid 1px;
		font-family: Verdana, Arial, Helvetica, sans-serif;
		font-size: 11px;
	}
	
	.borderzzz {
		border-bottom:#275189 solid 1px;
		border-right:#275189 solid 1px;
		font-family: Verdana, Arial, Helvetica, sans-serif;
		font-size: 13px;
	}
	.comment_style {
		font-family: Arial, Helvetica, sans-serif;
		font-size: 13px;
	}
	
	.comment_style_border {
		border-bottom:#275189 solid 1px ;
		border-left:#275189 solid 1px ;
		border-right:0px;
		padding-left:15px;
		padding-right:15px;
		border-top:0px;
		font-family: Arial, Helvetica, sans-serif;
		font-size: 13px;
		height:25px;
		padding-top:5px;
		padding-bottom:5px;
	}
	
	.comment_style_border_survey {
		background-image:url(<?= $constants['DIR_WS_IMAGES'] ?>survey/top_survey.jpg);
		background-repeat:no-repeat;
		background-position:right;
		border-bottom:#275189 solid 1px ;
		font-family: Arial, Helvetica, sans-serif;
		font-size: 13px;
		height:32px;
		
	}
	.comment_style_border_survey2 {
		background-image:url(<?= $constants['DIR_WS_IMAGES'] ?>survey/top_survey.jpg);
		background-repeat:no-repeat;
		background-position:right;
		border-bottom:#275189 solid 1px ;
		font-size: 15px;
		font-family: Arial, Helvetica, sans-serif;
		color: #275189;
		font-style: italic;
		text-decoration:underline;
		height:32px;
		
	}
	
	.DVDP_style_2 {
	font-size: 15px;
	font-family: Arial, Helvetica, sans-serif;
	color: #275189;
	font-style: italic;
	text-decoration:underline;
}

.DVDP_style_3 {
	font-size: 19px;
	font-family: Arial, Helvetica, sans-serif;
	color: #275189;
	font-style: italic;
	font-weight: bold;
}
	
	-->
	</style>
	<script type="text/JavaScript">
<!--
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_changeProp(objName,x,theProp,theValue) { //v6.0
  var obj = MM_findObj(objName);
  if (obj && (theProp.indexOf("style.")==-1 || obj.style)){
    if (theValue == true || theValue == false)
      eval("obj."+theProp+"="+theValue);
    else eval("obj."+theProp+"='"+theValue+"'");
  }
}
//-->
    </script>
<br />
	<table width="500" border="0" align="center" cellpadding="0" cellspacing="0"center>
	  <tr>
		<td height="90" align="center" valign="middle" class="DVDP_style_3"><img src="<?php  echo DIR_WS_IMAGES.'quest_survey.jpg" align="absmiddle" >&nbsp;'.HEADING_TITLE ; ?></td>
	  </tr>
	  <tr>
		<td valign="top">&nbsp;</td>
	  </tr>
	  <?php  
	  $count_products_query = tep_db_query("SELECT count(customers_id) as count FROM survey_customers_2008 where customers_id='".$customers_id."'" );
	  $count_products = tep_db_fetch_array($count_products_query);
	  $cpt=$count_products['count']; 
  	   if ($cpt==0){
	  ?>
	  <tr>
		<td>
			  <form name="form1" method="post" action="custsurvmar08_process.php">
				<table width="670" border="0" align="center" cellpadding="0" cellspacing="0">
				  <tr>
					<td height="30" align="left" valign="top" class="DVDP_style_2"><b><?php  echo TEXT_Q1;?></b></td>
				  </tr>
				  <tr>
					<td><table width="500" border="0" align="left">
                      <tr>
                        <td width="30"><input name="Q1_EXP1" type="radio" value="4"></td>
                        <td width="460" class="comment_style"><?php  echo TEXT_HIGH_SATISFACTION ;?></td>
                      </tr>
                      <tr>
                        <td width="30"><input name="Q1_EXP1" type="radio" value="3"></td>
                        <td class="comment_style"><?php  echo TEXT_SATISFACTION ;?></td>
                      </tr>
                      <tr>
                        <td width="30"><input name="Q1_EXP1" type="radio" value="2"></td>
                        <td class="comment_style"><?php  echo TEXT_MED_SATISFACTION ;?></td>
                      </tr>
					  <tr>
                        <td width="30"><input name="Q1_EXP1" type="radio" value="1"></td>
                        <td class="comment_style"><?php  echo TEXT_LOW_SATISFACTION ;?></td>
                      </tr>
                    </table></td>
				  </tr>
				  <tr>
					<td height="50" align="center" valign="middle">&nbsp;</td>
				  </tr>
				  
				  <tr>
					<td height="30" align="left" valign="top" class="DVDP_style_2"><b><?php  echo TEXT_Q2 ; ?></b></td>
				  </tr>				  				  
				  <tr>
					<td height="40" valign="bottom"><table width="500"  cellspacing="0" cellpadding="0" border="0">
					  <tr>
						<td height="20" colspan="10" align="center" valign="top" class="comment_style"><b><?php  echo TEXT_NPS_VALUE ; ?></b></td>
				       </tr>
					  <tr align="center" valign="middle">
						<td width="50" height="20" class="comment_style" >1</td>
						<td width="50" class="comment_style">2</td>
						<td width="50" class="comment_style">3</td>
						<td width="50" class="comment_style">4</td>
						<td width="50" class="comment_style">5</td>
						<td width="50" class="comment_style">6</td>
						<td width="50" class="comment_style">7</td>
						<td width="50" class="comment_style">8</td>
						<td width="50" class="comment_style">9</td>
						<td width="50" class="comment_style"><p>10</p></td>
					  </tr>
					  <tr align="center" valign="middle">
						<td><input type="radio" name="Q2_EXP1" value="1"></td>
						<td><input type="radio" name="Q2_EXP1" value="2"></td>
						<td><input type="radio" name="Q2_EXP1" value="3"></td>
						<td><input type="radio" name="Q2_EXP1" value="4"></td>
						<td><input name="Q2_EXP1" type="radio" value="5" ></td>
						<td><input type="radio" name="Q2_EXP1" value="6"></td>
						<td><input type="radio" name="Q2_EXP1" value="7"></td>
						<td><input type="radio" name="Q2_EXP1" value="8"></td>
						<td><input type="radio" name="Q2_EXP1" value="9"></td>
						<td><input type="radio" name="Q2_EXP1" value="10"></td>
					  </tr>
					</table></td>
				  </tr>
				  <tr>
					<td height="50" align="center">&nbsp;</td>
				  </tr>
				  <tr>
					<td height="30" align="left" valign="top" class="DVDP_style_2"><b><?php  echo TEXT_Q3 ; ?></b></td>
				  </tr>
				  <tr>
				    <td height="30" align="left" valign="top"><blockquote><span class="comment_style"><b><?php  echo TEXT_Q3A; ?></b></span></blockquote></td>
			      </tr>
				  <tr>
				    <td><blockquote>
					<table width="500"  cellspacing="0" cellpadding="0" border="0">
                      <tr>
                        <td width="30"><input name="Q3a_EXP1" type="checkbox" value="1"></td>
                        <td width="460" class="comment_style"><?php  echo TEXT_PUB ;?></td>
                      </tr>
                      <tr>
                        <td width="30"><input name="Q3a_EXP2" type="checkbox" value="1"></td>
                        <td class="comment_style"><?php  echo TEXT_MONTH_EAR ;?></td>
                      </tr>
                      <tr>
                        <td width="30"><input name="Q3a_EXP3" type="checkbox" value="1"></td>
                        <td class="comment_style"><?php  echo TEXT_PARTNERS ;?></td>
                      </tr>
                      <tr>
                        <td width="30"><input name="Q3a_EXP4" type="checkbox" value="1"></td>
                        <td class="comment_style"><?php  echo TEXT_RADIO ;?></td>
                      </tr>
					  <tr>
                        <td width="30"><input name="Q3a_EXP5" type="checkbox" value="1"></td>
                        <td class="comment_style">
                          <label><?php  echo TEXT_OTHERS ;?><input name="Q3a_EXPLAIN" type="text" class="input_text" onClick="MM_changeProp('Q3a_EXP5','','checked','1','INPUT/CHECKBOX')">
                          </label>
						</td>
                      </tr>
                    </table>
					</blockquote>					</td>
			      </tr>
				  <tr>
					<td height="30" align="center">&nbsp;</td>
				  </tr>
				  <tr>
					<td height="30" align="left" valign="top" class="comment_style"><blockquote><b><?php  echo TEXT_Q3B ; ?></b></blockquote></td>
				  </tr>
				  <tr>
				    <td><blockquote>
					<table width="500"  cellspacing="0" cellpadding="0" border="0">
                      <tr>
                        <td width="30"><input name="Q3b_EXP1" type="checkbox" value="1"></td>
                        <td width="460" class="comment_style"><?php  echo TEXT_EASY ;?></td>
                      </tr>
                      <tr>
                        <td width="30"><input name="Q3b_EXP2" type="checkbox" value="1"></td>
                        <td class="comment_style"><?php  echo TEXT_DVD_CHOICE ;?></td>
                      </tr>
                      <tr>
                        <td width="30"><input name="Q3b_EXP3" type="checkbox" value="1"></td>
                        <td class="comment_style"><?php  echo TEXT_PRICE ;?></td>
                      </tr>
                      <tr>
                        <td width="30"><input name="Q3b_EXP4" type="checkbox" value="1"></td>
                        <td class="comment_style"><?php  echo TEXT_OTHER_CINEMA ;?></td>
                      </tr>
					  <tr>
                        <td width="30"><input name="Q3b_EXP5" type="checkbox" value="1"></td>
                        <td class="comment_style">
							<label><?php  echo TEXT_OTHERS ;?><input name="Q3b_EXPLAIN" type="text" class="input_text" onClick="MM_changeProp('Q3b_EXP5','','checked','1','INPUT/CHECKBOX')">
							</label>
						</td>
                      </tr>
                    </table>
					</blockquote>					</td>
			      </tr>
				  <tr>
					<td height="50" align="center">&nbsp;</td>
				  </tr>
				  <tr>
					<td height="30" align="left" valign="top" class="DVDP_style_2"><b><?php  echo TEXT_Q4 ; ?></b></td>
				  </tr>
				  <tr>
				    <td><blockquote>
				      <table width="500"  cellspacing="0" cellpadding="0" border="0">
                        <tr>
                          <th width="392" scope="col" class="comment_style_border_survey" align="left"><?php  echo TEXT_Q4A ; ?></th>
                          <th width="30" scope="col" class="borderzz" align="center" valign="middle"><img src="<?php  echo DIR_WS_IMAGES;?>survey/bad.gif" align="absmiddle"></th>
                          <th width="30" scope="col " class="borderzz" align="center" valign="middle"><img src="<?php  echo DIR_WS_IMAGES;?>survey/neutral.gif" align="absmiddle"></th>
                          <th width="30" scope="col" class="borderzz" align="center" valign="middle"><img src="<?php  echo DIR_WS_IMAGES;?>survey/good.gif" align="absmiddle"></th>
                        </tr>
                        <tr>
                          <td class="comment_style_border" align="left" valign="top"><?php  echo TEXT_PLEASANT ;?></td>
                          <td  class="borderzzz" align="center" valign="top"><input name="Q4a_EXP1" type="radio" value="1"></td>
                          <td  class="borderzzz" align="center" valign="top"><input name="Q4a_EXP1" type="radio" value="2"></td>
                          <td  class="borderzzz" align="center" valign="top"><input name="Q4a_EXP1" type="radio" value="3"></td>
                        </tr>
                        <tr>
                          <td class="comment_style_border" align="left" valign="top"><?php  echo TEXT_QUICK ;?></td>
                          <td class="borderzzz" align="center" valign="top"><input name="Q4a_EXP2" type="radio" value="1"></td>
                          <td class="borderzzz" align="center" valign="top"><input name="Q4a_EXP2" type="radio" value="2"></td>
                          <td class="borderzzz" align="center" valign="top"><input name="Q4a_EXP2" type="radio" value="3"></td>
                        </tr>
                        <tr>
                          <td class="comment_style_border" align="left" valign="top"><?php  echo TEXT_COMPETENCE ;?></td>
                          <td class="borderzzz" align="center" valign="top"><input name="Q4a_EXP3" type="radio" value="1"></td>
                          <td class="borderzzz" align="center" valign="top"><input name="Q4a_EXP3" type="radio" value="2"></td>
                          <td class="borderzzz" align="center" valign="top"><input name="Q4a_EXP3" type="radio" value="3"></td>
                        </tr>
                        <tr>
                          <td class="comment_style_border" align="left" valign="top"><?php  echo TEXT_ACCESS2 ;?></td>
                          <td class="borderzzz" align="center" valign="top"><input name="Q4a_EXP4" type="radio" value="1"></td>
                          <td class="borderzzz" align="center" valign="top"><input name="Q4a_EXP4" type="radio" value="2"></td>
                          <td class="borderzzz" align="center" valign="top"><input name="Q4a_EXP4" type="radio" value="3"></td>
                        </tr>
                        <tr>
                          <td class="comment_style_border" valign="top"><?php  echo TEXT_ANSWERING_QUESTION ;?></td>
                          <td class="borderzzz" align="center" valign="top"><input name="Q4a_EXP5" type="radio" value="1"></td>
                          <td class="borderzzz" align="center" valign="top"><input name="Q4a_EXP5" type="radio" value="2"></td>
                          <td class="borderzzz"align="center" valign="top"><input name="Q4a_EXP5" type="radio" value="3"></td>
                        </tr>
                      </table>
				    </blockquote></td>
			      </tr>
				  <tr>
				    <td height="30" align="center" valign="middle">&nbsp;</td>
				  </tr>
				  <tr>
				    <td height="30" align="left" valign="top">
					<blockquote>
					<table width="500"  cellspacing="0" cellpadding="0" border="0">
                      <tr>
                        <th width="392" scope="col" class="comment_style_border_survey" align="left"><?php  echo TEXT_Q4B ; ?></th>
                        <th width="30" scope="col" class="borderzz" align="center" valign="middle"><img src="<?php  echo DIR_WS_IMAGES;?>survey/bad.gif" align="absmiddle"></th>
                        <th width="30" scope="col " class="borderzz" align="center" valign="middle"><img src="<?php  echo DIR_WS_IMAGES;?>survey/neutral.gif" align="absmiddle"></th>
                        <th width="30" scope="col" class="borderzz"align="center" valign="middle"><img src="<?php  echo DIR_WS_IMAGES;?>survey/good.gif" align="absmiddle"></th>
                      </tr>
                      <tr>
                        <td class="comment_style_border" align="left" valign="top"><?php  echo TEXT_TITLE_CHOICE ;?></td>
                          <td  class="borderzzz" align="center" valign="top"><input name="Q4b_EXP1" type="radio" value="1"></td>
                          <td  class="borderzzz" align="center" valign="top"><input name="Q4b_EXP1" type="radio" value="2"></td>
                          <td  class="borderzzz" align="center" valign="top"><input name="Q4b_EXP1" type="radio" value="3"></td>
                      </tr>
                      <tr>
                        <td  class="comment_style_border" align="left" valign="top"><?php  echo TEXT_QUICK_SERVICE ;?></td>
                          <td  class="borderzzz" align="center" valign="top"><input name="Q4b_EXP2" type="radio" value="1"></td>
                          <td  class="borderzzz" align="center" valign="top"><input name="Q4b_EXP2" type="radio" value="2"></td>
                          <td  class="borderzzz" align="center" valign="top"><input name="Q4b_EXP2" type="radio" value="3"></td>
                      </tr>
                      <tr>
                        <td class="comment_style_border" align="left" valign="top"><?php  echo TEXT_DVD_QUALITY ;?></td>

                          <td  class="borderzzz" align="center" valign="top"><input name="Q4b_EXP3" type="radio" value="1"></td>
                          <td  class="borderzzz" align="center" valign="top"><input name="Q4b_EXP3" type="radio" value="2"></td>
                          <td  class="borderzzz" align="center" valign="top"><input name="Q4b_EXP3" type="radio" value="3"></td>
                      </tr>
                      <tr>
                        <td class="comment_style_border" align="left" valign="top"><?php  echo TEXT_PRICE ;?></td>
                          <td  class="borderzzz" align="center" valign="top"><input name="Q4b_EXP4" type="radio" value="1"></td>
                          <td  class="borderzzz" align="center" valign="top"><input name="Q4b_EXP4" type="radio" value="2"></td>
                          <td  class="borderzzz" align="center" valign="top"><input name="Q4b_EXP4" type="radio" value="3"></td>
                      </tr>
                    </table>				
					</blockquote></td>
			      </tr>
				  <tr>
					<td height="50" align="center">&nbsp;</td>
				  </tr>
				  <tr>
				    <td><table width="540" cellspacing="0" cellpadding="0" border="0">
                      <tr>
                        <th scope="col" align="left" valign="top" height="30" class="comment_style_border_survey2"><?php  echo TEXT_Q5 ; ?></th>
                        <th scope="col" align="center" valign="middle" class="borderzz"><?php  echo TEXT_YES ;?></th>
						<th scope="col" align="center" valign="middle" class="borderzz"><?php  echo TEXT_NO ;?></th>
                      </tr>
                      <tr>
                        <td class="comment_style_border" align="left" valign="middle" height="40"><?php  echo TEXT_EXP1_Q5; ?></td>
                        <td class="borderzzz" width="30" align="center" valign="middle"><input name="Q5_EXP1" type="radio" value="2"></td>
						<td class="borderzzz" width="30" align="center" valign="middle"><input name="Q5_EXP1" type="radio" value="1"></td>
                      </tr>
                      <tr>
                        <td class="comment_style_border" align="left" valign="top"><?php  echo TEXT_EXP2_Q5; ?></td>
                        <td class="borderzzz" width="30" align="center" valign="middle"><input name="Q5_EXP2" type="radio" value="2"></td>
						<td class="borderzzz" width="30" align="center" valign="middle"><input name="Q5_EXP2" type="radio" value="1"></td>
                      </tr>
                      <tr>
                        <td class="comment_style_border" align="left" valign="top"><?php  echo TEXT_EXP3_Q5; ?></td>
                        <td class="borderzzz" width="30" align="center" valign="middle"><input name="Q5_EXP3" type="radio" value="2"></td>
						<td class="borderzzz" width="30" align="center" valign="middle"><input name="Q5_EXP3" type="radio" value="1"></td>
                      </tr>
					  <tr>
                        <td class="comment_style_border" align="left" valign="top"><?php  echo TEXT_EXP4_Q5; ?></td>
                        <td class="borderzzz" width="30" align="center" valign="middle"><input name="Q5_EXP4" type="radio" value="2"></td>
						<td class="borderzzz" width="30" align="center" valign="middle"><input name="Q5_EXP4" type="radio" value="1"></td>
                      </tr>
                    </table></td>
			      </tr>
				  <tr align="center" valign="middle">
					<td height="50" class="comment_style">&nbsp;</td>
				  </tr>
				  <input name="GFC" type="hidden" value="3">
				  <tr>
					<td height="30" align="left" valign="middle" class="DVDP_style_2" ><b><?php  echo TEXT_Q7 ; ?></b></td>
				  </tr>
				  <tr bgcolor="#4675B6">
					<td align="left" bgcolor="#FFFFFF"  class="comment_style">
					<?php  echo TEXT_COMMENT ; ?><br><br>
					<strong>  
					  <textarea name="comment" cols="85" rows="10" class="input" id="comment"></textarea>
					</strong></td>
				  </tr>
				  <tr>
					<td align="center">&nbsp;</td>
				  </tr>
				  <tr>
					<td align="center"><input name="imageField" type="image" src="<?php  echo DIR_WS_IMAGES;?>languages/<?php  echo $language ;?>/images/buttons/button_confirm_update.gif" border="0"></td>
				  </tr>
				</table>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
		  </form>
		</td>		
	</tr>
	<?php 
	  }else{
		echo '<tr><td class="comment_style" align="center">'.TEXT_ALREADY_DONE.'<br /><br /><br />';
		echo '<div align="center">';
        echo '<a href="mydvdpost.php">' . tep_image_button('button_continue.gif', IMAGE_BUTTON_CONTINUE) . '</a>';
        echo '</div></td></tr>';  
	  }
	?>	
	</table>
