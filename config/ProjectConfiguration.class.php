<?php

require_once '/usr/share/php/symfony/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
    $this->enablePlugins('sfDoctrinePlugin');
	$this->enablePlugins('sfPaymentPayPalPlugin');
    $this->enablePlugins('sfThumbnailPlugin');
	$this->enablePlugins('sfJqueryReloadedPlugin');
	$this->enablePlugins('sfPHPUnit2Plugin');
	
   
    $this->enablePlugins('sfPHPUnit2Plugin');
    $this->enablePlugins('sfFormExtraPlugin');
  }
}
