<?php

declare(strict_types=1);

namespace Jaroslavv\Blog\Model\Post;

use Jaroslavv\Framework\Model\BaseEntity;

class Entity extends BaseEntity
{
    private int $postId;

    private string $name;

    private string $url;

    private string $description;

    private int $date;

    /**
     * @return int
     */
    public function getPostId(): int
    {
        return $this->postId;
    }

    /**
     * @param int $postId
     * @return $this
     */
    public function setPostId(int $postId): Entity
    {
        $this->postId = $postId;

        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName(string $name): Entity
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return $this
     */
    public function setUrl(string $url): Entity
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return $this
     */
    public function setDescription(string $description): Entity
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @param string $format
     * @return string
     */
    public function getDate(string $format = 'Y-m-d'): string
    {
        return date('Y-m-d', $this->date) ?? '';
    }

    /**
     * @return int
     */
    public function getDateNative(): int
    {
        return $this->date;
    }

    /**
     * @param int $date
     * @return $this
     */
    public function setDate(int $date): Entity
    {
        $this->date = $date;

        return $this;
    }
}
