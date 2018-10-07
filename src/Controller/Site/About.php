<?php declare(strict_types = 1);

namespace Controller\Site;

class About extends Base
{
    /**
     * @return \Beauty\Http\ResponseInterface
     */
    public function aboutAction()
    {
        return $this->render('about');
    }
}
