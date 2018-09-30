<?php declare(strict_types = 1);

namespace Clients\Soa\Response;

use NetworkTransport;
use Clients\Soa;

class Result
{
    /**
     * @var NetworkTransport\Http\Response
     */
    protected $response;

    public function __construct(NetworkTransport\Http\Response $response)
    {
        $this->response = $response;
    }

    /**
     * @return array
     * @throws Soa\Exception\EmptyReplyFromServer
     * @throws Soa\Exception\ParseResponse
     * @throws Soa\Exception\ServiceError
     * @throws Soa\Exception\TransportError
     */
    public function getResult(): array
    {
        if ($this->response->isError()) {
            throw new Soa\Exception\TransportError($this->response->getErrorMessage(), $this->response->getErrorCode());
        }

        if ($this->response->getResponse() === null) {
            throw new Soa\Exception\EmptyReplyFromServer();
        }

        $result = json_decode($this->response->getResponse(), true);
        if ($result === null) {
            throw new Soa\Exception\ParseResponse($this->response->getResponse(), 501);
        }

        if (isset($result['error'])) {
            throw new Soa\Exception\ServiceError($result['error']['message'], $result['error']['code']);
        }
        
        return $result['result'];
    }
}
