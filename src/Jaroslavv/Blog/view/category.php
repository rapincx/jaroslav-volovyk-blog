<?php
/** @var CategoryBlock $block */

use Jaroslavv\Blog\Block\CategoryBlock;

?>
<div title="category-wrapper">
    <h1><?= $block->getCategory()->getName() ?></h1>
    <div class="product-list">
        <?php foreach ($block->getCategoryPosts() as $post) : ?>
            <div class="product">
                <a href="/<?= $post->getUrl() ?>" title="<?= $post->getName() ?>">
                    <img src="/article-placeholder.jpg" alt="<?= $post->getName() ?>" width="200"/>
                </a>
                <a href="/<?= $post->getUrl() ?>" title="<?= $post->getName() ?>"><?= $post->getName() ?></a>
                <span>Date publish: <?= $post->getDate() ?></span>
            </div>
        <?php endforeach; ?>
    </div>
</div>