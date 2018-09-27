<?php declare(strict_types = 1);

use Symfony\Component\DependencyInjection\ContainerBuilder;

/** @var ContainerBuilder $container */

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

$container->set(\FlashLogger\ProjectList::class, $projectCollection);
$container->register(FlashLogger\ProjectList::class, FlashLogger\ProjectList::class);
