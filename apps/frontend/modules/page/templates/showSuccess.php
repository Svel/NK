<?php if ($page->getHeader()): ?>
<h1><?php echo $page->getHeader() ?></h1>
<?php endif; ?>

<?php echo $page->getContent(ESC_RAW) ?>
