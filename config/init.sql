DROP DATABASE IF EXISTS jaroslavv_blog;

DROP USER IF EXISTS 'jaroslavv_blog_user'@'%';

CREATE DATABASE jaroslavv_blog;

CREATE USER 'jaroslavv_blog_user'@'%' IDENTIFIED BY '45Ya!$""sT&P*C%RNSEhr';

GRANT ALL ON jaroslavv_blog.* TO 'jaroslavv_blog_user'@'%';