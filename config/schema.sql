DROP TABLE IF EXISTS `category_post`;
#---
DROP TABLE IF EXISTS `category`;
#---
DROP TABLE IF EXISTS `post`;
#---
CREATE TABLE `post`
(
    `post_id`     int unsigned NOT NULL AUTO_INCREMENT COMMENT 'Post ID',
    `name`        varchar(127) NOT NULL COMMENT 'Name',
    `url`         varchar(127) NOT NULL COMMENT 'URL',
    `description` varchar(4095) DEFAULT NULL COMMENT 'Description',
    PRIMARY KEY (`post_id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4 COMMENT ='Post Entity';
#---
CREATE TABLE `category`
(
    `category_id` int unsigned NOT NULL AUTO_INCREMENT COMMENT 'Category ID',
    `name`        varchar(127) NOT NULL COMMENT 'Name',
    `url`         varchar(127) NOT NULL COMMENT 'URL',
    PRIMARY KEY (`category_id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4 COMMENT ='Category Entity';
#---
INSERT INTO `post` (`name`, `url`, `description`)
VALUES ('Backend Developer — Complete Roadmap in 2021', 'backend-developer-complete-roadmap-in-2021',
        'The primary responsibilities of a backend developer are making updates, changes and monitoring a site’s functionality.'),
       ('10 Amazing Web Apps for Web Developers', '10-amazing-web-apps-for-web-developers',
        'While going through my web development career, I came to know about various web apps, that each web developer requires. Let\'s have a look at them.'),
       ('Best Practices for writing secure PHP scripts', 'best-practices-for-writing-secure-php-scripts',
        'You can get many guides for writing secure PHP scripts but here I am sharing some tips which I think will be helpful to beginners.'),
       ('Laravel Barcode generation tutorial', 'laravel-barcode-generation-tutorial',
        'Barcode system integration with an application is really most wanted feature in the current development trend. It makes the workflow of your application faster and gives a better user experience.'),
       ('Laravel Livewire CRUD tutorial', 'laravel-livewire-crud-tutorial',
        'Laravel Livewire is a frontend framework package for Laravel Framework. With the help of Laravel Livewire, you can run php code like JavaScript! It\'s really an interesting and magical frontend framework package for Laravel.'),
       ('Deploy Laravel 6 project on shared hosting', 'deploy-laravel-6-project-on-shared-hosting',
        'Shared hosting is very popular, especially who are looking for budget hosting to host their application. If you are just finished your laravel project in your local environment and intend to deploy your project on shared hosting like cPanel or you already tried to deploy but it\'s not working as expected then you are in right place.'),
       ('Symfony Tutorial: Building a Blog (Part 1)', 'symfony-tutorial-building-a-blog-part-1',
        'Let\'s create a secure blog engine with Symfony.'),
       ('Symfony Tutorial: Building a Blog (Part 2)', 'symfony-tutorial-building-a-blog-part-2',
        'In this part of the article, we will cover installing Bootstrap, a UI framework for web applications, to make the blog engine look nicer visually. We will also enhance our blog engine to allow visitors to.'),
       ('Symfony Tutorial: Building a Blog (Part 3)', 'symfony-tutorial-building-a-blog-part-3',
        'Learn how to create and deploy a secure blog engine with Symfony.');
#---
INSERT INTO `category` (`name`, `url`)
VALUES ('PHP', 'php'),
       ('Laravel', 'laravel'),
       ('Symfony', 'symfony');
#---
ALTER TABLE `post`
    ADD COLUMN `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
        COMMENT 'Created At' AFTER `description`,
    ADD COLUMN `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
        ON UPDATE CURRENT_TIMESTAMP
        COMMENT 'Updated At' AFTER `created_at`;
#---
CREATE TABLE `category_post`
(
    `category_post_id` int unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
    `post_id`          int unsigned NOT NULL COMMENT 'Post ID',
    `category_id`      int unsigned NOT NULL COMMENT 'Category ID',
    PRIMARY KEY (`category_post_id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4 COMMENT ='Category Post';
#---
ALTER TABLE `category_post`
    ADD CONSTRAINT `FK_CATEGORY_CATEGORY_ID` FOREIGN KEY (`category_id`)
        REFERENCES `category` (`category_id`) ON DELETE CASCADE,
    ADD CONSTRAINT `FK_CATEGORY_POST_ID` FOREIGN KEY (`post_id`)
        REFERENCES `post` (`post_id`) ON DELETE CASCADE;
#---
INSERT INTO `category_post` (`category_id`, `post_id`)
VALUES (1, 1),
       (1, 2),
       (1, 3),
       (2, 4),
       (2, 5),
       (2, 6),
       (3, 7),
       (3, 8),
       (3, 9);