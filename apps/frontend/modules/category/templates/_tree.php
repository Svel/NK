<?php
    if ($categories) {

        $level = 0;
        $prevLevel = 0;
        foreach ($categories as $category) {

            $treeNode = $category->getNode();
            $level    = $treeNode->getLevel();

            if ($level == $prevLevel) {
                echo '</li>';

            } else if ($level > $prevLevel) {
                echo "<ul class='level{$level}'>";

            } else if ($level < $prevLevel) {
                echo  '</li>' , str_repeat("</ul></li>", $prevLevel - $level);
            }

            $selected = ($category->getId() == $selectedId) ? array('class' => 'selected') : array();
            echo "<li>", link_to(htmlspecialchars($category['name'], ENT_QUOTES), 'category', $category, $selected);

            $prevLevel = $level;
        }
        echo str_repeat('</li></ul>', $level);
    }
?>
