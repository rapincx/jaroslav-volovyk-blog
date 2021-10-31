<?php

declare(strict_types=1);

namespace Jaroslavv\Blog\Repository;

use DI\DependencyException;
use DI\FactoryInterface;
use DI\NotFoundException;
use Jaroslavv\Blog\Model\Post\Entity;
use Jaroslavv\Framework\Repository\RepositoryInterface;

class PostRepository implements RepositoryInterface
{
    private FactoryInterface $factory;

    /**
     * @param FactoryInterface $factory
     */
    public function __construct(FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    /**
     * @return Entity[]
     * @throws DependencyException
     * @throws NotFoundException
     */
    public function getList(): array
    {
        return [
            1 => $this->makeEntity()->setPostId(1)
                ->setName('Backend Developer — Complete Roadmap in 2021')
                ->setUrl('backend-developer-complete-roadmap-in-2021')
                ->setDescription('The primary responsibilities of a backend developer are making updates, changes and monitoring a site’s functionality.')
                ->setDate(1634324611),
            2 => $this->makeEntity()->setPostId(2)
                ->setName('10 Amazing Web Apps for Web Developers')
                ->setUrl('10-amazing-web-apps-for-web-developers')
                ->setDescription('While going through my web development career, I came to know about various web apps, that each web developer requires. Let\'s have a look at them.')
                ->setDate(1634411011),
            3 => $this->makeEntity()->setPostId(3)
                ->setName('Best Practices for writing secure PHP scripts')
                ->setUrl('best-practices-for-writing-secure-php-scripts')
                ->setDescription('You can get many guides for writing secure PHP scripts but here I am sharing some tips which I think will be helpful to beginners.')
                ->setDate(1634497411),
            4 => $this->makeEntity()->setPostId(4)
                ->setName('Laravel Barcode generation tutorial')
                ->setUrl('laravel-barcode-generation-tutorial')
                ->setDescription('Barcode system integration with an application is really most wanted feature in the current development trend. It makes the workflow of your application faster and gives a better user experience.')
                ->setDate(1634583811),
            5 => $this->makeEntity()->setPostId(5)
                ->setName('Laravel Livewire CRUD tutorial')
                ->setUrl('laravel-livewire-crud-tutorial')
                ->setDescription('Laravel Livewire is a frontend framework package for Laravel Framework. With the help of Laravel Livewire, you can run php code like JavaScript! It\'s really an interesting and magical frontend framework package for Laravel.')
                ->setDate(1634670211),
            6 => $this->makeEntity()->setPostId(6)
                ->setName('Deploy Laravel 6 project on shared hosting')
                ->setUrl('deploy-laravel-6-project-on-shared-hosting')
                ->setDescription('Shared hosting is very popular, especially who are looking for budget hosting to host their application. If you are just finished your laravel project in your local environment and intend to deploy your project on shared hosting like cPanel or you already tried to deploy but it\'s not working as expected then you are in right place.')
                ->setDate(1634756611),
            7 => $this->makeEntity()->setPostId(7)
                ->setName('Symfony Tutorial: Building a Blog (Part 1)')
                ->setUrl('symfony-tutorial-building-a-blog-part-1')
                ->setDescription('Let\'s create a secure blog engine with Symfony.')
                ->setDate(1634843011),
            8 => $this->makeEntity()->setPostId(8)
                ->setName('Symfony Tutorial: Building a Blog (Part 2)')
                ->setUrl('symfony-tutorial-building-a-blog-part-2')
                ->setDescription('In this part of the article, we will cover installing Bootstrap, a UI framework for web applications, to make the blog engine look nicer visually. We will also enhance our blog engine to allow visitors to.')
                ->setDate(1634929411),
            9 => $this->makeEntity()->setPostId(9)
                ->setName('Symfony Tutorial: Building a Blog (Part 3)')
                ->setUrl('symfony-tutorial-building-a-blog-part-3')
                ->setDescription('Learn how to create and deploy a secure blog engine with Symfony.')
                ->setDate(1635015811),
        ];
    }

    /**
     * @param string $url
     * @return ?Entity
     * @throws DependencyException
     * @throws NotFoundException
     */
    public function getByUrl(string $url): ?Entity
    {
        $data = array_filter(
            $this->getList(),
            static function ($post) use ($url) {
                return $post->getUrl() === $url;
            }
        );

        return array_pop($data);
    }

    /**
     * @param array $postIds
     * @return Entity[]
     * @throws DependencyException
     * @throws NotFoundException
     */
    public function getByIds(array $postIds)
    {
        $posts = array_intersect_key(
            $this->getList(),
            array_flip($postIds)
        );
        usort($posts, static function ($a, $b) {
            return $b->getDateNative() - $a->getDateNative();
        });
        return $posts;
    }

    /**
     * @return Entity
     * @throws DependencyException
     * @throws NotFoundException
     */
    public function makeEntity(): Entity
    {
        return $this->factory->make(Entity::class);
    }
}
