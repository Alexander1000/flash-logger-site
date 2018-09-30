<?php declare(strict_types = 1);

namespace Clients\FlashLogger;

use NetworkTransport;
use Clients\Soa;

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
     * @return Response\Logs
     */
    public function logs(Request\Logs $request): Response\Logs
    {
        $response = new Soa\Response\Result($this->transport->send($request));
        return new Response\Logs($response->getResult());
    }
}
