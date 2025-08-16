<?php


class sfTagManagerTagForm extends TagForm
{
  public function configure()
  {
    unset(
    $this['image1']
    );

    $this->widgetSchema['image1'] = new sfImageManager(array(
      "Model" => $this->getObject(),
      "name" => "image1"
    ));

    // Use Trix editor instead of TinyMCE for rich text editing
    $this->widgetSchema['description'] = new sfWidgetFormTrixEditor(array(
      'height' => '200px'
    ));
    $this->widgetSchema->setLabel('description', false);

    $this->validatorSchema['description']->setOption("max_length", null);
  }
}