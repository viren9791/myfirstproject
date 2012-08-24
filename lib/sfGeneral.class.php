<?php
/**
 * pager class.
 *
 * @package    Myfirstproject
 * @subpackage Lib
 * @author     Viren Dave <viren.virtueinfo@gmail.com> 
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class sfGeneral
{
 /**
  * Execute generateThumbnailImage function generate thumbnail image of image
  *
  * @param String $fileName       stores file name
  * @param String $thumbnailName  stores thumbnail name
  * @param String $width          stores thumbnail width
  * @param String $height         stres  thumbnail height
  * @param String $type           stores thumbnail type
  *
  * @return void
  */
  public function createThumbnailUser($height, $width, $fileName, $type, $thumbnailName)
  {
      $omThumbnail = new sfThumbnail($height, $width, true, true);

      $omThumbnail->loadFile($fileName);

      $omThumbnail->save(sfConfig::get('sf_upload_dir').'/'.$thumbnailName, $type);
  }
 /**
  *  added to get facebook user id and access token 
  * 
  * @param string $ssFbCode     stores fb code.
  * @param string $ssReturnUrl  stores return url
  * 
  * @return void 
  * 
  */ 
  static public function getFbUidAndAccessToken($ssFbCode, $ssReturnUrl) 
  { 
      if(strlen(trim($ssFbCode)) > 0) 
      { 
        $snFbClientId     = sfConfig::get("app_fb_client_id"); 
        $ssFbClientSecret = sfConfig::get("app_fb_client_secret"); 
 
        //getting access token from the retrieved code. 
        $ssUrl = 'https://graph.facebook.com/oauth/access_token?client_id='
            .$snFbClientId.'&redirect_uri='.$ssReturnUrl.'&client_secret='
            .$ssFbClientSecret.'&code='.$ssFbCode; 
 
        $ssCh = curl_init(); 
            curl_setopt_array( 
                $ssCh, 
                array( 
                    CURLOPT_URL => $ssUrl, 
                    CURLOPT_RETURNTRANSFER => true, 
                    CURLOPT_SSL_VERIFYPEER => false, 
                    CURLOPT_VERBOSE => true 
                ) 
            ); 
        $ssResult = curl_exec($ssCh); 
 
        if($ssResult === false) 
            echo 'Curl error: ' . curl_error($ssResult); 
        else 
        { 
            $asAccesstoken = explode('&', $ssResult); 
            $asAccesstokenValue = explode('=', $asAccesstoken[0]); 
 
            //setting the accesstoken in a session to use it later. 
            sfContext::getInstance()->getUser()->setAttribute('accesstoken', $asAccesstokenValue[1], 'user'); 
            //getting users basic information 
            $ssCurl = curl_init(
                'https://graph.facebook.com/me?fields=id,email,name,bio&access_token='
                .$asAccesstokenValue[1]); 
            curl_setopt($ssCurl, CURLOPT_RETURNTRANSFER, 1); 
            curl_setopt($ssCurl, CURLOPT_SSL_VERIFYPEER, 0); 
            $ssResult = curl_exec($ssCurl); 
            $oFbUid = json_decode($ssResult);
 
             //setting the facebook user id in a session to use it later. 
            sfContext::getInstance()->getUser()->setAttribute('fbUid', $oFbUid->id, 'user'); 
            sfContext::getInstance()->getUser()->setAttribute('username', $oFbUid->email, 'email'); 
            sfContext::getInstance()->getUser()->setAttribute('name', $oFbUid->name, 'name'); 
        } 
      } 
  } 
     
 /** 
  * Get facebook graph api url as per given return url 
  * 
  * @param string $ssReturnUrl stores return url
  * 
  * @return string url 
  * 
  */ 
  static public function getFacebookUrl($ssReturnUrl) 
  { 
    $snFbClientId = sfConfig::get("app_fb_client_id"); 
 
    $ssUrl  = "https://graph.facebook.com/oauth/authorize?"; 
    $ssUrl .= "client_id=".$snFbClientId."&"; 
    $ssUrl .= "redirect_uri=".$ssReturnUrl."&"; 
    $ssUrl .= "scope=publish_stream,email,user_about_me,offline_access"; 
    $ssUrl .= "&display=popup"; 
 
    return $ssUrl; 
  }
 /** 
   * Get twitter api url as per given return url 
   * 
   * @param string $ssReturnUrl return url 
   * 
   * @return string url 
   * 
   */ 
    static public function getTwitterUrl($ssReturnUrl) 
    { 
      /** Build TwitterOAuth object with client credentials. */
       $connection = new TwitterOAuth(sfConfig::get("app_consumer_key"), sfConfig::get("app_consumer_secret"));
      /** Get temporary credentials. */
       $request_token = $connection->getRequestToken($ssReturnUrl);

      /** Save temporary credentials to session. */
       
      sfContext::getInstance()->getUser()->setAttribute('oauth_token', $request_token['oauth_token'], 'oauth_token');
      sfContext::getInstance()->getUser()
          ->setAttribute('oauth_token_secret', $request_token['oauth_token_secret'], 'oauth_token_secret'); 
 
       /** If last connection failed don't display authorization link. */
       switch ($connection->http_code) 
       {
         case 200:
           /** Build authorize URL and redirect user to Twitter. */
           $url = $connection->getAuthorizeURL($request_token);
           return $url;
           //header('Location: ' . $url); 
         break;
         default:
           /** Show notification if something went wrong. */
           echo 'Could not connect to Twitter. Refresh the page or try again later.';     
       }
    } 

    
    /**
    * Execute Compose mail function to send email
    *
    * @param String $subject store subject for mail
    * @param String $to      stores reciptions id
    * @param String $from    stores sender id
    * @param String $body    stores body for mail
    *
    * @return void
    */
    
    static public function composeMail($subject, $to, $from, $body)
    {
       //echo "<pre>";print_r(array($subject, $to, $from, $body));exit;
       $oMail = sfContext::getInstance()->getMailer()->compose();
       $oMail->setSubject($subject);
       $oMail->setTo($to);
       $oMail->setFrom($from);
       $oMail->setBody($body);
       //print_r($oMail);exit;
       sfContext::getInstance()->getMailer()->send($oMail);
    }
   /**
    * Execute lineBreaker
    *
    * @author viren   <virendav.vitrainee@gmail.com>
    * @access public
    * @return string
    */  
    static public function lineBreaker()
    {
      return $line = '-----------------------------------------------------------------------';
    }
	/** 
	* call_rest_api 
	* This is used to parse REST API responce xml message and convert to data to array   
	* @param $ssUrl = REST API Url, $ssParams = paramaters with values , $ssVerb = methos name * $ssFormat = required format values for json or xml 
	*/ 
	 
	public static function call_rest_api($ssUrl, $ssParams = null, $ssVerb = 'GET', $ssFormat = 'xml') 
	{
		$ssCurl = curl_init($ssUrl);
		$ssResult = "";
		$snRetries = 3;
		if (is_resource($ssCurl) === true)
		{
			curl_setopt($ssCurl, CURLOPT_FAILONERROR, true);
			curl_setopt($ssCurl, CURLOPT_FOLLOWLOCATION, true);
			curl_setopt($ssCurl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ssCurl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($ssCurl, CURLOPT_SSL_VERIFYPEER, false);

			//Set curl to return the data instead of printing it to the browser.
			curl_setopt($ssCurl, CURLOPT_RETURNTRANSFER, 1);

			if (isset($ssParams) === true)
			{
				curl_setopt($ssCurl, CURLOPT_POST, true);
				curl_setopt($ssCurl, CURLOPT_POSTFIELDS, (is_array($ssParams) === true) ? http_build_query($ssParams, '', '&') : $ssParams);
			}

			$ssResult = false;

			while (($ssResult === false) && (--$snRetries > 0))
			{
				$ssResult = curl_exec($ssCurl);
			}

			curl_close($ssCurl);
		}
		
		return $ssResult;
		 
	}
	
	/**
     * get category
	 *
	 * @param String $id stores category id
	 *
     * @return String
     */	 
   
     public function get_category($id) 
     {
	     if($id == '')
		 {
	         $data = Doctrine_Query::create()
                 ->from('Category c')
                 ->where('c.parent_id=0')
                 ->fetchArray();
         }
		 else
		 {    
              $data = Doctrine_Query::create()
                  ->select('c.name,(SELECT c1.name FROM category c1 WHERE c1.category_id  = c.parent_id) as parent_category')
                  ->from('Category c')
                  ->where('c.parent_id = ?', $id)
                  ->groupBy('c.name')
                  ->fetchArray();             
         }	 
		 $jeson_data = json_encode($data);	 
         return $jeson_data;
     }
	 
	/**
     * Executes listingProduct function to get list of jobs.
     *
     * @param String $sortBy     stores sort by
     * @param String $searchBy   stores search fields  value
     * @param String $categoryId stores category id
     *
     * @author viren   <virendav.vitrainee@gmail.com>    
     * @access public
     * @return array
     
  
     public function getProducts($categoryId, $productId)
     {      
         $data = Doctrine_Query::create()
             ->select('pa.*,p.*,a.name,av.value')
             ->from('Product p')
             ->leftjoin('p.ProductAttribute pa')
             ->leftjoin('pa.Attribute a')
             ->leftjoin('pa.AttributeValues av')
             ->leftjoin('p.ProductDetails pd');
         if($productId == '')
             $data -> where('pd.category_id = ?', $categoryId);  
         else
             $data -> where('p.product_id = ? ', $productId);
         $data 
		     -> orderBy('p.name ASC')
			 -> fetchArray();  
		 echo '<pre>';	     
		 print_r($data);exit;
         $jeson_data = json_encode($data);	 
         return $jeson_data;
    }*/
}
?>
