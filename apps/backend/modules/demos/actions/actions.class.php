<?php
  /**
  * demos actions.
  *
  * @package    Myfirstproject
  * @subpackage Demos
  * @author     viren   <virendav.vitrainee@gmail.com>     
  * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
  */
class demosActions extends sfActions 
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
      $this->clientForm = new clientForm();    
      if ($request->isMethod('post'))
      { 
        $this->clientForm->bind(
            $request->getParameter($this->clientForm->getName()), 
            $request->getFiles($this->clientForm->getName())
        );
        if ($this->clientForm->isValid())
        {
         $this->clientForm->save();
        }
      }
    }
}
