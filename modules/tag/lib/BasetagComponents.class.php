<?php

/**
 * Base actions for the sfDoctrineActAsTaggablePlugin tag module.
 * 
 * @package     sfDoctrineActAsTaggablePlugin
 * @subpackage  tag
 * @author      Johannes Tyra
 * @version     SVN: $Id: BaseActions.class.php 12534 2008-11-01 13:38:27Z Kris.Wallsmith $
 */
abstract class BasetagComponents extends sfComponents
{
  public function executePopularTags() {
    $q = Doctrine_Query::create()
      ->where('t.is_featured = 0')
      ->limit(10);
    $this->tags = PluginTagTable::getPopulars($q);
    arsort($this->tags);

    $this->visibleT = array_slice($this->tags, 0, 7);
    $this->visibleD = array_slice($this->tags, 7);
  }
}
