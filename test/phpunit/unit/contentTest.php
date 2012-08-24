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
      $this->content = new Content();
  }
  
  /**
  * Execute delete_dataContent
  *
  * @author viren   <virendav.vitrainee@gmail.com>
  * @access public
  * @return object
  */  
  
  public function testdelete_dataContentWithBlankArgument()
  {
    $this->getTest()->diag('delete_dataAttribute: Pass Blank Arguments');
    $Result = $this->content->delete_dataContent('');
    $this->assertFalse($Result, "Blank parameter not allow");
    $this->getTest()->diag(sfGeneral::lineBreaker());
    unset($result);
  }
  
   /**
  * Execute listingContent
  *
  * @author viren   <virendav.vitrainee@gmail.com>
  * @access public
  * @return object
  */  
  public function testlistingContentWithBlankArgument()
  {
    $this->getTest()->diag('listingContent: Pass Blank Arguments');
    $Result = Doctrine_Core::getTable('Content')->listingContent('', '', '');
    $this->assertFalse($Result, "Blank parameter not allow");
    $this->getTest()->diag(sfGeneral::lineBreaker());
    unset($result);
  }
    
  /**
  * Execute listingContent
  *
  * @author viren   <virendav.vitrainee@gmail.com>
  * @access public
  * @return object
  */  
  public function testlistingContent()
  {
    $this->getTest()->diag('listingContent: Pass correct Arguments');
    $Result = Doctrine_Core::getTable('Content')->listingContent('ASC', 'e', 'en');
    $this->assertInternalType('object', $Result, "Pass Proper data");
    $this->getTest()->diag(sfGeneral::lineBreaker());
  }
}
