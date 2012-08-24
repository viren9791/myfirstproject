<?php
/**
 * sfValidatedFileCustom 
 *
 * @package    Myfirstproject
 * @subpackage Lib
 * @author     viren   <virendav.vitrainee@gmail.com>      
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
 
class sfValidatedFileCustom extends sfValidatedFile
{
  /**
   * Executes save 
   *
   * @param String $file      stores file
   * @param String $fileMode  stores file mode
   * @param String $create    stores create date/time
   * @param String $dirMode   stores directory mode
   *
   * @return String
    */

  public function save($file = null, $fileMode = 0666, $create = true, $dirMode = 0777) 
  {
    $saved = parent::save($file, $fileMode, $create, $dirMode);
    return $saved;
  }
}