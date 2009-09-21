
<div id="breadcrumps">
<?php
    if ($category && $breadcrumbs) {
        foreach($breadcrumbs as $breadcrumb) {
            if($breadcrumb->getLevel() > 0) {
                echo '<ul><li>', link_to(htmlspecialchars($breadcrumb->getName(), ENT_QUOTES), 'catalog_list', $breadcrumb), '&nbsp;/&nbsp;';
            }
        }
        echo '<ul><li>', link_to(htmlspecialchars($category->getName(), ENT_QUOTES), 'catalog_list', $category);
        echo str_repeat('</li></ul>', $breadcrumb->getLevel()+1);
    }
?>
</div>
