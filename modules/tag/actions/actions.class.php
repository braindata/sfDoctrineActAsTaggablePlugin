<?php

require_once dirname(__FILE__) . '/../lib/BasetagActions.class.php';

/**
 * tag actions.
 * 
 * @package    sfDoctrineActAsTaggablePlugin
 * @subpackage tag
 * @author     Johannes Tyra
 * @version    SVN: $Id: actions.class.php 12534 2008-11-01 13:38:27Z Kris.Wallsmith $
 */
class tagActions extends BasetagActions {
    
    public function executePopularTags() {
        $q = Doctrine_Query::create()
            ->limit(10);
        $this->tags = PluginTagTable::getPopulars($q);
        arsort($this->tags);
        
        return $this->renderPartial('tag/popularTags', array("tags" => $this->tags));
    }

    public function executeShow(sfWebRequest $request) {

        $this->tag = $this->getRoute()->getObject();
        $this->name = $this->tag->getName();
        $max_items = 3;
        $searchmodels = array("Product", "News", "MediaLibary");
        $tagged_models = array_intersect($searchmodels, PluginTagTable::getModelsNameTaggedWith($this->name));
        $result = array();
        
        foreach ($tagged_models as $tablename) {
            $table = Doctrine_Core::getTable($tablename);

            $pager = new sfDoctrinePager($table, $max_items);
            $pager->setQuery(PluginTagTable::getObjectTaggedWithQuery($tablename, array($this->tag)));

            $pager->setPage(1);
            $pager->init();

            //$this->num_results = $this->num_results + count($pager);
            $result[$tablename] = $pager;
        }
        
        $this->result = $result;
    }
    
    public function executeExpand(sfWebRequest $request) {

        $parameters = $this->getRoute()->getParameters();
        $this->tag = $parameters["name"];
        $this->model = $parameters["modul"];
        $this->result = array();
        $this->num_results = 0;
        $max_items = 12;
        
        $table = Doctrine_Core::getTable($this->model);

        $pager = new sfDoctrinePager($table, $max_items);
        
        $pager->setQuery(PluginTagTable::getObjectTaggedWithQuery($this->model, array($this->tag)));

        $pager->setPage($parameters["page"]);
        $pager->init();

        $this->data = $pager;
        //$this->model = $model;
        $this->page = $pager->getNextPage();

        $this->result[$this->model] = $pager;

        if ($request->getParameter('page', 1) == 1){
            return $this->renderPartial("results");
        }
        else
            return $this->renderPartial("resultsItem");
        
    }

}
