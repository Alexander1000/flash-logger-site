<?php declare(strict_types = 1);

namespace Controller\Site;

use Beauty\Request;
use FlashLogger;

class About extends Base
{
    /**
     * @var \DB
     */
    private $db;

    public function __construct(Request $request, FlashLogger\ProjectList $projectList, \DB $db)
    {
        parent::__construct($request, $projectList);
        $this->db = $db;
    }

    /**
     * @return \Beauty\Http\ResponseInterface
     */
    public function aboutAction()
    {
        var_dump($this->db->query('select 1')->fetch());
        return $this->render('about');
    }
}
