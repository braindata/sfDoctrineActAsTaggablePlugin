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

    $this->widgetSchema['description'] = new sfWidgetFormTextareaMyTinyMCE();

    $this->validatorSchema['description']->setOption("max_length", null);
  }
}