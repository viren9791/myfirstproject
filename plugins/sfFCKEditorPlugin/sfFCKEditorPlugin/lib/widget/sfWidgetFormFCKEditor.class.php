<?php

/**
 * Represents a FCK Editor widget.
 *
 * @package    sfFCKEditorPlugin
 * @subpackage widget
 * @version    SVN: $Id$
 */
class sfWidgetFormFCKEditor extends sfWidgetForm
{
  /**
   * Render the widget
   * 
   * @param  string $name        The element name
   * @param  string $value       The value displayed in this widget
   * @param  array  $attributes  An array of HTML attributes to be merged with the default HTML attributes
   * @param  array  $errors      An array of errors for the field
   *
   * @return string An HTML tag string
   *
   * @see sfWidgetForm
   */
  public function render($name, $value = null, $attributes = array(), $errors = array())
  {
  	$editor = new sfRichTextEditorFCK();
    
  	$editor->initialize($name, $value, array_merge(
      $this->getAttributes(),
      $attributes
    ));
    
    return $editor->toHTML();
  }
}
