<?php declare(strict_types = 1);

namespace Controller\Site;

use Beauty;

class Logs extends Base
{
    /**
     * @return Beauty\Http\ResponseInterface
     */
    public function logsAction(): Beauty\Http\ResponseInterface
    {
        return $this->render('logs');
    }
}
