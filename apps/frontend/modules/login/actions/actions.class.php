<?php

/**
* login actions.
*
* @package    Myfirstproject
* @subpackage Login
* @author     viren   <virendav.vitrainee@gmail.com>     
* @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
*/
class loginActions extends sfActions
{
 /**
  * Executes index function
  *
  * @param String $request for request
  *
  * @author viren   <virendav.vitrainee@gmail.com>    
  * @access public
  *
  * @return none
  *
  */
  public function executeIndex(sfWebRequest $request)
  {   
    $this->redirect('login/login');
  }  
  /**
  * Executes executeRegistration function
  *
  * @param String $request for request
  *
  * @author viren   <virendav.vitrainee@gmail.com>    
  * @access public
  *
  * @return none
  *
  */
  public function executeRegistration(sfWebRequest $request)
  { 
    $this->userForm = new RegistrationForm();
    $thumbnail      = new sfGeneral();
    $user           = new user();
    $this->userForm->setWidget(
        'confirmPassword', new sfWidgetFormInputPassword(
            array(
                'label' => 'confirmPassword'
            ),
            array(
                'maxlength' => 150, 
                'tabindex' => 1
            )
        )
    );
    $this->userForm->setValidator(
        'confirmPassword', new sfValidatorString(
            array(
                'required' => true, 
                'trim' => true
            ), 
            array(
                'required' => 'Enter confirm Password'
            )
        )
    );
    if ($request->isMethod('post'))
    { 
      $salt = md5($request->getPostParameter('user[username]').gettimeofday());
      $password = sha1($salt.$request->getPostParameter('user[password]'));   
      $userDetails = $request->getParameter($this->userForm->getName());
      $userDetails['password']  = $password;
      $this->userForm->getObject()->setSalt($salt);

      $this->userForm->bind(
          $userDetails, 
          $request->getFiles($this->userForm->getName())
      );
      if ($this->userForm->isValid())
      {	  
          $this->userForm->save();
          $fileName             = $this->userForm->getValue('image');
          $thumbnailName        = $this->userForm->getValue('username').'.png';         
          $thumbnail->createThumbnailUser('100px', '100px', $fileName, 'image/png', $thumbnailName);   
          $this->redirect('login/index');    
      }
	  
    }
  }
  /**
  * Executes Login function
  *
  * @param String $request for request
  *
  * @author viren   <virendav.vitrainee@gmail.com>    
  * @access public
  *
  * @return none
  *
  */
  public function executeLogin($request)
  { 
    if(isset($_REQUEST['message']))
      $this->message = $_REQUEST['message'];
    else         
      $this->message = ' ';
    sfContext::getInstance()->getUser()->setAttribute('message', $this->message);  
    $this->form = new sfForm();
    $this->form->setWidgets(
        array('message'    => new sfWidgetFormTextArea())
    );  
    $this->userForm = new LoginForm();    
    $user = new User(); 
    if($request->isMethod('post'))
    { 
	   
      $record     = $request->getParameter($this->userForm->getName());
      $userDetail = Doctrine::getTable('User')->listingUser($record['username'], 'username');
      $password   = sha1($userDetail[0]['salt'].$record['password']);
      $this->userForm->bind(
          $record, 
          $request->getFiles($this->userForm->getName())
      );
	  
      if ($this->userForm->isValid())
      {
	    
        $this->userData = $user->loginUser($record['username'], $password);
		
        if(sizeof($this->userData)>0)
        {
		  
          $this->getUser()->login($record['username'], $this->userData[0]['id']);
          $this->redirect('login/home');
        }
		else
		{   
		    $this->getUser()->setFlash('login_fail', 'Username and password does not match');
		}
      }
    }   
  }
 /**
  * Executes fbRegistration authentication action 
  * 
  * @param sfRequest $request A request object 
  * 
  * @return void 
  * 
  */ 
  public function executeFbRegistration(sfWebRequest $request) 
  {  
    $snFbUid = sfContext::getInstance()
      ->getUser()
      ->getAttribute('fbUid', '', 'user');     
    $username = sfContext::getInstance()
      ->getUser()
      ->getAttribute('username', '', 'email');
    $email = sfContext::getInstance()
      ->getUser()
      ->getAttribute('username', '', 'email'); 
    $snFbAccessToken = sfContext::getInstance()
      ->getUser()
      ->getAttribute('accesstoken', '', 'user'); 
    $access_token = sfContext::getInstance()
      ->getUser()
      ->getAttribute('access_token', '', 'oauth_token');      
    $access_token_secret = sfContext::getInstance()
      ->getUser()
      ->getAttribute('access_token_secret', '', 'oauth_token_secret');    
    $this->fbRegistrationForm  = new FbRegistrationForm();    
    if ($request->isMethod('post'))
    { 
      $salt        = md5($email).gettimeofday();
      $password    = sha1($salt.$request->getPostParameter('fbRegistration[password]'));    
      $userDetails = $request->getParameter($this->fbRegistrationForm->getName());
      $userDetails['password']  = $password;  
      $this->fbRegistrationForm->updateUserdColumn(
          $username, $salt, $email, $snFbUid, 
          $snFbAccessToken, $access_token, 
          $access_token_secret
      );          
      $this->fbRegistrationForm->bind(
          $userDetails, 
          $request->getFiles($this->fbRegistrationForm->getName())
      );
      if ($this->fbRegistrationForm->isValid())
      {
        $this->fbRegistrationForm->save();
        $subject = "Thank you for registration.";
        $to      = $email;
        $from    = sfConfig::get('app_admin_email');
        $body    = "Welcome User,             
                   Username :".$username.
                   "Password :".$request->getPostParameter('fbRegistration[password]');                
        sfGeneral::composeMail($subject, $to, $from, $body);       
        $this->getUser()->setFlash('login_success', 'Login successfully');
        $this->redirect('login/home');    
      }
    }
  }
 /** 
  * Executes facebook authentication action 
  * 
  * @param sfRequest $request A request object 
  * 
  * @return void 
  * 
  */ 
  public function executeFacebookAuth(sfWebRequest $request) 
  {   
    if($request->hasParameter('code') && strlen(trim($request->getParameter('code'))) > 0) 
    { 
      $ssCode      = $request->getParameter('code'); 
      $ssReturnUrl = "http://".$request->getHost()."/login/facebookAuth/"; 
      sfGeneral::getFbUidAndAccessToken($ssCode, $ssReturnUrl); 
      $snFbUid     = sfContext::getInstance()->getUser()->getAttribute('fbUid', '', 'user');
      $username    = sfContext::getInstance()->getUser()->getAttribute('username', '', 'email'); 
      $snFbAccessToken = sfContext::getInstance()->getUser()->getAttribute('accesstoken', '', 'user'); 
      if(strlen($snFbUid) > 0 && strlen($snFbAccessToken) > 0) 
      { 
        $user     = Doctrine::getTable('User')->listingUser($snFbUid, 'fb_uid');
        $userdata = Doctrine::getTable('User')->listingUser($username, 'email');
        if(sizeof($user)<1 && sizeof($userdata)<1) 
          $this->redirect('login/fbRegistration');   
        else
          $this->getUser()->setFlash('login_success', 'Login successfully');
      } 
    } 
    $this->getUser()->setFlash('error_message', 'you are not able to login using  facebook'); 
  }
  /** 
  * Executes home.
  * 
  * @param sfRequest $request A request object 
  * 
  * @return void 
  * 
  */ 
  public function executeHome($request)
  {
	/*$my_api    = new my_api();
	$data      = $my_api->file_upload($request->getFiles());
    $url       = 'http://153.symfonypractice.snl/registration/api';
	$image     = fopen($data, "rb");

	$curl      = curl_init($url);
	if (is_resource($curl) === true)
	{
		curl_setopt($curl, CURLOPT_HEADER, false);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_BINARYTRANSFER, 1);
		curl_setopt($curl, CURLOPT_PUT, 1);
		curl_setopt($curl, CURLOPT_INFILE, $image);
		curl_setopt($curl, CURLOPT_INFILESIZE, filesize($data));
		$this->result = curl_exec($curl);
		curl_close($curl); 
	}	*/
	
	
    /*$restServerUrl = "http://153.symfonypractice.snl/registration/api";
    $params="";
    $params=array('id_article' => '4');
    $result	= sfGeneral::call_rest_api($restServerUrl);
	$image = fopen($file_on_dir_not_url, "rb");

    echo $result;
    echo "<br><br>";
    //print_r(json_decode($result));
    die();*/
	
  }
  
