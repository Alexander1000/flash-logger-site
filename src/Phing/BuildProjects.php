<?php declare(strict_types = 1);

namespace Phing;

class BuildProjects extends \Task
{
    protected $projectPath;

    protected $cacheDir;

    protected $rootDir;

    public function main()
    {
        $path = $this->rootDir . DIRECTORY_SEPARATOR . $this->projectPath;
        $projects = yaml_parse_file($path);
        if (!$projects) {
            throw new \InvalidArgumentException();
        }

        $fileName = basename($path);
        $fileName = substr($fileName, 0, -3);

        file_put_contents(
            $this->rootDir . DIRECTORY_SEPARATOR . $this->cacheDir . DIRECTORY_SEPARATOR . $fileName . 'php',
            sprintf(
                "<?php\nreturn %s;",
                var_export($projects, true)
            )
        );
    }

    public function setCache(string $cache)
    {
        $this->cacheDir = $cache;
    }

    public function setProjects(string $projects)
    {
        $this->projectPath = $projects;
    }

    public function setRoot(string $rootPath)
    {
        $this->rootDir = $rootPath;
    }
}
