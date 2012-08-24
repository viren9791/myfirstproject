<?php

sfProjectConfiguration::getActive()->loadHelpers('I18N');

/**
* products actions.
*
* @package    Myfirstproject
* @subpackage Product
* @author     viren   <virendav.vitrainee@gmail.com>     
* @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
*/
class productsActions extends sfActions
{
  
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  *
  * @return void
  */
  
  public function executeIndex(sfWebRequest $request)
  {
    $this->redirect('@product_list');
  }
  
  /**
  * Executes listAttributeValue action
  *
  * @param sfRequest $request A request object
  *
  * @return String
  */
  
  public function executeListAttributeValue(sfWebRequest $request)
  { 
    $values =  Doctrine_Core::getTable('ProductAttribute')
      ->listingAttributeValueById($request->getParameter('attribute_id')); 
    $this->ProductAttributeForm = new ProductAttributeForm();
    $this->ProductAttributeForm->setWidgets(
        array(
            'attribute_value_id' => new sfWidgetFormDoctrineChoice(
                array(
                    'model'=>'AttributeValues',
                    'method'=>'getValue',
                    'query'=>$values
                ),
                array(
                    'tabindex'=>'7', 
                    'class'=>'textbox_standard'
                )          
            )
        )
    );    
    return $this->renderPartial('value');         
  }
  
 /**
  * Executes productAttributeList action
  *
  * @param sfRequest $request A request object
  *
  * @return none
  */
  
  public function executeProductAttributeList(sfWebRequest $request)
  {
    $this->oPager = new sfDoctrinePager('Product', 10);
    if($request->getParameter('sortBy'))
      $sortBy = $request->getParameter('sortBy');
    else  
      $sortBy = 'ASC';  
    if($request->getParameter('find'))
    {
      $product = Doctrine_Core::getTable('ProductAttribute')
          ->listingProductAttributeAdmin($sortBy, $request->getParameter('find'));      
      $this->oPager->setQuery($product);
    }  
    else
    {    
      $product = Doctrine_Core::getTable('ProductAttribute')
          ->listingProductAttributeAdmin($sortBy, '');   
      $this->oPager->setQuery($product);
    } 
    $this->oPager->setPage($this->getRequestParameter('page', 1));
    $this->oPager->init();
    $this->listRecords = $this->oPager->getResults(Doctrine::HYDRATE_ARRAY);
    $this->ProductAttributeForm = new ProductAttributeForm();   
    if ($request->isMethod('post'))
    {
      $this->ProductAttributeForm->bind(
          $request->getParameter($this->ProductAttributeForm->getName()), 
          $request->getFiles($this->ProductAttributeForm->getName())
      );
      if ($this->ProductAttributeForm->isValid())
      {
          $this->ProductAttributeForm->save(); 
          $this->getUser()->setFlash('successMsg', __('msg_insert_success'));       
          $this->redirect('@product_attribute');                   
      }   
      else
        echo $this->ProductAttributeForm->getErrorSchema();exit;
    }
  } 
   
 /**
  * Executes Delete action
  *
  * @param sfRequest $request A request object
  *
  * @return none
  */
  
  public function executeDelete(sfWebRequest $request)
  {
    if(!$this->getUser()->hasAttribute('user'))
        $this->redirect('@login');
    else
    {
        $Product = new Product();
        $this->id_delete = $Product->delete_dataProduct($request->getParameter('id_delete')); 
        $this->getUser()->setFlash('success', __('msg_delete_success'));
        $this->redirect('@product_list');  
    }   
  }  
  
 /**
  * Executes list action
  *
  * @param sfRequest $request A request object
  *
  * @return none
  */
  
