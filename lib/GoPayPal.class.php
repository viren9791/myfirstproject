<?php

define('PAYPAL_SANDBOX_SUBMIT_URL', 'https://www.sandbox.paypal.com/cgi-bin/webscr');
define('PAYPAL_SUBMIT_URL', 'https://www.paypal.com/cgi-bin/webscr');
/**
 * Pre-defined constants for all API types
 */
 
/* 
 * Buy Now button implementation 
 */
 
define('BUY_NOW', 'BUY_NOW');

/* 
 * Add To Cart button implementation 
 */         

define('ADD_TO_CART', 'ADD_TO_CART');       

/* 
 * Indivitual items with PayPal shopping cart implementation 
 */

define('PAYPAL_CART', 'PAYPAL_CART');     

/* 
 * Third-party shopping cart implementation with multiple items 
 */

define('THIRD_PARTY_CART', 'THIRD_PARTY_CART'); 

/* 
 * Donate button implementation 
 */

define('DONATE', 'DONATE');           

/* 
 * Buy Gift Certivicate button implementation 
 */

define('GIFT_CERTIFICATE', 'GIFT_CERTIFICATE'); 

/* 
 * Subscribe button implementation 
 */

define('SUBSCRIBE', 'SUBSCRIBE');
 
/**
* GoPayPal
* 
* @package    Myfirstproject
* @subpackage Lib
* @author     viren   <virendav.vitrainee@gmail.com>    
* @version    1.0
*/

class GoPayPal
{
  /*
   * PRIVATE ATTRIBUTES 
   */
  
  /* 
   *  form name / form id 
   */
   private  $name;      
  
   /* 
    *  name-value pairs for PayPal API  
    */
  private $variables;   
  
  /* 
   *  final form html 
   */
  
  private $html;
  
   /* 
  *  PayPal ready-made button or custom button 
  */
  
  private $button;    
  
  /* 
   *  cart items for shopping cart API
   */
   
  private $cartItems;   
  
  /* 
   *  various types of PayPal API 
   */
  private $type;      
  
  /*
  * PUBLIC ATTRIBUTES
  */
  
  /* 
   *  true of false; either open PayPal or not
     */  
  public  $openInNewWindow;   
  
  /* 
   *   true or false; either 'paypal', the real PayPal.com website or 'sandbox',
     *  www.sandbox.paypal.com test site
   */
  
  public  $sandbox; 
  
  /**
   * Constructor
   *
   * @author viren   <virendav.vitrainee@gmail.com>    
   * @access public
   * @param  String $type
   * @param  String $name
   *
   * @return none
   */
   
  public function GoPayPal($type = BUY_NOW, $name='frmPaypal')
  {
    $this->variables = array();
    $this->sandbox = false;
    $this->openInNewWindow = false;
    $this->setType($type);
  }
  
  /**
   * Access Public
   * Prepare variables for PayPal API form hidden fields
   *
   * @param  string$key
   * @param  string$value
   * @author viren   <virendav.vitrainee@gmail.com>    
   * @access public  
   *
   * @return none
   */ 
   
   public function set($key, $value)
   {
     $this->variables[$key] = $value;
   }
  
  /**
   * Access Public  
   *
   * @param  String $key
   * @author viren   <virendav.vitrainee@gmail.com>    
   * @access public
   *
   * @return String
   */   
   
   public function get($key)
   {
     return $this->variables[$key];
   }
  
  /**
   * Access Public
   * Define PayPal API type
   *
   * @param String $type 
   *
   * @return none
   */
   
