<?php

/**
 * Post form.
 *
 * @package    Naklej
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id$
 */
class PostForm extends BasePostForm
{
  public function configure()
  {
    $this->useFields(array(
      'category_id', 'user_name', 'email', 'email_hide',
      'title', 'description', 'site_url', 'phone', 'price'
    ));

    $this->widgetSchema->setFormFormatterName('list');
    $this->widgetSchema->getFormFormatter()->setHelpFormat('<span class="help">%help%</span>');

    $this->setWidget('accept',    new sfWidgetFormInputCheckbox());
    $this->setValidator('accept', new sfValidatorBoolean(array('required' => true)));

    $this->setWidget('email',    new sfWidgetFormInputText());
    $this->setValidator('email', new sfValidatorEmail(array('max_length' => 255, 'required' => true)));

    $this->setWidget('email_hide',    new sfWidgetFormSelectRadio(array('choices' => array('Email_show','Email_hide'))));
    $this->setValidator('email_hide', new sfValidatorBoolean(array('required' => false)));

    $this->setWidget('category_id', new sfWidgetFormDoctrineChoiceOptgroup(array(
                                    'model' => 'Category', 'query' => Doctrine::getTable('Category')->getTreeQuery()
                                    )));

    $this->widgetSchema->setHelp('site_url', 'PostForm: site_url help');
  }
}
