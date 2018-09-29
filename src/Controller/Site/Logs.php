<?php declare(strict_types = 1);

namespace Controller\Site;

use Beauty;
use FlashLogger;

class Logs extends Base
{
    /**
     * @param array $params
     * @return Beauty\Http\ResponseInterface
     */
    public function logsAction(array $params): Beauty\Http\ResponseInterface
    {
        $projectList = $this->projectList->filter(function (FlashLogger\Project $project) use ($params) {
            return $project->getName() == $params['name'];
        });
        if (!$projectList->count()) {
            return $this->render('not-found-logs');
        }

        return $this->render('logs');
    }
}
