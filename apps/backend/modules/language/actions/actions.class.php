<?php
  /**
  * language actions.
  *
  * @package    Myfirstproject
  * @subpackage Language
  * @author     viren   <virendav.vitrainee@gmail.com>     
  * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
  */
class languageActions extends sfActions
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
      $this->forward('default', 'module');
    }
}
