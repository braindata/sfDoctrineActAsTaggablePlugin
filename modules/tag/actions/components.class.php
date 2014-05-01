<?php

/**
 * Description of components
 *
 * @author Manuel
 */
class tagComponents extends sfComponents {

    public function executePopularTags() {
        $q = Doctrine_Query::create()
            ->limit(10);
        $this->tags = PluginTagTable::getPopulars($q);
        arsort($this->tags);
        
        $this->visibleT = array_slice($this->tags, 0, 7);
        $this->visibleD = array_slice($this->tags, 7);
    }
}

?>
