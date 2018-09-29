<?php declare(strict_types = 1);

namespace Controller\Site;

use Beauty;
use Beauty\Request;
use FlashLogger;

abstract class Base extends Beauty\Controller\Web
{
    /**
     * @var FlashLogger\ProjectList
     */
    protected $projectList;

    public function __construct(Request $request, FlashLogger\ProjectList $projectList)
    {
        parent::__construct($request);
        $this->projectList = $projectList;
    }

    /**
     * @return string
     */
    public function getTheme(): string
    {
        return 'site';
    }

    /**
     * @param string $template
     * @param array $context
     * @return Beauty\Http\ResponseInterface
     */
    protected function render(string $template, array $context = []): Beauty\Http\ResponseInterface
    {
        $context['projectList'] = $this->projectList;
        return parent::render($template, $context);
    }
}
