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
    $ssReturnUrl   = "http://".$request->getHost()."/login/home/";
	$categoryId    = '';
	$subCategoryId = ''; 
	$productId     = '';
    $my_api        = new my_api();
    echo $uri      = $my_api->getUri($ssReturnUrl, $categoryId, $subCategoryId, $productId); exit;
	header('location:'. $uri);
	
  }
  
 /** 
  * Executes home.
  * 
  * @param sfRequest $request A request object 
  * 
  * @return void 
  * 
  */ 
  public function executeApi($request)
  {
    echo 'jsk';exit;
    $returnUri = $request->getParameter('return_url');
    $my_api    = new my_api();
	$category  = $my_api->get_category('');
	$this->categories = json_decode($category); 
	$returnUri.= "?";
	header('location:'. $uri); 
  }
