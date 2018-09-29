<?php declare(strict_types = 1);

namespace FlashLogger;

class ProjectList implements \Iterator, \Countable
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
    public function current(): Project
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
    public function valid(): bool
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

    /**
     * @return int
     */
    public function count(): int
    {
        return count($this->list);
    }

    /**
     * @param callable $callback
     * @return static
     */
    public function filter(callable $callback)
    {
        $list = new static();
        $items = array_filter($this->list, $callback);
        foreach ($items as $item) {
            $list->add($item);
        }
        return $list;
    }
}
