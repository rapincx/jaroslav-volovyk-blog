<?php
/** @var CategoryListBlock $block */

use Jaroslavv\Blog\Block\CategoryListBlock;

?>
<ul>
    <?php foreach ($block->getCategories() as $category) : ?>
        <li>
            <a href="/<?= $category->getUrl() ?>"><?= $category->getName() ?></a>
        </li>
    <?php endforeach; ?>
</ul>