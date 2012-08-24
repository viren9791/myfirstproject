<?php

require_once dirname(__FILE__).'/../bootstrap/unit.php';

/**
* attributeTest
*
* @package    Blancspot_Symfony
* @subpackage Phpunit
* @author     Viren Dave   <viren.virtueinfo@gmail.com>
* @version
*/
class productAttributeTest extends sfPHPUnitBaseTestCase
{
   /**
  * Execute listingProduct
  *
  * @author viren   <virendav.vitrainee@gmail.com>
  * @access public
  * @return object
  */  
  public function testListAttributeWithBlankArgument()
  {
    $this->getTest()->diag('listingProduct: Pass Blank Arguments');
    $Result = Doctrine_Core::getTable('ProductAttribute')
         ->listAttribute(''); 
    $this->assertFalse($Result, "Blank parameter not allow");
    $this->getTest()->diag(sfGeneral::lineBreaker());
    unset($result);
  }
    
  /**
  * Execute listingProduct
  *
  * @author viren   <virendav.vitrainee@gmail.com>
  * @access public
  * @return object
  */  
  public function testlistAttribute()
  {
    $this->getTest()->diag('listingProduct: Pass correct Arguments');
    $Result = Doctrine_Core::getTable('ProductAttribute')
      ->listAttribute('1');  
    $this->assertInternalType('object', $Result, "Pass Proper data");
    $this->getTest()->diag(sfGeneral::lineBreaker());
  }
  
 /**
  * Execute listingProduct
  *
  * @author viren   <virendav.vitrainee@gmail.com>
  * @access public
  * @return object
  */  
  public function testListingProductAttributeAdminWithBlankArgument()
  {
    $this->getTest()->diag('listingProduct: Pass Blank Arguments');
    $Result = Doctrine_Core::getTable('ProductAttribute')
         ->listingProductAttributeAdmin('', ''); 
    $this->assertFalse($Result, "Blank parameter not allow");
    $this->getTest()->diag(sfGeneral::lineBreaker());
    unset($result);
  }
    
  /**
  * Execute listingProductAttributeAdmin
  *
  * @author viren   <virendav.vitrainee@gmail.com>
  * @access public
  * @return object
  */  
  public function testlistingProductAttributeAdmin()
  {
    $this->getTest()->diag('listingProductAttributeAdmin: Pass correct Arguments');
    $Result = Doctrine_Core::getTable('ProductAttribute')
      ->listingProductAttributeAdmin('asc','s');  
    $this->assertInternalType('object', $Result, "Pass Proper data");
    $this->getTest()->diag(sfGeneral::lineBreaker());
  }
  /**
  * Execute listingAttributeValueById
  *
  * @author viren   <virendav.vitrainee@gmail.com>
  * @access public
  * @return object
  */  
  public function testlistingAttributeValueByIdWithBlankArgument()
  {
    $this->getTest()->diag('listingAttributeValueById: Pass Blank Arguments');
    $Result = Doctrine_Core::getTable('ProductAttribute')
         ->listingAttributeValueById(''); 
    $this->assertFalse($Result, "Blank parameter not allow");
    $this->getTest()->diag(sfGeneral::lineBreaker());
    unset($result);
  }
    
  /**
  * Execute listingAttributeValueById
  *
  * @author viren   <virendav.vitrainee@gmail.com>
  * @access public
  * @return object
  */  
  public function testlistingAttributeValueById()
  {
    $this->getTest()->diag('listingAttributeValueById: Pass correct Arguments');
    $Result = Doctrine_Core::getTable('ProductAttribute')
      ->listingAttributeValueById('1');  
    $this->assertInternalType('object', $Result, "Pass Proper data");
    $this->getTest()->diag(sfGeneral::lineBreaker());
  }
  /**
  * Execute listingProductAttribute
  *
  * @author viren   <virendav.vitrainee@gmail.com>
  * @access public
  * @return object
  */  
  public function testlistingProductAttributeWithBlankArgument()
  {
    $this->getTest()->diag('listingProductAttribute: Pass Blank Arguments');
    $Result = Doctrine_Core::getTable('ProductAttribute')
         ->listingProductAttribute('', '', ''); 
    $this->assertFalse($Result, "Blank parameter not allow");
    $this->getTest()->diag(sfGeneral::lineBreaker());
    unset($result);
  }
    
  /**
  * Execute listingProductAttribute
  *
  * @author viren   <virendav.vitrainee@gmail.com>
  * @access public
  * @return object
  */  
  public function testlistingProductAttribute()
  {
    $this->getTest()->diag('listingProductAttribute: Pass correct Arguments');
    $Result = Doctrine_Core::getTable('ProductAttribute')
      ->listingProductAttribute('asc', '1', '1');  
    $this->assertInternalType('object', $Result, "Pass Proper data");
    $this->getTest()->diag(sfGeneral::lineBreaker());
  }
}
