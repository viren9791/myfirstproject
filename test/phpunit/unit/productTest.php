<?php
require_once dirname(__FILE__).'/../bootstrap/unit.php';
/**
* productTest
*
* @package    Blancspot_Symfony
* @subpackage Phpunit
* @author     Dattesh Brahmkshatriya   <dattesh@virtueinfo.com>
* @version
*/
class productTest extends sfPHPUnitBaseTestCase
{
  /**
  * object  for testing
  *
  * @var string
  * @access public
  */
  public $product = '';
  
  /**
   * constructor to create object
   *
   * @author viren   <virendav.vitrainee@gmail.com>
   * @access public
   * @return object
   */
  public function __construct()
  {
    $this->product = new Product();
  }
  /**
  * Execute listingProduct
  *
  * @author viren   <virendav.vitrainee@gmail.com>
  * @access public
  * @return object
  */  
  public function testlistingProductWithBlankArgument()
  {
    $this->getTest()->diag('listingProduct: Pass Blank Arguments');
    $Result = Doctrine_Core::getTable('Product')->listingProduct('', '');
    $this->assertTrue($Result, "Blank parameter not allow");
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
  public function testlistingProduct()
  {
    $this->getTest()->diag('listingProduct: Pass correct Arguments');
    $Result = Doctrine_Core::getTable('Product')->listingProduct('ASC', 'e');
    $this->assertInternalType('object', $Result, "Pass Proper data");
    $this->getTest()->diag(sfGeneral::lineBreaker());
  }
  /**
  * Execute listing
  *
  * @author viren   <virendav.vitrainee@gmail.com>
  * @access public
  * @return object
  */  
  public function testListingWithBlankArgument()
  {
    $this->getTest()->diag('listing: Pass Blank Arguments');
    $Result = Doctrine_Core::getTable('Product')->listing('');
    $this->assertTrue($Result, "Blank parameter not allow");
    $this->getTest()->diag(sfGeneral::lineBreaker());
    unset($result);
  }
    
  /**
  * Execute listing
  *
  * @author viren   <virendav.vitrainee@gmail.com>
  * @access public
  * @return object
  */  
  public function testListing()
  {
    $this->getTest()->diag('listing: Pass correct Arguments');
    $Result = Doctrine_Core::getTable('Product')->listing('1');
    $this->assertInternalType('array', $Result, "Pass Proper data");
    $this->getTest()->diag(sfGeneral::lineBreaker());
  }
  /**
  * Execute delete_dataProduct
  *
  * @author viren   <virendav.vitrainee@gmail.com>
  * @access public
  * @return object
  */  
  public function testDelete_dataProductWithBlankArgument()
  {
    $this->getTest()->diag('delete_dataProduct: Pass Blank Arguments');
    $Result = $this->product->delete_dataProduct('');
    $this->assertTrue($Result, "Blank parameter not allow");
    $this->getTest()->diag(sfGeneral::lineBreaker());
    unset($result);
  }
  /**
  * Execute delete_dataProduct
  *
  * @author viren   <virendav.vitrainee@gmail.com>
  * @access public
  * @return object
  */  
  public function testDelete_dataProduct()
  {
    $this->getTest()->diag('Delete_dataProduct: Pass correct Arguments');
    $Result = $this->product->Delete_dataProduct('1');
    $this->assertInternalType('null', $Result, "Pass Proper data");
    $this->getTest()->diag(sfGeneral::lineBreaker());
  }
    /**
  * Execute getAllProductOptions
  *
  * @author viren   <virendav.vitrainee@gmail.com>
  * @access public
  * @return object
  */  
  public function testGetAllProductOptions()
  {
    $Result =Doctrine_Core::getTable('Product')->getAllProductOptions();
    $this->assertInternalType('object', $Result, "Pass Proper data");
    $this->getTest()->diag(sfGeneral::lineBreaker());
  }
}
