<?php declare(strict_types = 1);

class DB
{
    /**
     * @var PDO
     */
    private $pdo;

    public function __construct(string $host, int $port, string $dbName, string $username, string $password, array $options)
    {
        $this->pdo = new \PDO(
            sprintf('pgsql:host=%s;port=%d;dbname=%s', $host, $port, $dbName),
            $username,
            $password,
            $options
        );
    }

    /**
     * @param string $query
     * @return PDOStatement
     */
    public function query(string $query)
    {
        return $this->pdo->query($query);
    }
}
