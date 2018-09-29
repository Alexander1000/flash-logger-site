<?php declare(strict_types = 1);

namespace Controller\Site;

use Beauty;

class Site extends Base
{
    /**
     * @return Beauty\Http\ResponseInterface
     */
    public function indexAction(): Beauty\Http\ResponseInterface
    {
        return $this->render('index');
    }
}
