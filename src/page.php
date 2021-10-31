<?php
require_once '../src/data.php';

/**
 * @var string $page
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>chaOS PHP Framework</title>
    <style>
        header,
        main,
        footer {
            border: 1px dashed black;
        }

        .article-list {
            display: flex;
        }

        .article-list .article {
            max-width: 30%;
        }
    </style>
</head>
<body>
<header>
    <a href="/" title="chaOS PHP Framework">
        <img src="logo.png" alt="chaOS Logo" width="200"/>
    </a>
    <nav>
        <ul>
            <?php foreach (blogGetCategory() as $category) : ?>
                <li>
                    <a href="/<?= $category['url'] ?>"><?= $category['name'] ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>
</header>

<main>
    <?php require_once "../src/pages/$page" ?>
</main>

<footer>
    <nav>
        <ul>
            <li>
                <a href="/about-us">About Us</a>
            </li>
            <li>
                <a href="/terms-and-conditions">Terms & Conditions</a>
            </li>
            <li>
                <a href="/contact-us">Contact Us</a>
            </li>
        </ul>
    </nav>
    <p>© chaOS 2021. All Rights Reserved.</p>
</footer>
</body>
</html>
