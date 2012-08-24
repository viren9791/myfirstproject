<?php
/**
* FrontendTest
*
* @package    Myfirstprojects
* @subpackage Test
* @author     viren   <viren.virtueinfo@gmail.com>
* @version
*/

class FrontendTest extends sfTestFunctional
{
 /**
  * loadData to create object
  *
  * @author viren   <virendav.vitrainee@gmail.com>
  * @access public
  *
  * @return object
  */
  
  public function loadData()
  {
    Doctrine_Core::loadData(sfConfig::get('sf_test_dir').'/fixtures');
 
    return $this;
  }
}

?>