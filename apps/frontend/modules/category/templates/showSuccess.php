<?php use_helper('Number') ?>
<?php slot('content_breadcrumbs'); ?>
  полосочка хлебных крошек
  <?php #include_component('catalog', 'breadcrumbs'); ?>
<?php end_slot(); ?>

<h1><?php echo $category ?></h1>

<ul id="post_list">
<?php foreach ($pager->getResults() as $post): ?>
  <li class="<?php echo ($post->getIsValidated() ? 'validation_passed' : 'validation_none') ?> post">
        <?php if ($post->getPrice()): ?>
          <div class="price"><?php echo format_currency($post->getPrice(), 'RUR') ?></div>
        <?php endif; ?>
        <h2><?php echo link_to($post->getTitle(), 'post', $post) ?></h2>
        <div class="description">
          <?php echo $post->getDescription() ?>
        </div>
  </li>
<?php endforeach; ?>
</ul>


<?php if ($pager->haveToPaginate()): ?>
    <div class="pagination">
        <a href="<?php echo url_for('category', $category) ?>?page=1">начало</a>
        <a href="<?php echo url_for('category', $category) ?>?page=<?php echo $pager->getPreviousPage() ?>">предыдущая</a>
        <?php foreach ($pager->getLinks() as $page): ?>
            <?php if ($page == $pager->getPage()): ?>
                <?php echo $page ?>
            <?php else: ?>
                <a href="<?php echo url_for('category', $category) ?>?page=<?php echo $page ?>"><?php echo $page ?></a>
            <?php endif; ?>
        <?php endforeach; ?>

        <a href="<?php echo url_for('category', $category) ?>?page=<?php echo $pager->getNextPage() ?>">следующая</a>
        <a href="<?php echo url_for('category', $category) ?>?page=<?php echo $pager->getLastPage() ?>">последная</a>
    </div>
<?php endif; ?>

<div class="pagination_desc">
    <strong><?php echo $pager->getNbResults() ?></strong> объявлений в категории
    <?php if ($pager->haveToPaginate()): ?>
        - страница <strong><?php echo $pager->getPage(); ?> из <?php echo $pager->getLastPage() ?></strong>
    <?php endif; ?>
</div>
