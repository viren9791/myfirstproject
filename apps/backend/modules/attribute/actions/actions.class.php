<?php

  sfProjectConfiguration::getActive()->loadHelpers('I18N');
  
  /**
  * attribute actions.
  *
  * @package    Myfirstproject
  * @subpackage Attribute
  * @author     viren   <virendav.vitrainee@gmail.com>     
  * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
  */
  
class attributeActions extends sfActions
{
   /**
    * Executes index action
    *
    * @param sfRequest $request A request object
    *
    * @return none
    */
    
    public function executeIndex(sfWebRequest $request)
    {
    
    }
    
    /**
    * Executes Add action
    *
    * @param sfRequest $request A request object
    *
    * @return None
    */
    
    public function executeAdd($request)
    {
      $this->id_edit = $request->getParameter('id_edit');
      if($this->id_edit)
      {
        $attributes = Doctrine_Core::getTable('AttributeValues')->find($this->id_edit);
        $this->Attribute_Values = new AttributeValuesForm($attributes);
      }
      else
      {
        $this->Attribute_Values = new AttributeValuesForm();
      }  
      if ($request->isMethod('post'))
      { 
        $this->Attribute_Values->bind(
            $request->getParameter($this->Attribute_Values->getName()),
            $request->getFiles($this->Attribute_Values->getName())
        );
        if ($this->Attribute_Values->isValid())
        {       
          $this->Attribute_Values->save();
          $this->redirect('@attribute_list');
        }
      }   
    }
    
    /**
    * Executes list action
    *
    * @param sfRequest $request A request object
    *
    * @return none
    */
    
    public function executeList(sfWebRequest $request)
    {
      if(!$this->getUser()->hasAttribute('user'))
         $this->redirect('@login'); 
      else
      {
        $this->oPager = new sfDoctrinePager('AttributeValues', 10);
        if($request->getParameter('sortBy'))
          $sortBy = $request->getParameter('sortBy');
        else  
          $sortBy = 'ASC';   
        if($request->getParameter('find'))
        {
          $attributes = Doctrine_Core::getTable('AttributeValues')
            ->listingAttribute($sortBy, $request->getParameter('find'));       
          $this->oPager->setQuery($attributes);
        } 
        else
        {   
          $attributes = Doctrine_Core::getTable('AttributeValues')
             ->listingAttribute($sortBy, '');       
          $this->oPager->setQuery($attributes);
        }  
        $this->oPager->setPage($this->getRequestParameter('page', 1));
        $this->oPager->init();
        $this->listRecords  = $this->oPager->getResults(Doctrine::HYDRATE_ARRAY);
      } 
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
        $this->redirect('@login');  
      else
      {
        $Attribute_Values = new AttributeValues();
        $this->id_delete = $Attribute_Values->delete_dataAttribute($request->getParameter('id_delete')); 
        $this->getUser()->setFlash('success', __('msg_delete_success'));
        $this->redirect('@attribute_list'); 
      }   
    }
    
    /**
    * Executes AttributeAdd action
    *
    * @param sfRequest $request A request object
    *
    * @return None
    */
    
    public function executeAttributeAdd($request)
    { 
      $this->id_edit = $request->getParameter('id_edit');
      if($this->id_edit)
      {
         $attributes = Doctrine_Core::getTable('Attribute')->findOneByAttribute_id($this->id_edit);
         $this->Attribute_Values = new AttributeForm($attributes);
      }
      else
      {
         $this->Attribute_Values = new AttributeForm();
      }  
      if ($request->isMethod('post'))
      { 
        $this->Attribute_Values->bind(
            $request->getParameter($this->Attribute_Values->getName()),
            $request->getFiles($this->Attribute_Values->getName())
        );
        if ($this->Attribute_Values->isValid())
        {       
          $this->Attribute_Values->save();
          $this->redirect('@AttributeList');
        }
      }   
    }
    
    /**
    * Executes list action
    *
    * @param sfRequest $request A request object
    *
    * @return None
    */
    
    public function executeAttributeList(sfWebRequest $request)
    {
      if(!$this->getUser()->hasAttribute('user'))
        $this->redirect('@login');  
      else
      {
        $this->oPager = new sfDoctrinePager('Attribute', 10);
        if($request->getParameter('sortBy'))
           $sortBy = $request->getParameter('sortBy');
        else 
           $sortBy = 'ASC';   
        if($request->getParameter('find'))
        {
          $attributes = Doctrine_Core::getTable('Attribute')
              ->listingAttribute($sortBy, $request->getParameter('find'));       
          $this->oPager->setQuery($attributes);
        }  
        else
        {   
          $attributes = Doctrine_Core::getTable('Attribute')
              ->listingAttribute($sortBy, '');       
          $this->oPager->setQuery($attributes);
        }  
        $this->oPager->setPage($this->getRequestParameter('page', 1));
        $this->oPager->init();
        $this->listRecords  = $this->oPager->getResults(Doctrine::HYDRATE_ARRAY);
      } 
    }
    
    /**
    * Executes Delete action
    *
    * @param sfRequest $request A request object
    *
    * @return None
    */
    
    public function executeAttributeDelete(sfWebRequest $request)
    {
      if(!$this->getUser()->hasAttribute('user'))
        $this->redirect('@login');   
      else
      {
        $Attribute = new Attribute();   
        $this->id_delete = $Attribute->delete_dataAttribute($request->getParameter('id_delete')); 
        $this->getUser()->setFlash('success', __('msg_delete_success'));
        $this->redirect('@AttributeList');  
      }   
    }
}
