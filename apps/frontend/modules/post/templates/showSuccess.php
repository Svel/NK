<?php use_helper('Number', 'Date') ?>

<?php slot('content_breadcrumbs'); ?>
  полосочка хлебных крошек
  <?php #include_component('catalog', 'breadcrumbs'); ?>
<?php end_slot(); ?>

<h1><?php echo $post->getTitle() ?></h1>

<div id="post">
  <ul class="info">
    <li><span class="definition"><?php echo __('User name') ?>:</span> <strong class="value"><?php echo $post->getUserName() ?></strong></li>
    <?php if (!$post->getEmailHide()): ?>
    <li><span class="definition"><?php echo __('Email') ?>:</span> <strong class="value"><?php echo $post->getEmail() ?></strong></li>
    <?php endif; ?>
    <?php if ($post->getSiteUrl()): ?>
    <li><span class="definition"><?php echo __('Site url') ?>:</span> <strong class="value"><?php echo $post->getSiteUrl() ?></strong></li>
    <?php endif; ?>
    <?php if ($post->getPhone()): ?>
    <li><span class="definition"><?php echo __('Phone') ?>:</span> <strong class="value"><?php echo $post->getPhone() ?></strong></li>
    <?php endif; ?>

    <li><span class="definition"><?php echo __('Actual from') ?>:</span> <strong class="value"><?php echo format_date($post->getDateTimeObject('updated_at')->format('Y/m/d'), 'D'); ?></strong></li>

    <?php if ($post->getPrice()): ?>
    <li><span class="definition"><?php echo __('Price') ?>:</span> <strong class="value"><?php echo format_currency($post->getPrice(), 'RUR') ?></strong></li>
    <?php endif; ?>
  </ul>

  <div class="description"><?php echo $post->getDescription() ?></div>
</div>
