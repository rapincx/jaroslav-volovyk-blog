<?php
/** @var PostBlock $block */

use Jaroslavv\Blog\Block\PostBlock;

$post = $block->getPost();
?>
<div class="product-page">
    <img src="/article-placeholder.jpg" alt="<?= $post->getName() ?>" width="300"/>
    <h1><?= $post->getName() ?></h1>
    <p><?= $post->getDescription() ?></p>
    <span>Date publish: <?= $post->getDate() ?></span>
</div>