<?php declare(strict_types = 1);

namespace Clients\FlashLogger\Response;

class Logs
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
}
