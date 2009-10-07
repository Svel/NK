<?php

/**
 * category actions.
 *
 * @package    Naklej
 * @subpackage category
 * @author     Svel <svel.sontz@gmail.com>
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class categoryActions extends sfActions
{
  public function executeShow(sfWebRequest $request)
  {
    $this->category = $this->getRoute()->getObject();

    $this->pager = new sfDoctrinePager('Post', sfConfig::get('app_pager_products', 10));

    $this->pager->setQuery($this->category->getPagerQuery());
    $this->pager->setPage($request->getParameter('page', 1));
    $this->pager->init();
  }
}
