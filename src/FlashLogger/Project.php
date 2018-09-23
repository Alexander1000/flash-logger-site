<?php declare(strict_types = 1);

namespace FlashLogger;

class Project
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $token;

    public function __construct(int $id, string $name, string $title, string $token)
    {
        $this->id = $id;
        $this->name = $name;
        $this->title = $title;
        $this->token = $token;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->token;
    }
}
