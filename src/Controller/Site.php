<?php declare(strict_types = 1);

namespace Controller;

use Beauty;
use Beauty\Request;
use FlashLogger;

class Site extends Beauty\Controller\Web
{
    /**
     * @var FlashLogger\ProjectList
     */
    private $projectList;

    public function __construct(Request $request, FlashLogger\ProjectList $projectList)
    {
        parent::__construct($request);
        $this->projectList = $projectList;
    }

    /**
     * @return Beauty\Http\ResponseInterface
     */
    public function indexAction(): Beauty\Http\ResponseInterface
    {
        return $this->render(
            'index',
            [
                'projectList' => $this->projectList,
            ]
        );
    }

    /**
     * @return string
     */
    public function getTheme(): string
    {
        return 'site';
    }
}
