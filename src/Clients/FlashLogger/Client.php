<?php declare(strict_types = 1);

namespace Clients\FlashLogger;

use NetworkTransport;

class Client
{
    /**
     * @var Transport
     */
    protected $transport;

    public function __construct(Transport $transport)
    {
        $this->transport = $transport;
    }

    /**
     * @param Request\Logs $request
     * @return NetworkTransport\Http\Response
     */
    public function logs(Request\Logs $request): NetworkTransport\Http\Response
    {
        return $this->transport->send($request);
    }
}
