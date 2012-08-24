<?php
/**
* UserTable
*
* @package    Myfirstproject
* @subpackage Model
* @author     viren   <virendav.vitrainee@gmail.com> 
* @version    SVN: $Id: ChannelTable.class.php 7490 2010-03-29 19:53:27Z jwage $
*
*/
class UserTable extends Doctrine_Table
{
  /**
   * Executes getInstance function
   *
   * @author viren   <virendav.vitrainee@gmail.com>     
   * @access public
   *
   * @return object
   *
   */
  
  public static function getInstance()
  {
    return Doctrine_Core::getTable('User');
  }
  /**
   * Executes ListingUser function
   *
   * @param String $snFbUid stores fbid
   * @param String $field   stores fields
   *
   * @author viren   <virendav.vitrainee@gmail.com>     
   * @access public
   *
   * @return object
   *
   */
  
   public static function listingUser($snFbUid, $field)
   {
     if(!empty($snFbUid)) 
     {   
       $User = Doctrine_Query::create()
         ->select('u.*')
         ->from('User u')
         ->where("u.".$field." = '".$snFbUid."'")
         ->fetchArray();     
      
       return $User;
     }
     else
       return false;   
   }
}