<?php
session_start();

if(!empty($_SESSION))
	header("Location: home.php");

mysql_connect('localhost', 'test', 'test');
mysql_select_db('test_vrn');

/* 
 * We require the library 
 */
 require("facebook.php");

/* 
 * Creating the facebook object
 */
 $facebook = new Facebook(array(
	'appId'  => '158166530974662',
	'secret' => '6fea68d4718dd66b2b94c94bd0e0a8bb',
	'cookie' => true
 ));

/* 
 * Let's see if we have an active session
 */
 
 $session = $facebook->getSession();

 if(!empty($session)) 
 {
	/* 
     * Active session, let's try getting the user id (getUser()) and user info (api->('/me'))
	 */
	try
	{
		$uid = $facebook->getUser();
		$user = $facebook->api('/me');
	} 
	catch (Exception $e)
	{}
	
	if(!empty($user))
	{
	    $query = mysql_query(
		   "SELECT * FROM users WHERE oauth_provider = 'facebook' AND oauth_uid = ". $user['id']);
		$result = mysql_fetch_array($query);		
		
		if(empty($result))
		{
			$query  = mysql_query(
			   "INSERT INTO users (oauth_provider, oauth_uid, username) VALUES 
			   ('facebook', {$user['id']}, '{$user['name']}')");
			$query  = msyql_query("SELECT * FROM users WHERE id = " . mysql_insert_id());
			$result = mysql_fetch_array($query);
		}
		$_SESSION['id']             = $result['id'];
		$_SESSION['oauth_uid']      = $result['oauth_uid'];
		$_SESSION['oauth_provider'] = $result['oauth_provider'];
		$_SESSION['username']       = $result['username'];
	}
	else 
	{
	    die("There was an error.");
	}
	
 } 
 else 
 {
	$login_url = $facebook->getLoginUrl();
	header("Location: ".$login_url);
 }