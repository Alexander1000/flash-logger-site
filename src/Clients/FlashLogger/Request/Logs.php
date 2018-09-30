<?php declare(strict_types = 1);

namespace Clients\FlashLogger\Request;

use NetworkTransport;

class Logs extends NetworkTransport\Http\Request
{
    public function __construct(int $limit, int $offset, string $token)
    {
        parent::__construct('/1/logs', 'POST', ['Authorization' => sprintf('Bearer %s', $token)]);
        $this->data = [
            'limit' => $limit,
            'offset' => $offset
        ];
    }
}