 /** 
  * Executes api.
  * 
  * @param sfRequest $request A request object 
  * 
  * @return void 
  * 
  */ 
  public function executeApi($request)
  {
    if ($putdata = file_get_contents('php://input'))
    {
        $name = rand();
		$photo_url = sfConfig::get("sf_upload_dir").'/api_images';
		
		if(!is_dir($photo_url))
            mkdir($photo_url, -777);   
		$photo_url .= '/image'.$name.'.jpg';
        $fp = fopen($photo_url, "w");
        
		/*  write data to the file */		
		fwrite($fp, $putdata);		

		/* Close the streams */
		fclose($fp);
    }

    echo 'image uploaded successfully';exit;
 /* $my_api          = new my_api();
    $sfGeneral       = new sfGeneral();
	$category_id     = $request->getParameter('category_id');
	$product_id      = $request->getParameter('product_id');
	$sub_category_id = $request->getParameter('sub_category_id');
	$return_url      = $request->getParameter('return_url');
	$name            = $request->getParameter('name');
	$parentId        = $request->getParameter('parent_id');
	
    if(strtoupper($request->getMethod() == "GET")) 
    {
	    if(!empty($category_id))
	        $result  = $sfGeneral->get_category($category_id);
	    else 
		    $result  = $sfGeneral->get_category(''); 
        $this->getResponse()->setContentType('application/json'); 			
		return $this->renderText($result);exit;
	    //$this->redirect($return_url.'?result='.$result);   
	}
	else if(strtoupper($request->getMethod() == "POST")) 
	{	
        	
	    $my_api->insert(
			'Category',
			array(
				'category_id' => '', 
				'name'        => $request->getParameter('name'),
				'parent_id'   => $request->getParameter('parent_id')								
			)		
		);
	    echo 'method is post';exit;
	}
	else if(strtoupper($request->getMethod() == "PUT")) 
	{
	    if($request->getParameter('product_id'))
		{
			$my_api->update(
			    'Product', 
				'product_id', 
				$request->getParameter('product_id'), 
				array(
				    'product_id'  => $request->getParameter('product_id'), 
				    'name'        => $request->getParameter('name'),
					'price'       => $request->getParameter('price'),
					'description' => $request->getParameter('description'),
					'image'       => $request->getParameter('image')
				)
			); 
			
	    }
		else if($request->getParameter('category_id'))
		{
			$my_api->update(
			    'Category', 
				'category_id', 
				$request->getParameter('category_id'), 
				array(
				    'category_id' => $request->getParameter('category_id'),
					'name'        => $request->getParameter('name'), 
					'parent_id'   => $request->getParameter('parent_id')
				)
			); 
			echo 'one row updated';exit;
		}
		else
		{
			echo "Requered parameter is Empty pass proper data";
		}
	    exit;
	}
	else if(strtoupper($request->getMethod() == "DELETE")) 
	{
	    if($request->getParameter('category_id'))
	        $my_api->deleteData('category_id', $request->getParameter('category_id'), 'Category');	        
		else
		    $my_api->deleteData('product_id', $request->getParameter('product_id'), 'Product');
			
		echo $request->getParameter('category_id');	
		echo $request->getParameter('product_id');
        echo 'one row deleted';		
		exit;
	} 
	else
	{
	   echo 'invalid request';exit;
	} */
    
  }
 /** 
  * Executes twitter authentication action 
  * 
  * @param sfRequest $request A request object 
  * 
  * @return void 
  * 
  */ 
  public function executeTwitterAuth($request)
  {
    $oauth_token = sfContext::getInstance()
      ->getUser()
      ->getAttribute('oauth_token', '', 'oauth_token'); 
    
    $oauth_token_secret = sfContext::getInstance()
      ->getUser()
      ->getAttribute('oauth_token_secret', '', 'oauth_token_secret');    
    $app_consumer_key = sfConfig::get("app_consumer_key");
    $app_consumer_scret = sfConfig::get("consumer_secret");
    $oauth = new TwitterOAuth(
        $app_consumer_key,
        $app_consumer_scret,
        $oauth_token,
        $oauth_token_secret
    );
    $array = $oauth->getAccessToken($request->getParameter('oauth_verifier'));
    
   /**
    * Permanent access tokens
    */
   sfContext::getInstance()->getUser()->setAttribute('access_token', $array['oauth_token'], 'oauth_token');    
   sfContext::getInstance()->getUser()->setAttribute(
       'access_token_secret', 
       $array['oauth_token_secret'], 
       'oauth_token_secret'
   );    
   sfContext::getInstance()->getUser()->setAttribute('username', $array['screen_name'], 'email');          
   sfContext::getInstance()->getUser()->setAttribute('userid', $array['user_id'], 'userid');    
   if(sizeof($array)>1)
   {
     $user = Doctrine::getTable('User')->listingUser($array['screen_name'], 'username');
     if(sizeof($user)<1) 
       $this->redirect('login/fbRegistration');  
     else
     {
        $this->getUser()->setFlash('login_success', 'Login successfully');
        $this->redirect('login/home');
     } 
   }
  }
 /** 
  * Executes Tweet action 
  * 
  * @param sfRequest $request A request object 
  * 
  * @return void 
  * 
  */ 
  public function executeTweet($request)
  {  
    $oauth_token        = sfContext::getInstance()->getUser()->getAttribute('oauth_token', '', 'oauth_token');    
    $oauth_token_secret = sfContext::getInstance()->getUser()->getAttribute('oauth_token_secret', '', 'oauth_token_secret');    
    $app_consumer_key   = sfConfig::get("app_consumer_key");
    $app_consumer_scret = sfConfig::get("app_consumer_secret");
    $connection         = new TwitterOAuth($app_consumer_key, $app_consumer_scret, $oauth_token, $oauth_token_secret);
    $array              = $connection->getAccessToken($request->getParameter('oauth_verifier'));
    $message            = sfContext::getInstance()->getUser()->getAttribute('message', '', 'message');   
    $parameters         = array('status' => $message);
    $status             = $connection->post('statuses/update', $parameters);
    print_r($status);
    $this->redirect('login/login');
  }
 /** 
  * Executes facebook authentication action 
  * 
  * @param sfRequest $request A request object 
  * 
  * @return void 
  * 
  */ 
  public function executeFacebookWall(sfWebRequest $request)
  {
    if($request->hasParameter('code') && strlen(trim($request->getParameter('code'))) > 0) 
    { 
      $ssCode          = $request->getParameter('code'); 
      $ssReturnUrl     = "http://".$request->getHost()."/login/facebookWall/"; 
      sfGeneral::getFbUidAndAccessToken($ssCode, $ssReturnUrl);
      $snFbAccessToken = sfContext::getInstance()->getUser()->getAttribute('accesstoken', '', 'user'); 
      $message         = sfContext::getInstance()->getUser()->getAttribute('message', '', 'message');   
      $asParams        = array('access_token'=>$snFbAccessToken, 'message'=>$message);
      $url             = 'https://graph.facebook.com/me/feed';
      $ch              = curl_init();
      curl_setopt_array(
          $ch, 
          array(
              CURLOPT_URL => $url, 
              CURLOPT_POSTFIELDS => $asParams,
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_SSL_VERIFYPEER => false,
              CURLOPT_VERBOSE => true
          )
      );
      $result = curl_exec($ch);
      curl_close($ch);
      $this->redirect('login/login');
    }
  }
  /** 
  * Executes logout action 
  * 
  * @param sfRequest $request A request object 
  * 
  * @return void 
  * 
  */ 
  
  public function executeLogout($request)
  {  
    $this->getUser()->logout();
    $this->redirect('login/login');   
  }
  
 /** 
  * Executes fb_tw_wall action 
  * 
  * @param sfRequest $request A request object 
  * 
  * @return void 
  * 
  */
   
  public function executeFb_tw_wall($request)
  { 
    $temp    = $request->getParameter('hdd_tw_fb_wall'); 
    $message = $request->getParameter('message'); 
    sfContext::getInstance()->getUser()->setAttribute('message', $message, 'message');   
    
    if($temp && $temp == 'fb_wall')
    {
      $ssReturnUrl = "http://".$request->getHost()."/login/facebookWall/"; 
      $ssUrl       = sfGeneral::getFacebookUrl($ssReturnUrl);
      header('location:'. $ssUrl);
    }
    else
    {
      $ssReturnUrl = "http://".$request->getHost()."/login/tweet/";
      $ssUrl       = sfGeneral::getTwitterUrl($ssReturnUrl);
      header('location:'.$ssUrl);
    }
    exit;
  }
}  
