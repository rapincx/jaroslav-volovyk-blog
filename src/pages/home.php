<section title="New Articles">
    <h2>New Articles</h2>
    <div class="article-list">
        <?php foreach (blogGetNewArticles() as $article) : ?>
            <div class="article">
                <a href="/<?= $article['url'] ?>" title="<?= $article['name'] ?>">
                    <img src="/article-placeholder.jpg" alt="<?= $article['name'] ?>" width="200"/>
                </a>
                <a href="/<?= $article['url'] ?>" title="<?= $article['name'] ?>"><?= $article['name'] ?></a>
                <span>Date publish: <?= date('Y-m-d', $article['date']) ?></span>
            </div>
        <?php endforeach; ?>
    </div>
</section>
