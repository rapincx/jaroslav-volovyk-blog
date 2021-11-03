<?php

namespace Jaroslavv\Cms\Block;

use DI\DependencyException;
use DI\NotFoundException;
use Jaroslavv\Blog\Model\Post\Entity;
use Jaroslavv\Blog\Repository\PostRepository;
use Jaroslavv\Framework\View\Block;

class NewPostsBlock extends Block
{
    private PostRepository $postRepository;

    protected string $template = 'new-posts.php';

    /**
     * @param PostRepository $postRepository
     */
    public function __construct(
        PostRepository $postRepository
    )
    {
        $this->postRepository = $postRepository;
        parent::__construct();
    }

    /**
     * @return string
     */
    public function getView(): string
    {
        return __DIR__ . '/../view/';
    }

    /**
     * @return Entity[]
     * @throws DependencyException
     * @throws NotFoundException
     */
    function getNewPosts(): array
    {
        $posts = $this->postRepository->getList();
        /**
         * @param Entity $a
         * @param Entity $b
         * @return mixed
         */
        usort($posts, static function ($a, $b) {
            return $b->getDateNative() - $a->getDateNative();
        });
        return array_slice($posts, 0, 3);
    }
}
