<?php

/**
* AttributeTable
* 
* This class has been auto-generated by the Doctrine ORM Framework
* 
* @package    Myfirstproject
* @subpackage Model
* @author     viren   <virendav.vitrainee@gmail.com>     
* @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
*/
 
class AttributeTable extends Doctrine_Table
{    
  /**
   * Executes getInstance function
   *
   * @author viren   <virendav.vitrainee@gmail.com>    
   * @access public
   *
   * @return object
   */
    
   public static function getInstance()
   {
     return Doctrine_Core::getTable('Attribute');
   }
  
  /**
   * Executes getAllAttributeOptions function
   *
   * @author viren   <virendav.vitrainee@gmail.com>    
   * @access public
   *
   * @return String
   *
   */ 
  
   public static function getAllAttributesOptions()
   {
     $q = Doctrine_Core::getTable('Attribute')
         ->createQuery('c')
         ->orderBy('c.attribute_id ASC')
         ->limit(sfConfig::get('app_limit'));
     return $q;    
   }
  
   /**
    * Executes listing function to get list of jobs.
    *
    * @param String $sortBy   stores sorting order
    * @param String $searchBy stores value for searching
    *
    * @author viren   <virendav.vitrainee@gmail.com>    
    * @access public
    *
    * @return array
    */
    
    public function listingAttribute($sortBy, $searchBy)
    { 
      if($sortBy =='' && $searchBy =='')
        return false;
      else
      {   
      $query= Doctrine_Query::create()
              ->select('u.*')
              ->from('Attribute u');
        if($searchBy != '')       
          $query -> where('u.name LIKE ? ', $searchBy.'%');
      
          $query -> orderBy('u.name '.$sortBy);   
        return $query;
      } 
    }
}