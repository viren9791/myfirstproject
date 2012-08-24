<?php
require_once dirname(__FILE__).'/../bootstrap/unit.php';
/**
* userTest
*
* @package    Blancspot_Symfony
* @subpackage Phpunit
* @author     Dattesh Brahmkshatriya   <dattesh@virtueinfo.com>
* @version
*/

class dummyCartTest extends sfPHPUnitBaseTestCase
{
   /**
  * object  for testing
  *
  * @var string
  * @access public
  */
  
  public $DummyCart = '';
  
  /**
   * constructor to create object
   *
   * @author viren   <virendav.vitrainee@gmail.com>
   * @access public
   * @return object
   */
   
  public function __construct()
  {
      $this->DummyCart = new DummyCart();
  }
  
  /**
  * Execute delete_dataCart
  *
  * @author viren   <virendav.vitrainee@gmail.com>
  * @access public
  * @return object
  */  
  
  public function testdelete_dataCartWithBlankArgument()
  {
    $this->getTest()->diag('delete_dataAttribute: Pass Blank Arguments');
    $Result = $this->DummyCart->delete_dataCart('');
    $this->assertFalse($Result, "Blank parameter not allow");
    $this->getTest()->diag(sfGeneral::lineBreaker());
    unset($result);
  }
  
}
