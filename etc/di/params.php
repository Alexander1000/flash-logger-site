<?php declare(strict_types = 1);

use Symfony\Component\DependencyInjection\ContainerInterface;

/** @var ContainerInterface $container */

$projectList = yaml_parse_file(ROOT_PATH . '/etc/projects.yml');
$container->setParameter('flash-logger.projects', $projectList['projects']);
