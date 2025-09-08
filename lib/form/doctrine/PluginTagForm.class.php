<?php

/**
 * PluginTag form.
 *
 * @package    form
 * @subpackage Tag
 * @version    SVN: $Id: sfPropelFormTemplate.php 6174 2007-11-27 06:22:40Z fabien $
 */
abstract class PluginTagForm extends BaseTagForm
{
  public function setup()
  {
    parent::setup();

    unset(
      $this['image1'],
      $this['is_triple'],
      $this['triple_namespace'],
      $this['triple_key'],
      $this['triple_value']
    );

    // Unset the field from both widget and validator schemas
    unset($this->widgetSchema['image1']);
    unset($this->validatorSchema['image1']);
    
    // Add the special widget that handles its own data
    $this->widgetSchema['image1'] = new sfWidgetMediaSelector(array(
      "Model" => $this->getObject(),
      "name" => "image1"
    ));
  }
}