<?php

class sfWidgetFormCKEditor extends sfWidgetFormTextarea {

  protected function configure($options = array(), $attributes = array())
  {
      if(isset($options['jsoptions']))
      {
        $this->addOption('jsoptions', $options['jsoptions']);
      }
      parent::configure($options, $attributes);
  }

  public function render($name, $value = null, $attributes = array(), $errors = array())
  {

    $editorPath = sfConfig::get('sf_rich_text_ck_js_file', 'ckeditor/ckeditor.js');
    sfContext::getInstance()->getResponse()->addJavascript($editorPath);

    $html  = "<script type='text/javascript' >";
    $html .= " CKEDITOR.replace('".$name."',{";

    // http://cksource.com/forums/viewtopic.php?f=6&t=14493
    $html .= "\n      on :
      {
         instanceReady : function( ev )
         {
            this.dataProcessor.writer.setRules( 'p',
               {
                  indent : false,
                  breakBeforeOpen : true,
                  breakAfterOpen : false,
                  breakBeforeClose : false,
                  breakAfterClose : true
               });
         }
      }";

    $jsoptions = $this->getOption('jsoptions');
    if($jsoptions)
    {
      $sep = ',';
      foreach($jsoptions as $k => $v)
      {
        $html .= $sep.$k." : '".$v."'";
      }

    }

    $html .="});";
    $html .= "</script>";

    return  parent::render($name, $value , $attributes, $errors).$html;
  }
}
