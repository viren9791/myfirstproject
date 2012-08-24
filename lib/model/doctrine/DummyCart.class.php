<?php

/**
* DummyCart
* 
* This class has been auto-generated by the Doctrine ORM Framework
* 
* @package    Myfirstproject
* @subpackage Model
* @author     viren   <virendav.vitrainee@gmail.com>     
* @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
*/
class DummyCart extends BaseDummyCart
{
  /**
  * Executes delete_data function to get no of rows.
  *
  * @param String $id stores product id
  *
  * @author viren   <virendav.vitrainee@gmail.com>    
  * @access public
  *
  * @return array
  */

  public function delete_dataCart($id)
  { 
    if(!empty($id))
    {
      $query = Doctrine_Core::getTable('DummyCart')
        ->createQuery('c')
        ->where('c.product_id = ?', $id)
        ->delete()
        ->execute(array(), Doctrine::HYDRATE_RECORD);           
    }
    else
        return false;
  }
}  
