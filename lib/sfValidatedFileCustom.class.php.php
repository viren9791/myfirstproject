<?php

/**
* sfValidatedFileCustom
* 
* @package    myfirstproject
* @subpackage lib
* @author     viren   <virendav.vitrainee@gmail.com>    
* @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
*/

class sfValidatedFileCustom extends sfValidatedFile
{
  /*
  * execute save to save data
  *
  * @author viren   <virendav.vitrainee@gmail.com>    
  * @access public
  * @param String file 
  * @param String fileMode 
  * @param String create 
  * @param String dirMode
  *
  * @return none
  */
 
  public function save($file = null, $fileMode = 0666, $create = true, $dirMode = 0777) 
  {	
	$saved = parent::save($file, $fileMode, $create, $dirMode);
    return $saved;
  }
}