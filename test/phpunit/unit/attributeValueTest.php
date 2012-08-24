<?php
require_once dirname(__FILE__).'/../bootstrap/unit.php';
/**
* attributeTest
*
* @package    Blancspot_Symfony
* @subpackage Phpunit
* @author     viren Dave   <viren.virtueinfo@gmail.com>
* @version
*/

class attributeValueTest extends sfPHPUnitBaseTestCase
{
  /**
  * object  for testing
  *
  * @var string
  * @access public
  */
  
  public $attribute = '';
  
  /**
   * constructor to create object
   *
   * @author viren   <virendav.vitrainee@gmail.com>
   * @access public
   * @return object
   */
   
  public function __construct()
  {
      $this->attribute = new AttributeValues();
  }
  
  /**
  * Execute listingAttribute
  *
  * @author viren   <virendav.vitrainee@gmail.com>
  * @access public
  * @return object
  */
  
  public function testlistingAttributeWithBlankArgument()
  {
    $this->getTest()->diag('listingAttribute: Pass Blank Arguments');
    $Result = Doctrine_Core::getTable('AttributeValues')->listingAttribute('', '');
    $this->assertFalse($Result, "Blank parameter not allow");
    $this->getTest()->diag(sfGeneral::lineBreaker());
    unset($result);
  }
    
  /**
  * Execute listingAttribute
  *
  * @author viren   <virendav.vitrainee@gmail.com>
  * @access public
  * @return object
  */  
  public function testlistingAttribute()
  {
    $this->getTest()->diag('listingAttribute: Pass correct Arguments');
    $Result = Doctrine_Core::getTable('AttributeValues')->listingAttribute('ASC', 'e');
    $this->assertInternalType('object', $Result, "Pass Proper data");
    $this->getTest()->diag(sfGeneral::lineBreaker());
  }
  /**
  * Execute delete_dataAttribute
  *
  * @author viren   <virendav.vitrainee@gmail.com>
  * @access public
  * @return object
  */  
  public function testDelete_dataAttributeWithBlankArgument()
  {
    $this->getTest()->diag('delete_dataAttribute: Pass Blank Arguments');
    $Result = $this->attribute->delete_dataAttribute('');
    $this->assertFalse($Result, "Blank parameter not allow");
    $this->getTest()->diag(sfGeneral::lineBreaker());
    unset($result);
  }
    /**
  * Execute delete_dataAttribute
  *
  * @author viren   <virendav.vitrainee@gmail.com>
  * @access public
  * @return object
  */  
  public function testDelete_dataAttribute()
  {
    $this->getTest()->diag('delete_dataAttribute: Pass correct Arguments');
    $Result = $this->attribute->delete_dataAttribute('1');
    $this->assertInternalType('null', $Result, "Pass Proper data");
    $this->getTest()->diag(sfGeneral::lineBreaker());
    unset($result);
  }
 /**
  * Execute getAllAttributesOptions
  *
  * @author viren   <virendav.vitrainee@gmail.com>
  * @access public
  * @return object
  */  
  public function testgetAllAttributesOptions()
  {
    $this->getTest()->diag('listingAttribute: Pass correct Arguments');
    $Result = Doctrine_Core::getTable('AttributeValues')->getAllAttributeOptions();
    $this->assertInternalType('object', $Result, "Pass Proper data");
    $this->getTest()->diag(sfGeneral::lineBreaker());
  }
}
