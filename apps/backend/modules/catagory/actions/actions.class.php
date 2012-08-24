<?php

  sfProjectConfiguration::getActive()->loadHelpers('I18N');
  
  /**
  * catagory actions.
  *
  * @package    Myfirstproject
  * @subpackage Catagory
  * @author     viren   <virendav.vitrainee@gmail.com>     
  *
  * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
  */
class catagoryActions extends sfActions
{
    /**
    * Executes index action
    *
    * @param sfRequest $request A request object
    *
    * @return None
    */
    
    public function executeIndex(sfWebRequest $request)
    {
      $this->forward('catagory', 'list');
    }  
    
    /**
    * Executes Delete action
    *
    * @param sfRequest $request A request object
    *
    * @return None
    */
    
    public function executeDelete(sfWebRequest $request)
    {
      if(!$this->getUser()->hasAttribute('user'))
      {
        $this->redirect('@login'); 
      }  
      else
      {
        $Category = new Category();
        $this->id_delete = $Category->delete_dataCategory($request->getParameter('id_delete')); 
        $this->getUser()->setFlash('success', __('msg_delete_success'));
        $this->redirect('@category_list');  
      } 
    }  
    
    /**
    * Executes List action
    *
    * @param sfRequest $request A request object
    *
    * @return None
    */
    
    public function executeList(sfWebRequest $request)
    { 
      if(!$this->getUser()->hasAttribute('user'))
      {
        $this->redirect('@login'); 
      }  
      else
      {
        $this->culture = $this->getUser()->getCulture();
        $this->oPager = new sfDoctrinePager('Category', 2);
        if($request->getParameter('sortBy'))
          $sortBy = $request->getParameter('sortBy');
        else
          $sortBy = 'ASC';
        if($request->getParameter('find'))
        {
          $category = Doctrine_Core::getTable('Category')
            ->listingCategory($sortBy, $request->getParameter('find'));       
          $this->oPager->setQuery($category);        
        }  
        else
        {
          $category = Doctrine_Core::getTable('Category')
            ->listingCategory($sortBy, '');  
          $this->oPager->setQuery($category);
        }
        $this->oPager->setPage($this->getRequestParameter('page', 1));
        $this->oPager->init();
      }       
    }  
    
   /**
   * Executes Add action
   *
   * @param sfRequest $request A request object
   *
   * @return none
   */
   
   public function executeAdd($request)
   { 
     if(!$this->getUser()->hasAttribute('user'))
     {
       $this->redirect('@login'); 
     }  
     else
     {  
        $this->id_edit = $request->getParameter('id_edit');
        if($this->id_edit)
        {          
          $catagory = Doctrine_Core::getTable('category')->find($this->id_edit);
          $this->CategoryForm = new CategoryForm($catagory);
        }
        else
          $this->CategoryForm = new CategoryForm();     
        if ($request->isMethod('post'))
        {        
          $this->CategoryForm->bind($request->getParameter($this->CategoryForm->getName()));
          if ($this->CategoryForm->isValid())
          {
              $this->CategoryForm->save();
              $category_id = $this->CategoryForm->getObject()->category_id;
              if(!empty($category_id) && $this->id_edit)
                $this->getUser()->setFlash('success', __('msg_edit_success'));
              else
                $this->getUser()->setFlash('success', __('msg_insert_success'));
                $this->redirect('@category_list');    
          }
        }
     }
   }  
}
