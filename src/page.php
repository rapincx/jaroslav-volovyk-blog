<?php

use Jaroslavv\Blog\Block\CategoryListBlock;
use Jaroslavv\Framework\View\Renderer;

/** @var Renderer $this */
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
        <?= $this->render(CategoryListBlock::class) ?>
    </nav>
</header>

<main>
    <?= $this->render($this->getContent(), $this->getContentBlockTemplate()) ?>
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
