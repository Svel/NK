<?php
/**
 */
class CategoryTable extends Doctrine_Table
{
  /**
   * Получить запрос для выборки дерева
   *
   * Возвращает дерево без корня
   * Сортировка для отрисовки дерева
   *
   * @param  Doctrine_Query $q
   * @return Doctrine_Query
   */
  public function getTreeQuery(Doctrine_Query $query = null)
  {
    if (!$query) {
      $query = $this->createQuery();
    }

    $query->andWhere('level > ?', 0)
          ->orderby('lft ASC');

    return $query;
  }
}
