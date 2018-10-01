<?php declare(strict_types = 1);

namespace Clients\FlashLogger\Response;

class Logs implements \Iterator
{
    /**
     * @var Message[]
     */
    protected $items;

    public function __construct(array $messages)
    {
        $this->items = [];
        foreach ($messages as $message) {
            $this->items[] = new Message(
                $message['id'],
                $message['level'],
                $message['message'],
                $message['context'],
                $message['tags']
            );
        }
    }

    /**
     * {@inheritdoc}
     * @return Message
     */
    public function current(): Message
    {
        return current($this->items);
    }

    /**
     * {@inheritdoc}
     */
    public function next()
    {
        next($this->items);
    }

    /**
     * {@inheritdoc}
     */
    public function key()
    {
        return key($this->items);
    }

    /**
     * {@inheritdoc}
     */
    public function valid(): bool
    {
        return $this->key() !== null;
    }

    /**
     * {@inheritdoc}
     */
    public function rewind()
    {
        reset($this->items);
    }
}
