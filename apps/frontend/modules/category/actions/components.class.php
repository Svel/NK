<?php

/**
 * category components.
 *
 * @package    Naklej
 * @subpackage category
 * @author     Svel <svel.sontz@gmail.com>
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class categoryComponents extends sfComponents
{
    /**
     * Дерево категорий
     */
    public function executeTree()
    {
        $selectedId = 0;

        $tree = Doctrine::getTable('Category')->getTreeQuery()->execute();
        if (!$tree) {
            $tree = array();

        // Определить выбранную категорию
        } else {
            $category = $this->_getCurrentCategory();
            if ($category) {
                $selectedId = $category->getId();
            }
        }

        $this->setVar('categories', $tree,       true);
        $this->setVar('selectedId', $selectedId, true);
    }


    /**
     * Хлебные крошки
     */
    public function executeBreadcrumbs()
    {
        $category = $this->_getCurrentCategory();
        if ($category) {
            $breadcrumbs = $category->getNode()->getAncestors();
        } else {
            $breadcrumbs = false;
        }

        $this->setVar('breadcrumbs', $breadcrumbs, true);
        $this->setVar('category',    $category,    true);
    }


    /**
     * Определить текущую категорию
     *
     * Возвращает false, если не удалось определить категорию
     *
     * @return false|Category
     */
    private function _getCurrentCategory()
    {
        $route = $this->getController()
                      ->getAction($this->getRequest()->getParameter('module'), $this->getRequest()->getParameter('action'))
                      ->getRoute();
        if ($route instanceof sfDoctrineRoute) {
            $ob = $route->getObject();

            if ($ob instanceof Category) {
                return $ob;

            } else if ($ob instanceof Post) {
                return $ob->getCategory();
            }
        }

        return false;
    }
}