  public function executeList(sfWebRequest $request)
  {
    if(!$this->getUser()->hasAttribute('user'))
        $this->redirect('@login'); 
    else
    {
        $this->oPager = new sfDoctrinePager('Product', 2);
      if($request->getParameter('sortBy'))
        $sortBy = $request->getParameter('sortBy');
      else  
        $sortBy = 'ASC';  
      if($request->getParameter('find'))
      {
        $product = Doctrine_Core::getTable('Product')->listingProduct($sortBy, $request->getParameter('find'));      
        $this->oPager->setQuery($product);
      }  
      else
      {   
        $product = Doctrine_Core::getTable('Product')->listingProduct($sortBy, '');      
        $this->oPager->setQuery($product);
      } 
      $this->oPager->setPage($this->getRequestParameter('page', 1));
      $this->oPager->init();
    } 
  }
  
 /**
  * Executes gallary action
  *
  * @param sfRequest $request A request object
  *
  * @return none
  */
  
  public function executeGallary($request)
  {  
  }
  
 /**
  * Executes Add action
  *
  * @param sfRequest $request A request object
  *
  * @return none
  */
  
  public function executeAdd($request)
  {  
    if(!$this->getUser()->hasAttribute('user'))
      $this->redirect('@login');   
    else
    {
      $this->id_edit = $request->getParameter('id_edit');
      if($this->id_edit)
      {
        $Product  = Doctrine_Core::getTable('Product')->find($this->id_edit);
        $category = Doctrine::getTable('category')->getAllCategoryOptions();
        $product1 = Doctrine_Core::getTable('Product')->listing($this->id_edit);
        foreach($product1 as $p)
        {
          for($i=0;$i<sizeof($p['ProductDetails']);$i++)
          {
            $category_id[] =  $p['ProductDetails'][$i]["category_id"];            
          }
        } 
        $this->form = new sfForm();
        $this->form->setWidgets(
            array(
                'category_id' => new sfWidgetFormDoctrineChoice(
                    array(
                        'multiple'  => 'true',
                        'model'     => 'Product',
                        'method'    => 'getName',
                        'add_empty' => 'Main',
                        'query'     => $category,
                        'default'   => $category_id
                    ),
                    array('tabindex' => '7', 'class'    => 'textbox_standard')          
                ),
            )
        );
        $this->form->setValidators(
            array(
                'category_id' => new sfValidatorDoctrineChoice(
                    array('model'    => 'Category', 'required' => false)
                ),
            )
        );    
        $this->productForm = new ProductForm($Product);
      }
      else
      {
        $product = Doctrine::getTable('category')->getAllCategoryOptions();
        $this->form = new sfForm();
        $this->form->setWidgets(
            array(
                'category_id' => new sfWidgetFormDoctrineChoice(
                    array(
                        'multiple'  => 'true',
                        'model'     => 'Product',
                        'method'    => 'getName',
                        'add_empty' => 'Main',
                        'query'     => $product
                    ),
                    array('tabindex' => '7', 'class'    => 'textbox_standard')          
                ),
            )
        );
        $this->form->setValidators(
            array(
                'category_id' => new sfValidatorDoctrineChoice(
                    array('model'    => 'Category', 'required' => false))));   
        $this->productForm = new ProductForm();
      }         
     if ($request->isMethod('post'))
     { 
       $productData = $request->getParameter($this->productForm->getName());
       $this->productForm->bind($productData, $request->getFiles($this->productForm->getName()));
       if ($this->productForm->isValid())
       {       
         $thumbnail     = new sfGeneral();
         $fileName      = $this->productForm->getValue('image');
         $thumbnailName = $this->productForm->getValue('name').'.png';
         $this->productForm->save();
         $product_id    = $this->productForm->getObject()->product_id;
         $category_id   = $request->getPostParameter('category_id');
         if(!empty($category_id) && $this->id_edit)
           $this->getUser()->setFlash('success', __('msg_edit_success'));
         else
           $this->getUser()->setFlash('success', __('msg_insert_success'));        
         foreach($category_id as $category)
         {
           $ProductDetails = new ProductDetails();
           $ProductDetails->setProduct_id($product_id);
           $ProductDetails->setCategory_id($category);
           $ProductDetails->save();
         } 
         $thumbnail->createThumbnailUser('100px', '100px', $fileName, 'image/png', $thumbnailName);   
         $this->redirect('@product_list');                   
       }
     } 
    }
  }  
}