<?php
/**
 */
class PostTable extends Doctrine_Table
{
  public function getHomePageQuery()
  {
    $q = $this->createQuery('Post p')
       ->where('p.expires_at > ?', date('Y-m-d H:i:s', time()))
       ->orderBy('p.created_at DESC')
       ->limit(sfConfig::get('app_posts_home_page_limit', 10));

    if (sfConfig::get('app_posts_home_page_validated', false)) {
      $q->addWhere('p.is_validated = ?', true);
    }

    return $q->execute();
  }
}
