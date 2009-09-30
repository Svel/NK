<?php

/**
 * Page form.
 *
 * @package    Naklej
 * @subpackage form
 * @author     Svel <svel.sontz@gmail.com>
 * @version    SVN: $Id$
 */
class PageForm extends BasePageForm
{
  public function configure()
  {
    $this->widgetSchema['content'] = new sfWidgetFormCKEditor(array('jsoptions' => array('filebrowserImageUploadUrl' => '/admin_dev.php/page')));
  }
}
