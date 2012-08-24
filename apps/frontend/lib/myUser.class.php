<?php
/**
 * myUser
 *
 * @package    Myfirstproject
 * @subpackage Lib
 * @author     viren   <virendav.vitrainee@gmail.com>     
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class myUser extends sfBasicSecurityUser
{
 /**
  * Executes method login and set authenticate for login user, make credential, set attribute
  * 
  * @param string $userName     user name 
  * @param string $salt         user salt
  * @param string $firstName    user firstname 
  *
  * @access public
  * @author Sonali Patel  <sonalipatel.virtueinfo@gmail.com>
  * @return NULL
  */
   public function login($userName, $id)
  {	
    $this->setAttribute('userId', $id);
    $this->setAttribute('user', $userName);    
  }
    
 /**
  * Executes method logout and unset authenticate for login user, remove credential, unsetset    attribute
  *
  * @access public
  * @author Sonali Patel  <sonalipatel.virtueinfo@gmail.com>
  * @return NULL
  */
   public function logout()
  {
    $this->getAttributeHolder()->clear();
  }
}

