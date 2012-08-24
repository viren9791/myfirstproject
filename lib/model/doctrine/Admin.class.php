<?php

/**
 * Admin
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    Myfirstproject
 * @subpackage Model
 * @author     viren   <virendav.vitrainee@gmail.com>     
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
 
class Admin extends BaseAdmin
{
  /**
   * Executes loginAdmin function check user authentication.
   *
   * @param String $user stores username
   * @param String $pass stores password
   *
   * @author viren   <virendav.vitrainee@gmail.com>    
   * @access public
   *
   * @return array
   */
  
   public function loginAdmin($user, $pass)
   { 
     $q = Doctrine_Core::getTable('admin')
       ->createQuery('c')
       ->where('c.username = ?', $user)
       ->andWhere('c.password = ?', $pass)
       ->orderBy('c.username ASC');
     $user = $q->execute(array(), Doctrine::HYDRATE_RECORD);
     return $user;
   }
}