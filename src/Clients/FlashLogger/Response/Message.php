<?php declare(strict_types = 1);

namespace Clients\FlashLogger\Response;

class Message
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var int
     */
    protected $level;

    /**
     * @var string
     */
    protected $message;

    /**
     * @var array
     */
    protected $context;

    /**
     * @var array
     */
    protected $tags;

    /**
     * @var int
     */
    protected $timestamp;

    /**
     * Message constructor.
     * @param int $id
     * @param int $level
     * @param string $message
     * @param array $context
     * @param array $tags
     * @param int $timestamp
     */
    public function __construct(int $id, int $level, string $message, array $context, array $tags, int $timestamp)
    {
        $this->id = $id;
        $this->level = $level;
        $this->message = $message;
        $this->context = $context;
        $this->tags = $tags;
        $this->timestamp = $timestamp;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getLevel(): int
    {
        return $this->level;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @return array
     */
    public function getContext(): array
    {
        return $this->context;
    }

    /**
     * @return array
     */
    public function getTags(): array
    {
        return $this->tags;
    }

    /**
     * @return int
     */
    public function getTimestamp(): int
    {
        return $this->timestamp;
    }
}
