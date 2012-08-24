<?php

/**
* Category
* 
* This class has been auto-generated by the Doctrine ORM Framework
* 
* @package    Myfirstproject
* @subpackage Model
* @author     viren   <virendav.vitrainee@gmail.com>     
* @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
*/
 
class CategoryTable extends Doctrine_Table
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
    return Doctrine_Core::getTable('Category');
  }
  
 /**
  * Executes getAllCatogaryOptions function
  *
  * @author viren   <virendav.vitrainee@gmail.com>    
  * @access public
  *
  * @return String
  *
  */ 
 
  public static function getAllCategoryOptions()
  {
    $q = Doctrine_Core::getTable('category')
      ->createQuery('c')
      ->orderBy('c.name ASC')
      ->limit(sfConfig::get('app_limit'));        
    return $q;    
  }
  
 /**
  * Executes listingCategoryAdmin function to get list of jobs.
  *
  * @param String $sortBy   stores sorting order
  * @param String $searchBy stores value for searching
  *
  * @author viren   <virendav.vitrainee@gmail.com>    
  * @access public
  *
  * @return array
  */
  
  public function listingCategory($sortBy, $searchBy)
  {
    if($sortBy =='' && $searchBy =='')
      return false;
    else
    { 
     $query= Doctrine_Query::create()
          ->select(
              'c.name,
              (SELECT c1.name FROM category c1 WHERE c1.parent_id = c.category_id ) as parent_category')
          ->from('Category c');
      if($searchBy != '')
        $query ->where('c.name LIKE ? ', $searchBy.'%');
    
      $query -> orderBy('c.name '.$sortBy);    
      return $query;
    } 
  }
  
}