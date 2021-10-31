<?php

declare(strict_types=1);

/**
 * @return array{category_id: int, name: string, url: string, articles: array}
 */
function blogGetCategory(): array
{
    return [
        1 => [
            'category_id' => 1,
            'name'        => 'PHP',
            'url'         => 'php',
            'articles'    => [1, 2, 3],
        ],
        2 => [
            'category_id' => 2,
            'name'        => 'Laravel',
            'url'         => 'laravel',
            'articles'    => [3, 4, 5],
        ],
        3 => [
            'category_id' => 3,
            'name'        => 'Symfony',
            'url'         => 'symfony',
            'articles'    => [6, 7, 8],
        ],
    ];
}

/**
 * @return array{article_id: int, name: string, url: string, description: string, date: int}
 */
function blogGetArticle(): array
{
    return [
        1 => [
            'article_id'  => 1,
            'name'        => 'Backend Developer — Complete Roadmap in 2021',
            'url'         => 'backend-developer-complete-roadmap-in-2021',
            'description' => 'The primary responsibilities of a backend developer are making updates, changes and monitoring a site’s functionality.',
            'date'        => 1634324611,
        ],
        2 => [
            'article_id'  => 2,
            'name'        => '10 Amazing Web Apps for Web Developers',
            'url'         => '10-amazing-web-apps-for-web-developers',
            'description' => 'While going through my web development career, I came to know about various web apps, that each web developer requires. Let\'s have a look at them.',
            'date'        => 1634411011,
        ],
        3 => [
            'article_id'  => 3,
            'name'        => 'Best Practices for writing secure PHP scripts',
            'url'         => 'best-practices-for-writing-secure-php-scripts',
            'description' => 'You can get many guides for writing secure PHP scripts but here I am sharing some tips which I think will be helpful to beginners.',
            'date'        => 1634497411,
        ],
        4 => [
            'article_id'  => 4,
            'name'        => 'Laravel Barcode generation tutorial',
            'url'         => 'laravel-barcode-generation-tutorial',
            'description' => 'Barcode system integration with an application is really most wanted feature in the current development trend. It makes the workflow of your application faster and gives a better user experience.',
            'date'        => 1634583811,
        ],
        5 => [
            'article_id'  => 5,
            'name'        => 'Laravel Livewire CRUD tutorial',
            'url'         => 'laravel-livewire-crud-tutorial',
            'description' => 'Laravel Livewire is a frontend framework package for Laravel Framework. With the help of Laravel Livewire, you can run php code like JavaScript! It\'s really an interesting and magical frontend framework package for Laravel.',
            'date'        => 1634670211,
        ],
        6 => [
            'article_id'  => 6,
            'name'        => 'Deploy Laravel 6 project on shared hosting',
            'url'         => 'deploy-laravel-6-project-on-shared-hosting',
            'description' => 'Shared hosting is very popular, especially who are looking for budget hosting to host their application. If you are just finished your laravel project in your local environment and intend to deploy your project on shared hosting like cPanel or you already tried to deploy but it\'s not working as expected then you are in right place.',
            'date'        => 1634756611,
        ],
        7 => [
            'article_id'  => 7,
            'name'        => 'Symfony Tutorial: Building a Blog (Part 1)',
            'url'         => 'symfony-tutorial-building-a-blog-part-1',
            'description' => 'Let\'s create a secure blog engine with Symfony.',
            'date'        => 1634843011,
        ],
        8 => [
            'article_id'  => 8,
            'name'        => 'Symfony Tutorial: Building a Blog (Part 2)',
            'url'         => 'symfony-tutorial-building-a-blog-part-2',
            'description' => 'In this part of the article, we will cover installing Bootstrap, a UI framework for web applications, to make the blog engine look nicer visually. We will also enhance our blog engine to allow visitors to.',
            'date'        => 1634929411,
        ],
        9 => [
            'article_id'  => 9,
            'name'        => 'Symfony Tutorial: Building a Blog (Part 3)',
            'url'         => 'symfony-tutorial-building-a-blog-part-3',
            'description' => 'Learn how to create and deploy a secure blog engine with Symfony.',
            'date'        => 1635015811,
        ],
    ];
}

/**
 * @param int $categoryId
 *
 * @return array
 */
function blogGetCategoryArticle(int $categoryId): array
{
    $categories = blogGetCategory();

    if (!isset($categories[$categoryId])) {
        throw new InvalidArgumentException("Category with ID $categoryId does not exist");
    }

    $articlesForCategory = [];
    $articles = blogGetArticle();

    foreach ($categories[$categoryId]['articles'] as $articleId) {
        if (!isset($articles[$articleId])) {
            throw new InvalidArgumentException("Article with ID $articleId from category $categoryId does not exist");
        }

        $articlesForCategory[] = $articles[$articleId];
    }

    usort($articlesForCategory, static function ($a, $b) {
        return $b['date'] - $a['date'];
    });

    return $articlesForCategory;
}

/**
 * @param string $url
 *
 * @return array|null
 */
function blogGetCategoryByUrl(string $url): ?array
{
    $data = array_filter(
        blogGetCategory(),
        static function ($category) use ($url) {
            return $category['url'] === $url;
        }
    );

    return array_pop($data);
}

/**
 * @param string $url
 *
 * @return array|null
 */
function blogGetArticleByUrl(string $url): ?array
{
    $data = array_filter(
        blogGetArticle(),
        static function ($article) use ($url) {
            return $article['url'] === $url;
        }
    );

    return array_pop($data);
}

/**
 * @return array[]
 */
function blogGetNewArticles(): array
{
    $articles = blogGetArticle();
    usort($articles, static function ($a, $b) {
        return $b['date'] - $a['date'];
    });
    return array_slice($articles, 0, 3);
}
