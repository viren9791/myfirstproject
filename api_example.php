(12:07:20 PM) Atul Sir: 
Example 
----------------
We implemented test API for login ,
I have tested with curl using different parameters,
Please find information as given below 

Method : POST
Parameters : username, password
URL :  http://mypromotid.laitos.com/api
Response will in JSON format.

(1)  curl -X POST -d username=test7@test.com -d password=test12 http://mypromotid.laitos.com/api
With true parameters it will return logged in individual user 's merchant list.

[{"id_merchant":1,"merchant_name":"1-800-PetMeds"},{"id_merchant":369,"merchant_name":"1000Bulbs"},{"id_merchant":478,"merchant_name":"123inkjets.com"},{"id_merchant":662,"merchant_name":"21jun Merchant"},{"id_merchant":643,"merchant_name":"24Feb-merchant"},{"id_merchant":577,"merchant_name":"39 Dollar Glasses.com"},{"id_merchant":4,"merchant_name":"Apothica LLC"},{"id_merchant":5,"merchant_name":"Apple iTunes"},{"id_merchant":323,"merchant_name":"Appleseeds"},{"id_merchant":458,"merchant_name":"AppliancePartsPros.com"}]

(2)  curl -X POST -d username1=test7@test.com -d password=test12 http://mypromotid.laitos.com/api
By using wrong parameter name or wrong metho other than POST it will return error as below,

{"error":"Invalid request"}

(3) curl -X POST -d username=testing -d password=test http://mypromotid.laitos.com/api
By using wrong parameter value it will return error as below,
{"error":"Invalid credentials"}
----------------------------------

(12:20:18 PM) Atul Sir: 
----------------------------------------------
<?php 
 
/** 
 * api actions. 
 * 
 * @package    Mypromotid 
 * @subpackage Api 
 * @author     Atul <atul@virtueinfo.com> 
 * @version    SVN: $Id: actions.class.php,v 1.2 2012/06/05 12:28:28 atul Exp $ 
 */ 
sfProjectConfiguration::getActive()->loadHelpers('I18N'); 
class apiActions extends sfActions 
{ 
    /** 
     * Executes index action 
     * 
     * @param sfRequest $request A request object 
     */ 
    public function executeIndex(sfWebRequest $request) 
    { 
        $out = array(); 
        if(strtoupper($request->getMethod() == "POST")) 
        { 
            if($request->getParameter('username') && $request->getParameter('password')) 
            { 
                $oLoginValidator = new LoginValidator(); 
                $oUser = $oLoginValidator->validLogin(trim($request->getParameter('username')), trim($request->getParameter('password')), ''); 
                if($oUser == true) 
                { 
                    $snIdUser = $this->getUser()->getAttribute('idIndividual', '', 'user'); 
                    $asIndividualMerchant = IndividualMerchant::getIndividualMerchants($snIdUser); 
 
                    foreach($asIndividualMerchant as $ssIndividualMerchant) 
                    { 
                        $entry = array(); 
                        $entry['id_merchant']   = (int)$ssIndividualMerchant["id_merchant"]; 
                        $entry['merchant_name'] = $ssIndividualMerchant["merchant_name"] ? $ssIndividualMerchant["merchant_name"] : null; 
                        $out[] = $entry;                            
                    } 
                    $this->getResponse()->setContentType('application/json'); 
                    return $this->renderText(sfApiGeneral::jsonEncode($out));     
                } 
                else 
                { 
                      $out['error'] = __("Invalid credentials");       
                      sfApiGeneral::sendResponse(401, sfApiGeneral::jsonEncode($out));   
                }     
            } 
            else 
            { 
                $out['error'] = __("Invalid request"); 
                sfApiGeneral::sendResponse(400, sfApiGeneral::jsonEncode($out)); 
            } 
        } 
        else 
        { 
            $out['error'] = __("Invalid request"); 
            sfApiGeneral::sendResponse(400, sfApiGeneral::jsonEncode($out)); 
            return $this->renderText(sfApiGeneral::jsonEncode($out));   
        }        
    } 
}
--------------------------------------

(12:21:55 PM) Atul Sir: 
General class 
-------------------------------
<?php 
/** 
 * General class 
 * 
 * @package    PromotId 
 * @subpackage General 
 * @author     Atul <atul@virtueinfo.com> 
 * @version    SVN: $Id: sfApiGeneral.class.php,v 1.1 2012/05/30 09:18:39 atul Exp $ 
 */ 
class sfApiGeneral 
{ 
    /** 
     * This function is send reponse with header part 
     * 
     * @param integer $snStatus      status code 
     * @param string  $ssContent     content converted into json 
     * @param string  $ssContentType set content type 
     * 
     * @return void 
     */ 
    public static function sendResponse($snStatus = 200, $ssContent = '', $ssContentType = 'application/json') 
    { 
        $response = sfContext::getInstance()->getResponse(); 
 
        // set the content type 
        $response->clearHttpHeaders(); 
        $response->setStatusCode($snStatus); 
        $response->setContentType($ssContentType); 
        $response->sendHttpHeaders(); 
        echo $ssContent; 
        exit; 
    } 
 
    /** 
     * Generate unique access token. 
     * 
     * @return string An unique access token. 
     * 
     */ 
    public static function generateToken() 
    { 
        return md5(base64_encode(pack('N6', mt_rand(), mt_rand(), mt_rand(), mt_rand(), mt_rand(), uniqid()))); 
    } 
    /** 
     * This function is send reponse with header part 
     * 
     * @param integer $snStatus      status code 
     * @param string  $ssContent     content converted into json 
     * @param string  $ssContentType set content type 
     * 
     * @return void 
     */ 
    public static function sendResponse($snStatus = 200, $ssContent = '', $ssContentType = 'application/json') 
    { 
        $response = sfContext::getInstance()->getResponse(); 
 
        // set the content type 
        $response->clearHttpHeaders(); 
        $response->setStatusCode($snStatus); 
        $response->setContentType($ssContentType); 
        $response->sendHttpHeaders(); 
        echo $ssContent; 
        exit; 
    }
    /** 
     * jsonEncode 
     *  
     * @param array $out out data 
     * 
     * @return string json encoded string 
     * 
     */ 
    public static function jsonEncode($out = '') 
    { 
        return json_encode($out); 
    } 
}

---------------------------------
-------------------------
<?php    
 
class sfGeneral 
{    

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

}
----------------------------------------------------
(5:19:29 PM) Atul Sir: 
----------------------------------------------------
<?php

//Sample rest api client demo script 

require_once('lib/sfGeneral.class.php');

$restServerUrl = "http://153.symfonypractice.snl/registration/api?id_article=4";

//$params="";
//$params=array('id' => '11222222','id2' => '2');
$result	= sfGeneral::call_rest_api($restServerUrl);

echo $result;

echo "<br><br>";
print_r(json_decode($result));
die();

?>
----------------------------------------------------

<?php

//Sample rest api client demo script 

require_once('lib/sfGeneral.class.php');

$restServerUrl = "http://153.symfonyprojects.vrn/login/api?category_id=2";

//$params="";
//$params=array('id' => '11222222','id2' => '2');
$result	= sfGeneral::call_rest_api($restServerUrl);

echo $result;

echo "<br><br>";
print_r(json_decode($result));
die();

?>

---------------------------------------------------