<?php
/** @var NewPostsBlock $block */

use Jaroslavv\Cms\Block\NewPostsBlock;

?>
<section title="New Articles">
    <h2>New Articles</h2>
    <div class="article-list">
        <?php foreach ($block->getNewPosts() as $post) : ?>
            <div class="article">
                <a href="/<?= $post->getUrl() ?>" title="<?= $post->getName() ?>">
                    <img src="/article-placeholder.jpg" alt="<?= $post->getName() ?>" width="200"/>
                </a>
                <a href="/<?= $post->getUrl() ?>" title="<?= $post->getName() ?>"><?= $post->getName() ?></a>
                <span>Date publish: <?= $post->getDate() ?></span>
            </div>
        <?php endforeach; ?>
    </div>
</section>