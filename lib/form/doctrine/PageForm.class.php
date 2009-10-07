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
    unset($this['created_at'], $this['updated_at']);

    $this->widgetSchema['description'] = new sfWidgetFormTextarea();

    $this->widgetSchema['content'] = new sfWidgetFormCKEditor(array('jsoptions' => array('filebrowserImageUploadUrl' => '/admin_dev.php/page/upload')));
  }
}
