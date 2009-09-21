<?php

/**
 * page actions.
 *
 * @package    Naklej
 * @subpackage page
 * @author     Svel <svel.sontz@gmail.com>
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class pageActions extends sfActions
{
  /**
   *
   */
  public function executeShow(sfWebRequest $request)
  {
    $this->page = $this->getRoute()->getObject();
    $this->getResponse()->setTitle($this->page->getTitle());
    $this->getResponse()->addMeta('description', $this->page->getDescription());
    $this->getResponse()->addMeta('keywords', $this->page->getKeywords());

    $this->getResponse()->setHttpHeader('Last-Modified', $this->page->getDateTimeObject('updated_at')->format(DATE_RFC1123));
  }
}
