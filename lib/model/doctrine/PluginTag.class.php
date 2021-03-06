<?php

/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
abstract class PluginTag extends BaseTag implements ModelManagerInterface
{
  public function __toString()
  {
    return $this->name;
  }

  public function getModelsNameTaggedWith()
  {
    return PluginTagTable::getModelsNameTaggedWith($this->name);
  }

  public function getRelated($options = array())
  {
    return PluginTagTable::getRelatedTags($this->name);
  }

  public function getObjectTaggedWith($options = array())
  {
    return PluginTagTable::getObjectTaggedWith($this->name);
  }

  // Interface ModelManagerInterface
  public function getClass()
  {
    return get_class($this);
  }

  public function getFileUrl($name = false)
  {
    $FileManager = new sfFileManager();

    if ($name == "image1" && $this->getImage1())
      return $FileManager->getPath($this->getImage1());
    elseif ($name == "image2" && $this->getImage2())
      return $FileManager->getPath($this->getImage2());

    return "";
  }

  public function getImageFormats()
  {
    $formats = sfConfig::get('thumbnailing_tables');

    if (isset($formats[get_class($this)]))
      return $formats[get_class($this)];
    else
      return $formats['default'];
  }

  public function findModelObject($name)
  {
    return Doctrine_Core::getTable('ModelObject')->getModelObject(get_class($this), $this->getId(), $name);
  }

  public function getModelObjects($name = "")
  {
    return Doctrine_Core::getTable('ModelObject')->getModelObjects(get_class($this), $this->getId(), $name);
  }

  public function getImageRatio($name = "")
  {
    return sfConfig::get('app_image_ratio_normal');
  }

  public function getSlug(){
    return sfGeneralHelper::slugify($this->getName());
  }

  public function getImageUrl($image = "image1", $format = false)
  {
    $controller = sfContext::getInstance()->getController();
    $image_formats = $this->getImageFormats();
    $image_format = $image_formats[$image];

    if ($format && in_array($format, $image_format['formats'])) {
      return $controller->genUrl(array("format" => $format, "sf_route" => $image_format['route'], "sf_subject" => $this));
    }
    return "";
  }
}