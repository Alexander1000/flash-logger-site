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

    protected function unpackResult(NetworkTransport\Http\Response $response)
    {
        if ($response->isError()) {
            return null;
        }

        if ($response->getResponse() === null) {
            return null;
        }

        $result = json_decode($response->getResponse(), true);
    }
}
