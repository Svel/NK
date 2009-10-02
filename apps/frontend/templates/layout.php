<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_title() ?>
    <?php include_metas() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
  <body>
    <div id="header">
      <span><?php echo link_to('Наклей!', '@homepage') ?></span>
    </div>
    <div id="wrapper">
      <div id="tree"><?php include_component('category', 'tree') ?></div>
      <div id="content"><?php echo $sf_content ?></div>
    </div>
    <div id="footer"><p>&copy; <?php echo link_to('naklej.ru', '@homepage') ?> - бесплатные объявления, <?php echo date('Y', time()) ?></p></div>
  </body>
</html>