  public function setType($type)
  {
    $this->type = $type;
    switch($type){
      case BUY_NOW:
          $this->set('cmd', '_xclick'); 
          $this->button = $this->getButton(BUY_NOW);  
          break;
      case DONATE:
          $this->set('cmd', '_donations');  
          $this->button = $this->getButton(DONATE); 
          break;  
      case SUBSCRIBE: 
          $this->set('cmd', '_xclick-subscriptions');
          $this->button = $this->getButton(SUBSCRIBE);
          break;
      case GIFT_CERTIFICATE:  
          $this->set('cmd', '_oe-gift-certificate');  
          $this->button = $this->getButton(GIFT_CERTIFICATE); 
          break;        
      case ADD_TO_CART:
          $this->set('cmd', '_cart'); 
          $this->set('add', 1);   
          $this->set('display', 1); 
          $this->button = $this->getButton(ADD_TO_CART);
          break;        
      case PAYPAL_CART:
          $this->set('cmd', '_cart'); 
          $this->set('add', 1);   
          $this->set('display', 1); 
          $this->button = $this->getButton(ADD_TO_CART);
          break;
      case THIRD_PARTY_CART:
          $this->set('cmd', '_cart'); 
          $this->set('upload', 1);  
          $this->button = $this->getButton(BUY_NOW);
          break;
    } 
  }   
  
  /**
   * Access Public
   * Get PayPal supported button HTML
   * Access Public  
   *
   * @param  String $type
   * @author viren   <virendav.vitrainee@gmail.com>    
   * @access public
   *
   * Return value of the specified variable name
   */
   
  public function getButton($type=''){
  
    if($this->button) 
      return $this->button;
    
    if( in_array($type, array(BUY_NOW, THIRD_PARTY_CART)) )
    {
      $button = '<input type="image" height="21" style="width:86;border:0px;"';
      $button .= 'src="https://www.paypal.com/en_US/i/btn/btn_paynow_SM.gif" border="0" name="submit" ';
      $button .= 'alt="PayPal - The safer, easier way to pay online!">';
    }
    elseif( $type == DONATE )
    {
      $button = '<input type="image" height="47" style="width:122;border:0px;"';
      $button .= 'src="https://www.paypal.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit"';
      $button .= 'alt="PayPal - The safer, easier way to pay online!">';
    }
    elseif( $type == SUBSCRIBE )
    {
      $button = '<input type="image" height="47" style="width:122;border:0px;"';
      $button .= 'src="https://www.paypal.com/en_US/i/btn/btn_subscribeCC_LG.gif" border="0" name="submit"';
      $button .= 'alt="PayPal - The safer, easier way to pay online!">';
    }
    elseif( $type == GIFT_CERTIFICATE )
    {
      $button = '<input type="image" height="47" style="width:179;border:0px;"';
      $button .= 'src="https://www.paypal.com/en_US/i/btn/btn_giftCC_LG.gif" border="0" name="submit"';
      $button .= 'alt="PayPal - The safer, easier way to pay online!">';
    }
    elseif( in_array($type, array(ADD_TO_CART, PAYPAL_CART)) )
    {
      $button = '<input type="image" height="26" style="width:120;border:0px;"';
      $button .= 'src="https://www.paypal.com/en_US/i/btn/btn_cart_LG.gif" border="0" name="submit"';
      $button .= 'alt="PayPal - The safer, easier way to pay online!">';
    }
    
    return $button;
  }
  
  /**
   * Access Public
   * Set custom button html without using PayPal button. This will override default PayPal button
   *
   * @param  string $html 
   *
   * @return none
   */
   
  public function setButton($html)
  {
    $this->button = $html;
  }
  
  /**
   * Access Public
   * Add GoPayPalCartItem object to GoPayPal object for shopping cart items
   *
   * @param String $item.
   *
   * @return none
   */ 
   
  public function addItem($item)
  { 
    $this->cartItems[] = $item;
  }
  
  /**
   * Access Private
   * Return HTML regarding with PayPal API cart item  
   *
   * @return none
   */   
   
