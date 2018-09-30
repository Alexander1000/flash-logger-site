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

        if (!$response->isError() && $response->getResponse() !== null) {
            $result = json_decode($response->getResponse(), true);
        }
    }

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
        
        return $result;
    }
}
