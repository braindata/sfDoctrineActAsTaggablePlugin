<?php

class taggableRouting extends sfPatternRouting
{
  static public function listenToRoutingLoadConfigurationEvent(sfEvent $event)
  {

    $r = $event->getSubject();

    $r->prependRoute('taggable_add_tag', 
      new sfRoute('/admin/addTag/:object_class/:object_id', 
        array('module' => 'taggableComplete', 'action' => 'addTag'),
        array('slug' => '.*')));

    $r->prependRoute('taggable_remove_tag',
        new sfRoute('/admin/removeTag/:object_class/:object_id',
	   array('module' => 'taggableComplete', 'action' => 'removeTag'),
	   array('slug' => '.*')));

    $r->prependRoute('taggable_complete_tag',
        new sfRoute('/admin/completeTag/:object_class',
	   array('module' => 'taggableComplete', 'action' => 'completeTag'),
	   array('slug' => '.*')));
  }
}