  private function getCartItemsHtml()
  {
    $html = '';
    if(0 != sizeof($this->cartItems))
    {
      if(sizeof($this->cartItems) == 1 && 
         in_array($this->type, array(BUY_NOW, ADD_TO_CART, PAYPAL_CART)) )
      { 
        $oneItem = $this->cartItems[0];
        $vars = $oneItem->getVars();
        foreach($vars as $key => $value)
        {
          if( $vars[$key] !== "")
          {
            $id = 'pp-'.str_replace('_', '-', $key);
            $html .= '<input type="hidden" id="'.$id.'" name="'.$key.'" value="'.
            $value.'" />';
          }       
        }
      }
      else
      { 
        $x = 1;
        foreach($this->cartItems as $oneItem)
        {
          $vars = $oneItem->getVars();
          foreach($vars as $key => $value)
          {
            if( $vars[$key] !== "" )
            {
              $id = 'pp-'.str_replace('_', '-', $key).'-'.$x;
              $html .= '<input type="hidden" id="'.$id.'" name="'.
              $key.'_'.$x.'" value="'.$value.'" />';
            }       
          }
          $x += 1;
        }
      }
    }
    return $html;
  }
  
  /**
   * Access Public
   * Return entire form HTML for PayPal, but not include form closing tag </form>
   *
   * @return none
   */   
   
  public function getHtml()
  {
    /* *  Check for PayPal ID or an email address associated with PayPal account */
    if(!$this->get('business')){
      echo 'Need to set PayPal ID to the variable "business".<br>';
    }
    /* *  Prepare for form opening */
    
    if($this->sandbox == true) 
      $url = PAYPAL_SANDBOX_SUBMIT_URL;
    else 
      $url = PAYPAL_SUBMIT_URL;
    
    $this->html .= "<form name=\"{$this->name}\" action=\"{$url}\" method=\"post\"";
    if($this->openInNewWindow) 
      $this->html .= " target=\"_blank\"";
      
    $this->html .= ">\n";
        
    foreach( $this->variables as $key => $value )
    {
      if( $value !== "" )
      {
        $id = 'pp-'.str_replace('_', '-', $key);
        $this->html .= "<input type=\"hidden\" id=\"$id\" name=\"{$key}\" value=\"{$value}\" />\n";
      }
    }
    $this->html .= $this->getCartItemsHtml();
    return $this->html;
  }
  
  /**
   * Access Public
   * Return entire form HTML for PayPal with form closing tag </form>
   *
   * @return none
   */   
   
  public function html()
  {
    $html = $this->getHtml();
    $html .= $this->button;
    $html .= "\n</form>";
    return $html;
  }       
} 

/**
* Cart Items  API for third-party shopping cart or paypal shopping cart 
* @package    Myfirstproject
* @subpackage Lib
* @author     viren   <virendav.vitrainee@gmail.com>    
* @version    1.0
*/
class GoPayPalCartItem
{

  private $variables;
  
  function GoPayPalCartItem()
  {
    $this->variables = array(
      'amount'             => '',   
      'handling'           => '', 
      'item_name'          => '', 
      'item_number'        => '',
      'on0'                => '',     
      'on1'                => '',   
      'os0'                => '',   
      'os1'                => '',   
      'quantity'           => '',               
      'shipping'           => '', 
      'shipping2'          => '', 
      'tax'                => '',   
      'weight'             => '',   
      'undefined_quantity' => '',
    );
  }
  
  /**
   * set variables
   * Access Public 
   *
   * @param  String $key 
   * @param  String $value  
   * @author viren   <virendav.vitrainee@gmail.com>    
   * @access public
   *
   * @return none
   */
   
  function set($key, $value)
  {
    $this->variables[$key] = $value;
  }
  
  /**
   * get variables
   * Access Public 
   *
   * @param  String $key  
   * @author viren   <virendav.vitrainee@gmail.com>    
   * @access public
   *
   * @return none
   */
   
   function get($key)
   {
     return $this->variables[$key];
   }
  
    /**
   * get variables
   * Access Public 
   *
   * @param  $key 
   * @param  $value  
   * @author viren   <virendav.vitrainee@gmail.com>    
   * @access public
   *
   * @return String
   */  
  function getVars()
  {
    return $this->variables;
  } 
  
}

?>
