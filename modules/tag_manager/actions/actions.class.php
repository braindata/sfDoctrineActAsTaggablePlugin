<?php

require_once dirname(__FILE__) . '/../lib/tag_managerGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/tag_managerGeneratorHelper.class.php';
require_once dirname(__FILE__) . '/../lib/form/sfTagManagerTagForm.php';

/**
 * tag actions.
 *
 * @package    tonight
 * @subpackage tag
 * @author     Johannes Tyra
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tag_managerActions extends autoTag_managerActions
{
  public function executeShow(sfWebRequest $request)
  {
    $object = $this->getRoute()->getObject();
    $route = 'tag_detail';
    
    $url = $this->getContext()->getConfiguration()->generateFrontendUrl($route, array('sf_subject' => $object));
    $this->redirect($url);
  }

}
