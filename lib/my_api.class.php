<?php

/**
* my_api
* 
* @package    Myfirstproject
* @subpackage Lib
* @author     viren   <virendav.vitrainee@gmail.com>    
* @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
*/

class my_api extends Exception 
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
	
	/** 
     * insert 
     *  
     * @param array $out out data 
     * 
     * @return string json encoded string 
     * 
     */ 
    public  function insert($model, $data) 
    { 
		$category = new Category();
		foreach($data as $key=>$value)
		{
			$category->set($key,$value);		
		}
        $category->save();
        
    }
	
	/** 
     * update 
     *  
     * @param array $out out data 
     * 
     * @return string json encoded string 
     * 
     */ 
    public  function update($model, $field, $value, $updateData) 
    {  
	    $q  = Doctrine_Query::create()
			->update($model.' m' );
        foreach ($updateData as $fieldName => $fieldValue)
			$q ->set('m.'.$fieldName, '?', $fieldValue);
	    $q ->where('m.'.$field.' = ?',$value);
        $q ->execute();
    }
	
	/** 
     * delete 
     *  
     * @param String $id id for delete
     * 
     * @return void
     * 
     */ 
    public  function deleteData($field, $value, $model) 
    { 
        if(!empty($field) && !empty($value) && !empty($model))
        {
            $query= Doctrine_Core::getTable($model)
                ->createQuery('c')
                ->where('c.'.$field.' = ?', $value)
                ->delete();
            $query->execute(array(), Doctrine::HYDRATE_RECORD);
        }
        else
            return false;  
    }
	
   /** 
    * Get url as per given return url 
    * 
    * @param string $ssReturnUrl stores return url
	* @param string $categoryId stores category id
	* @param string $productId stores product id
	* @param string $subCategoryId stores sucategory id
    * 
    * @return string url 
    * 
    */
	 
     public function getUri($ssReturnUrl, $categoryId) 
     { 
         $snFbClientId = sfConfig::get("app_fb_client_id"); 
 
         $ssUrl  = "http://153.symfonyprojects.vrn/login/api?"; 
	     $ssUrl .= "return_url=".$ssReturnUrl."&"; 
         $ssUrl .= "category_id=".$categoryId;  
         return $ssUrl; 
    }
	
    
	/**
     * Executes file_upload function to upload file
     *
     * @param String $image     stores image
     *
     * @author viren   <virendav.vitrainee@gmail.com>    
     * @access public
     * @return array
     */ 
  
     public function file_upload($image)
     {      
        foreach ($image as $fileName) 
		{
			$fileSize         = $fileName['size'];
			$fileType         = $fileName['type'];
			$theFileName      = $fileName['name'];
			$uploadDir        = sfConfig::get("sf_upload_dir");
			$Contacts_uploads = $uploadDir.'/viren';			
		}	
		
        if(!is_dir($Contacts_uploads))
		{
            mkdir($Contacts_uploads, -777);   
		}	
		
        if($fileSize < 4321000 && 
			(
				$fileType == 'image/jpeg' || 
			    $fileType == 'image/jpg'  || $fileType == 'image/png' || 
			    $fileType == 'image/bmp'  || $fileType == 'image/doc' || 
			    $fileType == 'image/docx' || $fileType == 'image/pdf' 
			) 
			
		)
		{
            if(
		        move_uploaded_file(
		            $fileName['tmp_name'], 
				    "$Contacts_uploads/$theFileName"
			    )
			)
			{
			    $filename = sfConfig::get("sf_upload_dir").'/viren/'.$theFileName;
				$handle   = fopen($filename, "rb");
				$contents = '';
				while (!feof($handle)) 
				{
					$contents .= fread($handle, 9192);
				}	
				fclose($handle);
				return $Contacts_uploads.'/'.$theFileName;//array('image' =>$contents, 'name' => $theFileName);
			}	
			else
                echo 'fail';			

		}
		else
		{
			$this->getUser()->setFlash(
				'notice', 
				'Error! File yang Anda Upload Gagal.'
			);
		}
        
	
    } 
}
