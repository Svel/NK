<?php

require_once dirname(__FILE__).'/../lib/pageGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/pageGeneratorHelper.class.php';

/**
 * page actions.
 *
 * @package    Naklej
 * @subpackage page
 * @author     Svel <svel.sontz@gmail.com>
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class pageActions extends autoPageActions
{
  /**
   * upload files from wysiwyg
   */
  public function executeUpload(sfRequest $request)
  {
    $file = $request->getFiles('upload');

    return '<script type="text/javascript">window.parent.CKEDITOR.tools.callFunction(1, \'path/to/file\', \'\');</script>';
  }
}
