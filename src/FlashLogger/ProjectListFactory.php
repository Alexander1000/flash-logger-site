<?php declare(strict_types = 1);

namespace FlashLogger;

class ProjectListFactory
{
    /**
     * @param array $projects
     * @return ProjectList
     */
    public static function make(array $projects): ProjectList
    {
        $projectCollection = new ProjectList();
        foreach ($projects as $project) {
            $projectCollection->add(
                new Project(
                    $project['id'],
                    $project['name'],
                    $project['title'],
                    $project['token']
                )
            );
        }

        return $projectCollection;
    }
}
