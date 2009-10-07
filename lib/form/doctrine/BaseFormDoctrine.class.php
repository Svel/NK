<?php

/**
 * Project form base class.
 *
 * @package    Naklej
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id$
 */
abstract class BaseFormDoctrine extends sfFormDoctrine
{
  public function __construct($options = array(), $messages = array())
  {
    sfValidatorBase::setDefaultMessage('required', 'Required field');
    sfValidatorBase::setDefaultMessage('invalid', 'Error in this field');

    parent::__construct($options = array(), $messages = array());
  }

  public function setup()
  {
  }
}
