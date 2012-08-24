<?php

  /**
   * category actions.
   *
   * @package    Myfirstproject
   * @subpackage Category
   * @author     viren   <virendav.vitrainee@gmail.com>     
   * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
   */
   
class categoryActions extends sfActions
{ 
    /**
    * Executes index action
    *
    * @param sfRequest $request A request object
    *
    * @return none
    */
    
    public function executeIndex(sfWebRequest $request)
    {
      $this->forward('default', 'module');
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
      $productId = $request->getParameter('product_id');     
      $valueId = $request->getParameter('value_id');     
      $categoryId = $request->getParameter('category_id'); 
      if($productId)
      {  
        $this->product = Doctrine_Core::getTable('ProductAttribute')
         ->listingAttributeWiseImage('ASC', $productId, $valueId);
             
        foreach($this->product as $data)
        {
          $ProductAttribute[] = $data['ProductAttribute'];
          $productId   = $data['product_id'];     
        }

        foreach($ProductAttribute as $AttributeValue)
        {
          $price = $AttributeValue[0]['price']; 
          $image = $AttributeValue[0]['image'];
        }
        return $this->renderPartial('list', array('img' => $image, 'productId'=>$productId, 'price' => $price));  
      }
      else
      {
        $this->product = Doctrine_Core::getTable('ProductAttribute')
         ->listingProductAttribute('ASC', '', $categoryId)       
         ->fetchArray();  
        foreach($this->product as $data)
        {
           $image = $data['image'];
           $productId   = $data['product_id'];
        }  
        if(empty($this->product))
        {
           $this->getUser()->setFlash('noRecordFound', 'No Record Found');
        }   
      } 
    }

    /**
    * Executes ProductDetails action
    *
    * @param sfRequest $request A request object
    *
    * @return none
    */
    public function executeProductDetails(sfWebRequest $request)
    {
     
      $this->product = Doctrine_Core::getTable('ProductAttribute')
        ->listingProductAttribute('ASC', $request->getParameter('product_id'), '')       
        ->fetchArray();
      $result = Doctrine_Query::create()
        ->from('Product p')
        ->where('p.product_id='.$request->getParameter('product_id'))
        ->fetchArray();
      $this->getUser()->setAttribute('product_id', $result[0]['product_id']);
      $this->getUser()->setAttribute('price', $result[0]['price']);
      $this->result = $result;
    }
}
