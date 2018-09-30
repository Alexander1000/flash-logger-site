<?php declare(strict_types = 1);

namespace Controller\Site;

use Beauty;
use Beauty\Request;
use FlashLogger;
use Clients;

class Logs extends Base
{
    /**
     * @var Clients\FlashLogger\Client
     */
    protected $flashLoggerClient;

    public function __construct(
        Request $request,
        FlashLogger\ProjectList $projectList,
        Clients\FlashLogger\Client $flashLoggerClient
    ) {
        parent::__construct($request, $projectList);
        $this->flashLoggerClient = $flashLoggerClient;
    }

    /**
     * @param array $params
     * @return Beauty\Http\ResponseInterface
     */
    public function logsAction(array $params): Beauty\Http\ResponseInterface
    {
        $projectList = $this->projectList->filter(function (FlashLogger\Project $project) use ($params) {
            return $project->getName() == $params['params']['name'];
        });
        if (!$projectList->count()) {
            return $this->render('not-found-logs');
        }
        $project = $projectList->current();

        // @todo переделать на форму валидации
        $request = new Clients\FlashLogger\Request\Logs(
            (int) $this->request->getParam('limit', 0),
            (int) $this->request->getParam('offset', 20),
            $project->getToken()
        );

        $response = $this->flashLoggerClient->logs($request);

        return $this->render(
            'logs',
            [
                'project' => $project,
            ]
        );
    }
}
