<?php

class Authentification
{
  public static $CURL_OPTS = array(
    CURLOPT_CONNECTTIMEOUT => 10,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_TIMEOUT        => 60,
    CURLOPT_SSL_VERIFYPEER => FALSE,
    CURLOPT_USERAGENT      => '"Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.0)"',
		CURLOPT_SSL_VERIFYHOST => 1,
		CURLOPT_HEADER				 => 0,

  );
  
  
  public static $NEW = '/authorization/new';
  public static $LOGOUT = '/sign_out';
  
  public static $TOKEN = '/authorization/token';
  
  public static $TYPE = 'web_server';

	public static $REMEMBER_ME= '/remember_me';

  protected static $DROP_QUERY_PARAMS = array(
     'code',
   );
  
  
  public function __construct($config) {
    $this->set_client_id($config['client_id']);
		$this->set_secret($config['secret']);
		$this->set_domain($config['domain']);
		$this->set_site($config['site']);
		
  }
  public function set_client_id($client_id) {
    $this->client_id = $client_id;
    return $this;
  }
  public function set_domain($domain) {
    $this->domain = $domain;
    return $this;
  }
  public function set_site($site) {
    $this->site = $site;
    return $this;
  }

  public function get_client_id() {
    return $this->client_id;
  }
	public function get_domain() {
    return $this->domain;
  }
	public function get_site() {
    return $this->site;
  }
	
  public function set_secret($secret) {
    $this->secret = $secret;
    return $this;
  }

  public function get_secret() {
    return $this->secret;
  }
  
  public function getLogin($url='')
  {
    return $this->get_domain().self::$NEW.'?type='.self::$TYPE.'&client_id='.$this->get_client_id().'&client_secret='.$this->get_secret().'&redirect_uri='.(empty($url) ? $this->getCurrentUrl() : $url);
  }
	public function getRememberMe($access_token,$url='')
  {
    return $this->get_domain().self::$REMEMBER_ME.'?type='.self::$TYPE.'&access_token='.$access_token.'&client_id='.$this->get_client_id().'&client_secret='.$this->get_secret().'&redirect_uri='.(empty($url) ? $this->getCurrentUrl() : $url);
  }
  public function getLogout($access_token)
  {
    return $this->get_domain().self::$LOGOUT.'?oauth_token='.$access_token;
  }

  public function getNewSite()
  {
    return $this->get_domain().'?login=1';
  }

