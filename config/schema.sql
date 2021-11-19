DROP TABLE IF EXISTS `category_post`;
#---
DROP TABLE IF EXISTS `category`;
#---
DROP TABLE IF EXISTS `post`;
#---
DROP TABLE IF EXISTS `author_post`;
#---
DROP TABLE IF EXISTS `author`;
#---
DROP TABLE IF EXISTS `daily_statistic`;
#---
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
INSERT INTO `category` (`name`, `url`)
VALUES ('PHP', 'php'),
       ('Laravel', 'laravel'),
       ('Symfony', 'symfony'),
       ('Vue JS', 'vuejs'),
       ('React JS', 'reactjs');
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
        'Learn how to create and deploy a secure blog engine with Symfony.'),
       ('Use Supabase Auth with Vue.js 3', 'use-supabase-auth-with-vue-js-3',
        'Supabase is a self-proclaimed "Open Source Firebase Alternative". I''ve been interested in working with Supbase for a bit now and thought I''d experiment with using their authentication API to get authentication setup for a Vue.js 3 application.'),
       ('How to Migrate from Vue CLI to Vite', 'how-to-migrate-from-vue-cli-to-vite',
        'If you''ve been developing with Vue prior to 2021 there''s a good chance that your build tool of choice was the Vue CLI. It''s been the de-facto standard for scaffolding Vue.js projects for a while. Now though, Evan You''s next generation build tool Vite, has been garnering a lot of attention and is a great alternative to the Vue CLI.'),
       ('Nuxt 3 Beta First Impressions', 'nuxt-3-beta-first-impressions',
        'Nuxt 3 Beta made it''s debut on October 12 and I couldn''t be more thrilled to give the tires a good kick and take it for a test drive. Here''s an overview of some of the cool new features, as well as some of the quirks I''ve found.'),
       ('React How-to', 'react-howto',
        'Pete Hunt’s guide to the React ecosystem.'),
       ('Timeline for Learning React', 'timeline-for-learning-react',
        'Dave Ceddia’s recommended timeline for learning React and the React ecosystem.'),
       ('9 things every React.js beginner should know', '9-things-every-reactjs-beginner-should-know',
        'Cam Jackson’s guide for beginners.');

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
       (3, 9),
       (4, 10),
       (4, 11),
       (4, 12),
       (5, 13),
       (5, 14),
       (5, 15);
#---
CREATE TABLE `author`
(
    `author_id`  int unsigned NOT NULL AUTO_INCREMENT COMMENT 'Author ID',
    `first_name` varchar(127) NOT NULL COMMENT 'First Name',
    `last_name`  varchar(127) NOT NULL COMMENT 'Last Name',
    'email'      varchar(127) NOT NULL COMMENT 'Email',
    'nickname'   varchar(127) NOT NULL COMMENT 'Nickname',
    'password'   varchar(255) NOT NULL COMMENT 'Password',
    'birthday'   DATE         NULL COMMENT 'Birthday',
    PRIMARY KEY (`author_id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4 COMMENT ='Author Entity';
#---
INSERT INTO `author` (`first_name`, `last_name`, `email`, `nickname`, `password`)
VALUES ('Eric', 'Bina', 'eric.bina@gmail.com', 'ebina', 'e63a190ba2c13bf878999344cae00737'),
       ('Rasmus', 'Lerdorf', 'rasmus.lerdorf@gmail.com', 'rlerdorf', 'f17eb3ef82932442808f8efa91fb3691'),
       ('John', 'Walker', 'john.walker@gmail.com', 'jwalker', '6932e1d4a6509323b7bc26ee5e24508e'),
       ('John', 'Resig', 'john.resig@gmail.com', 'jresig', 'c6f0b445dfc7153972be591a542414c4'),
       ('Eric', 'Allman', 'eric.allman@gmail.com', 'eallman', 'df74236e999df9ecd179f6d1f940d7f9');
#---
CREATE TABLE `author_post`
(
    `author_post_id` int unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
    `author_id`      int unsigned NOT NULL COMMENT 'Author ID',
    `post_id`        int unsigned NOT NULL COMMENT 'Post ID',
    PRIMARY KEY (`author_post_id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4 COMMENT ='Author Post';
#---
ALTER TABLE `author_post`
    ADD CONSTRAINT `FK_AUTHOR_CATEGORY_ID` FOREIGN KEY (`author_id`)
        REFERENCES `author` (`author_id`) ON DELETE CASCADE,
    ADD CONSTRAINT `FK_AUTHOR_POST_ID` FOREIGN KEY (`post_id`)
        REFERENCES `post` (`post_id`) ON DELETE CASCADE;
#---
INSERT INTO `author_post` (`author_id`, `post_id`)
VALUES (1, 7),
       (1, 8),
       (1, 9),
       (2, 1),
       (2, 2),
       (2, 3),
       (3, 4),
       (3, 5),
       (3, 6),
       (4, 10),
       (4, 11),
       (4, 12),
       (5, 13),
       (5, 14),
       (5, 15);
#---
CREATE TABLE `daily_statistic`
(
    `post_id` int unsigned NOT NULL COMMENT 'Post ID',
    `date`    DATE         NOT NULL COMMENT 'Date',
    `views`   int unsigned NOT NULL COMMENT 'Views'
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4 COMMENT ='Daily Statistics';
#---
ALTER TABLE `daily_statistic`
    ADD CONSTRAINT `FK_DAILY_STATISTIC_POST_ID` FOREIGN KEY (`post_id`)
        REFERENCES `post` (`post_id`) ON DELETE CASCADE;
#---
INSERT INTO `daily_statistic` (`post_id`, `date`, `views`)
VALUES (1, '2021-11-20', 13),
       (1, '2021-11-21', 17),
       (2, '2021-11-20', 14),
       (2, '2021-11-21', 16),
       (3, '2021-11-20', 11),
       (3, '2021-11-21', 17),
       (4, '2021-11-20', 20),
       (4, '2021-11-21', 25),
       (5, '2021-11-20', 21),
       (5, '2021-11-21', 23),
       (6, '2021-11-20', 23),
       (6, '2021-11-21', 24),
       (7, '2021-11-20', 24),
       (7, '2021-11-21', 24),
       (8, '2021-11-20', 25),
       (8, '2021-11-21', 21),
       (9, '2021-11-20', 27),
       (9, '2021-11-21', 22),
       (10, '2021-11-20', 17),
       (10, '2021-11-21', 11),
       (11, '2021-11-20', 23),
       (11, '2021-11-21', 16),
       (12, '2021-11-20', 21),
       (12, '2021-11-21', 19),
       (13, '2021-11-20', 18),
       (13, '2021-11-21', 25),
       (14, '2021-11-20', 9),
       (14, '2021-11-21', 13),
       (15, '2021-11-20', 13),
       (15, '2021-11-21', 10);
