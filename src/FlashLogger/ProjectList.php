<?php declare(strict_types = 1);

namespace FlashLogger;

class ProjectList implements \Iterator
{
    /**
     * @var Project[]
     */
    protected $list;

    /**
     * @param Project $project
     * @return $this
     */
    public function add(Project $project)
    {
        $this->list[$project->getId()] = $project;
        return $this;
    }

    /**
     * @param int $projectId
     * @return Project
     */
    public function get(int $projectId): Project
    {
        return $this->list[$projectId];
    }

    /**
     * @param int $projectId
     * @return bool
     */
    public function has(int $projectId): bool
    {
        return isset($this->list[$projectId]);
    }

    /**
     * {@inheritdoc}
     * @return Project
     */
    public function current()
    {
        return current($this->list);
    }

    /**
     * {@inheritdoc}
     */
    public function next()
    {
        next($this->list);
    }

    /**
     * {@inheritdoc}
     */
    public function key()
    {
        return key($this->list);
    }

    /**
     * {@inheritdoc}
     */
    public function valid()
    {
        return $this->key() !== null;
    }

    /**
     * {@inheritdoc}
     */
    public function rewind()
    {
        reset($this->list);
    }
}
