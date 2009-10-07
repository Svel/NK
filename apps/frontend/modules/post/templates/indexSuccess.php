<?php use_helper('Number') ?>
<h1><?php echo __('Latest Post List') ?></h1>

<?php foreach ($post_list as $post): ?>
<div class="post">
  <?php if ($post->getPrice()): ?>
    <div class="price"><?php echo format_currency($post->getPrice(), 'RUR') ?></div>
  <?php endif; ?>
  <h2><?php echo link_to($post->getTitle(), 'post', $post) ?></h2>
  <div class="description">
    <?php echo $post->getDescription() ?>
    <div class="more">[<?php echo link_to(__('read more'), 'post', $post) ?>]</div>
  </div>
</div>
<?php endforeach; ?>
