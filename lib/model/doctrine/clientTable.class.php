<?php

/**
 * clientTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    Myfirstproject
 * @subpackage Model
 * @author     viren   <virendav.vitrainee@gmail.com>     
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
 
class clientTable extends Doctrine_Table
{
    /**
    * Executes getInstance function check user authentication.
    *
    * @author viren   <virendav.vitrainee@gmail.com>    
    * @access public
    * @return object
    */
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('client');
    }
}