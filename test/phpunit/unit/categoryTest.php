<?php

require_once dirname(__FILE__).'/../bootstrap/unit.php';

/**
* categoryTest
*
* @package    Blancspot_Symfony
* @subpackage Phpunit
* @author     Dattesh Brahmkshatriya   <dattesh@virtueinfo.com>
* @version
*/

class categoryTest extends sfPHPUnitBaseTestCase
{
  /**
  * object  for testing
  *
  * @var string
  * @access public
  */
  
  public $category= '';
  
  /**
   * constructor to create object
   *
   * @author viren   <virendav.vitrainee@gmail.com>
   * @access public
   * @return object
   */
   
  public function __construct()
  {
      $this->category = new Category();
  }
  
  /**
  * Execute listingCategory
  *
  * @author viren   <virendav.vitrainee@gmail.com>
  * @access public
  * @return object
  */
    
  public function testlistingCategoryWithBlankArgument()
  {
    $this->getTest()->diag('listingCategory: Pass Blank Arguments');
    $Result = Doctrine_Core::getTable('Category')->listingCategory('', '');
    $this->assertFalse($Result, "Blank parameter not allow");
    $this->getTest()->diag(sfGeneral::lineBreaker());
    unset($result);
  }
  /**
  * Execute listingCategory
  *
  * @author viren   <virendav.vitrainee@gmail.com>
  * @access public
  * @return object
  */  
  public function testlistingCategory()
  {
    $this->getTest()->diag('listingCategory: Pass correct Arguments');
    $Result = Doctrine_Core::getTable('Category')->listingCategory('ASC', 'e');
    $this->assertInternalType('object', $Result, "Pass Proper data");
    $this->getTest()->diag(sfGeneral::lineBreaker());
  }
  

  /**
  * Execute getAllCategoryOptions
  *
  * @author viren   <virendav.vitrainee@gmail.com>
  * @access public
  * @return object
  */  
  public function testGetAllCategoryOptions()
  {
    $this->getTest()->diag('listingCategoryAdmin: Pass correct Arguments');
    $Result = Doctrine_Core::getTable('Category')->getAllCategoryOptions();
    $this->assertInternalType('object', $Result, "Pass Proper data");
    $this->getTest()->diag(sfGeneral::lineBreaker());
  }
  /**
  * Execute delete_dataCategory
  *
  * @author viren   <virendav.vitrainee@gmail.com>
  * @access public
  * @return object
  */  
  public function testDelete_dataCategoryWithBlankArgument()
  {
    $this->getTest()->diag('delete_dataCategory: Pass Blank Arguments');
    $Result = $this->category->delete_dataCategory('');
    $this->assertFalse($Result, "Blank parameter not allow");
    $this->getTest()->diag(sfGeneral::lineBreaker());
    unset($result);
  }
  /**
  * Execute delete_dataCategory
  *
  * @author viren   <virendav.vitrainee@gmail.com>
  * @access public
  * @return object
  */  
  public function testdelete_dataCategory()
  {
    $this->getTest()->diag('delete_dataCategory: Pass correct Arguments');
    $Result = $this->category->delete_dataCategory('1');
    $this->assertInternalType('null', $Result, "Pass Proper data");
    $this->getTest()->diag(sfGeneral::lineBreaker());
  }
}
