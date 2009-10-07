<?php

/**
 * Объявления
 *
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 5925 2009-06-22 21:27:17Z jwage $
 */
class Post extends BasePost
{
  public function save(Doctrine_Connection $conn = null)
  {
    if ($this->isNew()) {
      $this->_set('expires_at', date('Y-m-d H:i:s', strtotime('+1 month')));

      if (!$this->getUser()->getEmail()) {
        $user = $this->getUser();
        $user->setName($this->getUserName());
        $user->setEmail($this->getEmail());
        $user->save();
        $this->_set('User', $user);
      }
    }
    return parent::save($conn);
  }
}
