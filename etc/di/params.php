<?php declare(strict_types = 1);

$projectList = yaml_parse_file(ROOT_PATH . '/etc/projects.yml');
$projectCollection = new \FlashLogger\ProjectList();
foreach ($projectList['projects'] as $project) {
    $projectCollection->add(
        new \FlashLogger\Project(
            $project['id'],
            $project['name'],
            $project['title'],
            $project['token']
        )
    );
}

$container->setParameter('flash-logger.projects', $projectCollection);
