<?php
require_once dirname(__FILE__).'/../bootstrap/unit.php';
/**
* userTest
*
* @package    Myfirstprojects
* @subpackage Test
* @author     Viren   <viren.virtueinfo@gmail.com>
* @version
*/
class userTest extends sfPHPUnitBaseTestCase
{
  /**
  * object  for testing
  *
  * @var string
  * @access public
  */
  
  public $user = '';
  
  /**
   * constructor to create object
   *
   * @author viren   <virendav.vitrainee@gmail.com>
   * @access public
   * @return object
   */
   
  public function __construct()
  {
      $this->user = new User();
  }
  
  /**
  * Execute listingUser
  *
  * @author viren   <virendav.vitrainee@gmail.com>
  * @access public
  * @return object
  */  
  
  public function testlistingUserWithBlankArgument()
  {
    $this->getTest()->diag('listingUser: Pass Blank Arguments');
    $Result = Doctrine::getTable('User')->listingUser('', '');
    $this->assertTrue($Result, "Blank parameter not allow");
    $this->getTest()->diag(sfGeneral::lineBreaker());
    unset($result);
  }
    
  /**
  * Execute listingUser
  *
  * @author viren   <virendav.vitrainee@gmail.com>
  * @access public
  * @return object
  */  
  
  public function testlistingUser()
  {
    $this->getTest()->diag('listingUser: Pass correct Arguments');
    $Result = Doctrine::getTable('User')->listingUser('viren', 'username');
    $this->assertInternalType('object', $Result, "Pass Proper data");
    $this->getTest()->diag(sfGeneral::lineBreaker());
  }
/**
  * Execute LoginUser
  *
  * @author viren   <virendav.vitrainee@gmail.com>
  * @access public
  * @return object
  */  
  public function testLoginUserWithBlankArgument()
  {
    $this->getTest()->diag('LoginUser: Pass Blank Arguments');
    $Result = $this->user->loginUser('', '');
    $this->assertTrue($Result, "Blank parameter not allow");
    $this->getTest()->diag(sfGeneral::lineBreaker());
    unset($result);
  }
    
  /**
  * Execute LoginUser
  *
  * @author viren   <virendav.vitrainee@gmail.com>
  * @access public
  * @return object
  */  
  public function testLoginUser()
  {
    $this->getTest()->diag('LoginUser: Pass correct Arguments');
    $Result = $this->user->loginUser('viren', 'viren12');
    $this->assertInternalType('object', $Result, "Pass Proper data");
    $this->getTest()->diag(sfGeneral::lineBreaker());
  }
}
