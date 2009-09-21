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
  public function executeIndex(sfWebRequest $request)
  {
    $this->category_list = $this->getRoute()->getObjects();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new CategoryForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->form = new CategoryForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->form = new CategoryForm($this->getRoute()->getObject());
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->form = new CategoryForm($this->getRoute()->getObject());

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->getRoute()->getObject()->delete();

    $this->redirect('category/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()));
    if ($form->isValid())
    {
      $category = $form->save();

      $this->redirect('category/edit?id='.$category->getId());
    }
  }
}
