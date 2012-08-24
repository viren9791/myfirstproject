<?php

/**
 * sfValidatedFileCustom 
 *
 * @package    Myfirstproject
 * @subpackage Category
 * @author     viren   <virendav.vitrainee@gmail.com>      
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
 
class categoryComponents extends sfComponents
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  *
  * @return none
  */
  public function executeSubCategory(sfWebRequest $request)
  { 
    echo $request->getParameter('categoryId');
  }
}

?>