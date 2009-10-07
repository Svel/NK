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
    $this->widgetSchema->setFormFormatterName('list');

    unset(
      $this['created_at'], $this['updated_at'],
      $this['expires_at'], $this['is_validated']
    );

    $this->setWidget('accept', new sfWidgetFormInputCheckbox());
    $this->setValidator('accept', new sfValidatorBoolean(array('required' => true)));

    $this->setWidget('email', new sfWidgetFormInputText());
    $this->setValidator('email', new sfValidatorEmail(array('max_length' => 255, 'required' => true)));
  }
}
