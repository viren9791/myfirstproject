<?php

 /**
 * dummyCart actions.
 *
 * @package    Myfirstproject
 * @subpackage DummyCart
 * @author     viren   <virendav.vitrainee@gmail.com>     
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class dummyCartActions extends sfActions
{
  /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  *
  * @return None
  */
  
  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('default', 'module');
  }
  
 /**
  * Executes AddToCart action
  *
  * @param sfRequest $request A request object
  *
  * @return None
  */
  
  public function executeAddToCart(sfWebRequest $request)
  {
    if($this->getUser()->hasAttribute('user'))
    {
	    if($request->getParameter('id_edit'))
	        $productId = $request->getParameter('id_edit');
	    else
	        $productId = $this->getUser()->getAttribute('product_id');
            $userId    = $this->getUser()->getAttribute('userId');
            $price     = $this->getUser()->getAttribute('price');
            $this->getUser()->getAttributeHolder()->remove('product_id');
            $this->getUser()->getAttributeHolder()->remove('price');
            $this->getUser()->getAttributeHolder()->remove('product_id');
        if(!empty($productId))
        {
            $addToCart = Doctrine_Core::getTable('DummyCart')->findOneByProduct_id($productId);
        } 
        if(!empty($addToCart))
        {
		    if($request->getParameter('quantity'))
	            $quantity = $request->getParameter('quantity');
	        else
	            $quantity = $addToCart->getQuantity()+1;
            $this->DummyCartForm = new DummyCartForm($addToCart);
            $this->DummyCartForm->getObject()->setPrice($addToCart->getPrice());
            $this->DummyCartForm->getObject()->setUser_id($addToCart->getUser_id());
            $this->DummyCartForm->getObject()->setProduct_id($addToCart->getProduct_id());
            $this->DummyCartForm->getObject()->setQuantity($quantity);
            $this->DummyCartForm->bind(
                $request->getParameter($this->DummyCartForm->getName()),
                $request->getFiles($this->DummyCartForm->getName())
            );
            if($this->DummyCartForm->isValid())
            {
                $this->DummyCartForm->save();
            } 
        }
        else
        { 
            $this->DummyCartForm = new DummyCartForm();
            $this->DummyCartForm->getObject()->setPrice($price);
            $this->DummyCartForm->getObject()->setUser_id($userId);
            $this->DummyCartForm->getObject()->setProduct_id($productId);
            $this->DummyCartForm->getObject()->setQuantity(1);
            $this->DummyCartForm->bind(
                $request->getParameter($this->DummyCartForm->getName()), 
                $request->getFiles($this->DummyCartForm->getName())
            );
            if ($this->DummyCartForm->isValid())
                $this->DummyCartForm->save();   
        } 
        $this->products = Doctrine_Core::getTable('DummyCart')->listing($userId);
        $this->oPaypal  = new GoPayPal(THIRD_PARTY_CART);
        $this->oPaypal->sandbox   = true;
        $this->oPaypal->openInNewWindow = false;      
        $ssPaypalBussinessAccount = sfConfig::get('app_business_account');
        $ssPaypalCurrancyCode     = sfConfig::get('app_currancy_code');
        $ssPaypalCountryCode      = sfConfig::get('app_country_code');
        $ssPaypalReturnUrl        = "http://".$this->getRequest()->getHost()."/dummyCart/addToCart";
        $ssPaypalNotifyUrl        = "http://".$this->getRequest()->getHost()."/addToCart";
      
        $this->oPaypal->set('business', $ssPaypalBussinessAccount);
        $this->oPaypal->set('currency_code', $ssPaypalCurrancyCode);
        $this->oPaypal->set('country', $ssPaypalCountryCode);
        $this->oPaypal->set('return', $ssPaypalReturnUrl);
        $this->oPaypal->set('notify_url', $ssPaypalNotifyUrl); 
        $this->oPaypal->set('rm', 2); // return by POST
        $this->oPaypal->set('no_note', 0);
        $this->oPaypal->set('custom', md5(time()));
        $this->oPaypal->set('cbt', 'Go to Dave shoping Zone'); 
        $this->oPaypal->set('handling_cart', 1); 
        $this->oPaypal->set('tax_cart', 0.29);

        $snSubTotal = $snDiscount = $snTotal = 0;
        foreach($this->products as $snKey => $asCart)
        {
            $snProdTotal = ($asCart['price'] * $asCart['quantity'] );     
        $oItem = new GoPayPalCartItem();
        $oItem->set('item_name', $asCart['Product']['name']);
        $oItem->set('item_number', $snKey+1);
        $oItem->set('amount', number_format($snProdTotal, 2, '.', ''));
        $oItem->set('quantity', $asCart['quantity']);
        $oItem->set('shipping', 0);
        $oItem->set('handling', 1); 
        $this->oPaypal->addItem($oItem);    
    }
    $ssButtonCaption = 'Pay via paypal';
    $this->oPaypal->setButton('<button class="paypal" type="submit">'.$ssButtonCaption.'</button>');
    $this->ssPaypalButton = $this->oPaypal->html();
    }
    else
        $this->redirect('login/login');
  }  
  
 /**
  * Executes delete action
  *
  * @param sfRequest $request A request object
  *
  * @return None
  */
  
  public function executeDelete(sfWebRequest $request)
  {
    if(!$this->getUser()->hasAttribute('user'))
      $this->redirect('@login'); 
    else
    {
      $deleteId  = $request->getParameter('id_delete');
      $dummyCart = new dummyCart();
      $this->id_delete = $dummyCart->delete_dataCart($request->getParameter('id_delete')); 
      $this->getUser()->setFlash('success', 'One row Deleted');
      $this->redirect('dummyCart/addToCart'); 
    } 
  }
}