  public function api($url, $method, $params) {
      $ch = curl_init();
    $opts = self::$CURL_OPTS;
    if($method == 'POST')
    {
      $opts[CURLOPT_POSTFIELDS] = $params;
    }
    $opts[CURLOPT_URL] = $this->get_domain().$url.(($method == 'GET') ? '?'.http_build_query($params) : '');
    curl_setopt_array($ch, $opts);
		$result = curl_exec($ch);
		if( $result === false)
		{
		    echo 'Curl error: ' . curl_error($ch);
		}
    curl_close($ch);
    return $result;
  }
	public function logout_old_site()
	{
	  setcookie ("email_address", "", time() - 3600);
	  setcookie ("first_name", "", time() - 3600);
	  setcookie ("customers_registration_step", "", time() - 3600);
	  setcookie('customers_id', '', time()- 3600);
	  tep_session_unregister('customer_id');
	  tep_session_unregister('customer_country_id');
	  tep_session_unregister('customer_zone_id');
	  tep_session_unregister('osCsid');
	  tep_session_unregister('sessionCookie');
	}
	public function redirect_public()
	{
	  $script_availables= array(
      '/how.php' => '/'.$_SESSION['lang_short'].'/info/dvd'
			,'/how_public.php' => '/'.$_SESSION['lang_short'].'/info/dvd'
      ,'/faq_public.php' => '/'.$_SESSION['lang_short'].'/faq'
      ,'/faq.php' => '/'.$_SESSION['lang_short'].'/faq'
      ,'/privacy.php' => '/'.$_SESSION['lang_short'].'/info/privacy'
      ,'/privacy_public.php' => '/'.$_SESSION['lang_short'].'/info/privacy'
      ,'/freetrial_info.php' => '/'.$_SESSION['lang_short']
      ,'/contact.php' => '/'.$_SESSION['lang_short'].'/phone_requests/new'
      ,'/contact_public.php' => '/'.$_SESSION['lang_short'].'/phone_requests/new'
      ,'/product_info_public.php' => '/'.$_SESSION['lang_short'].'/products/'.$_GET['products_id']
      ,'/price.php' => '/'.$_SESSION['lang_short'].'/info/price'
      ,'/trailer.php' => '/'.$_SESSION['lang_short']
      ,'/contest_public.php' => '/'.$_SESSION['lang_short'].'/contests/new'
		);	
		foreach ($script_availables as $old=>$new) {
		//strpos(((!empty($page))?$page:$_SERVER['SCRIPT_NAME']),$value)!==false
			if( strpos($_SERVER['SCRIPT_NAME'],$old)!==false)
			{
				$url=$this->get_site().$new;
				return $url;
			}
		}	
		return false;
	}
	public function redirect()
	{
		
		if(empty($_SESSION['lang_short'])) 
			$_SESSION['lang_short'] = 'fr';
		if(empty($_SESSION['customer_id']))
			$_SESSION['customer_id']=0;
			
		$script_availables= array(
			'/mydvdpost.php'=>'/'
			,"/abo_google_ogone_conf.php" => "/"
			,'/my_profile.php' => '/'.$_SESSION['lang_short'].'/customers/'.$_SESSION['customer_id']
			,'/account.php' => '/'.$_SESSION['lang_short'].'/customers/'.$_SESSION['customer_id']
			,'/account_edit.php'=> '/'.$_SESSION['lang_short'].'/customers/'.$_SESSION['customer_id']
		  ,'/account_edit_process.php'=> '/'.$_SESSION['lang_short'].'/customers/'.$_SESSION['customer_id']
		  ,'/actors.php'=> '/'.$_SESSION['lang_short'].'/actors/'.$_GET['actors_id'].'/products'
		  ,'/address_book.php'=> '/'.$_SESSION['lang_short'].'/customers/'.$_SESSION['customer_id']
		  ,'/address_book_process.php'=> '/'.$_SESSION['lang_short'].'/customers/'.$_SESSION['customer_id']
		  ,'/contact.php' => '/'.$_SESSION['lang_short'].'/phone_requests/new'
		  ,'/contact_public.php' => '/'.$_SESSION['lang_short'].'/phone_requests/new'
			,'/custserv.php' => '/'.$_SESSION['lang_short'].'/messages/new'
			,'/custserv_detail.php' => '/'.$_SESSION['lang_short'].'/messages/new'
			,'/custserv_list.php' => '/'.$_SESSION['lang_short'].'/messages/new'
			,'/directors.php' => '/'.$_SESSION['lang_short'].'/directors/'.$_GET['directors_id'].'/products'
			,'/listing_category.php' => '/'.$_SESSION['lang_short'].'/'.((!empty($_GET['cPath']))?'categories/'.$_GET['cPath'].'/products':'products')
			,'/my_recommandation.php' =>  '/'.$_SESSION['lang_short'].'/products?recommended=true'
			,'/mywishlist.php' => '/'.$_SESSION['lang_short'].'/wishlist'
			,'/product_info.php' => '/'.$_SESSION['lang_short'].'/products/'.$_GET['products_id']
			,'/advanced_search_result2.php' => '/'.$_SESSION['lang_short'].'/products?search='.$_GET['keywords']
			,'/contest.php' => '/'.$_SESSION['lang_short'].'/contests/new'
			,'/contest_public.php' => '/'.$_SESSION['lang_short'].'/contests/new'
			,'/contest_process.php' => '/'.$_SESSION['lang_short'].'/contests/new'
			,'/quizz.php' => '/'.$_SESSION['lang_short'].'/quizzes/'
			,'/quizz2.php' => '/'.$_SESSION['lang_short'].'/quizzes/'
			,'/holiday_form.php' => '/'.$_SESSION['lang_short'].'/customers/'.$_SESSION['customer_id']
			,'/holiday_process.php' => '/'.$_SESSION['lang_short'].'/customers/'.$_SESSION['customer_id']
			,'/member_get_member.php' => '/'.$_SESSION['lang_short'].'/sponsorships'
			,'/member_get_member_gift.php' => '/'.$_SESSION['lang_short'].'/sponsorships/gifts'
			,'/member_get_member_points.php' => '/'.$_SESSION['lang_short'].'/sponsorships/gifts'
			,'/member_get_member_faq.php' => '/'.$_SESSION['lang_short'].'/sponsorships/faq'
			,'/messages_urgent.php' => '/'.$_SESSION['lang_short'].'/messages/urgent'
			,'/reviews_member.php' => '/'.$_SESSION['lang_short'].'/customers/'.$_GET['custid'].'/reviews'
			,'/subscription_change_limited.php' => '/'.$_SESSION['lang_short'].'/customers/'.$_SESSION['customer_id'].'/subscription/edit'
			,'/payment_method_change.php' => '/'.$_SESSION['lang_short'].'/customers/'.$_SESSION['customer_id'].'/payment_methods/edit'
			,'/mydvdxpost.php' => '/'.$_SESSION['lang_short'].'/adult/'
			,'/mywishlist_adult.php' => '/'.$_SESSION['lang_short'].'/adult/wishlist'
			,'/my_profile_adult.php' => '/'.$_SESSION['lang_short'].'/adult/customers/'.$_SESSION['customer_id']
			,'/listing_category_adult.php' => '/'.$_SESSION['lang_short'].'/adult/products'
			,'/studio_adult.php' => '/'.$_SESSION['lang_short'].'/adult/studios/'.$_GET['studio_id'].'/products'
			,'/advanced_search_result2_adult.php' => '/'.$_SESSION['lang_short'].'/adult/products?search='.$_GET['keywords']
			,'/actors_adult.php' => '/'.$_SESSION['lang_short'].'/adult/actors/'.$_GET['actors_id'].'/products'
			,'/faq_public.php' => '/'.$_SESSION['lang_short'].'/faq'
			,'/how.php' => '/'.$_SESSION['lang_short'].'/info/dvd'
		  ,'/how_public.php' => '/'.$_SESSION['lang_short'].'/info/dvd'
      ,'/faq_public.php' => '/'.$_SESSION['lang_short'].'/faq'
      ,'/faq.php' => '/'.$_SESSION['lang_short'].'/faq'
      ,'/privacy.php' => '/'.$_SESSION['lang_short'].'/info/privacy'
      ,'/privacy_public.php' => '/'.$_SESSION['lang_short'].'/info/privacy'
      ,'/freetrial_info.php' => '/'.$_SESSION['lang_short']
      ,'/contact.php' => '/'.$_SESSION['lang_short'].'/phone_requests/new'
      ,'/contact_public.php' => '/'.$_SESSION['lang_short'].'/phone_requests/new'
      ,'/product_info_public.php' => '/'.$_SESSION['lang_short'].'/products/'.$_GET['products_id']
      ,'/price.php' => '/'.$_SESSION['lang_short'].'/info/price'
      ,'/trailer.php' => '/'.$_SESSION['lang_short']
		);
		foreach ($script_availables as $old=>$new) {
		//strpos(((!empty($page))?$page:$_SERVER['SCRIPT_NAME']),$value)!==false
			if( strpos($_SERVER['SCRIPT_NAME'],$old)!==false)
			{
				$url=$this->get_site().$new."?login=1";
				return $url;
			}
		}	
		return false;
	}
	
