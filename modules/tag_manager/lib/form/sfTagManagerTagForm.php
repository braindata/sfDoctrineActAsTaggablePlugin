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

    // Use factory to get configured rich text editor
    $this->widgetSchema['description'] = RichTextEditorFactory::create(array(
      'height' => '200px'
    ));
    $this->widgetSchema->setLabel('description', false);

    $this->validatorSchema['description']->setOption("max_length", null);
  }
}