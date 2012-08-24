<?php
require_once dirname(__FILE__).'/../bootstrap/unit.php';
/**
* adminTest
*
* @package    Blancspot_Symfony
* @subpackage Phpunit
* @author     Dattesh Brahmkshatriya   <dattesh@virtueinfo.com>
* @version
*/

class adminTest extends sfPHPUnitBaseTestCase
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
    $this->getTest()->diag($this->lineBreaker());
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
    $this->getTest()->diag($this->lineBreaker());
  }
}