  public function getCurrentUrl() {
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on'
      ? 'https://'
      : 'http://';
		
		$host = $_SERVER['HTTP_HOST'] ;
		
		if(strpos($host,'dvdpost.nl')!==false)
		{
			$host='www.dvdpost.nl';
		}
		else if(strpos($host,'dvdpost.be')!==false)
		{
			$host='www.dvdpost.be';
		}
		else if(strpos($host,'dvdpost.lu')!==false)
		{
			$host='www.dvdpost.lu';
		}
		
    $currentUrl = $protocol . $host . $_SERVER['REQUEST_URI'];
    $parts = parse_url($currentUrl);

    // drop known fb params
    $query = '';
    if (!empty($parts['query'])) {
      $params = array();
      parse_str($parts['query'], $params);
      
      foreach(self::$DROP_QUERY_PARAMS as $key) {
        unset($params[$key]);
      }
      
      if (!empty($params)) {
        $query = '?' . http_build_query($params);
      }
    }

    // use port if non default
    $port =
      isset($parts['port']) &&
      (($protocol === 'http://' && $parts['port'] !== 80) ||
       ($protocol === 'https://' && $parts['port'] !== 443))
      ? ':' . $parts['port'] : '';

    // rebuild
    return $protocol . $parts['host'] . $port . $parts['path'] . $query;
  }
  
}
?>