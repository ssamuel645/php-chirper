<?php

class Database
{
    public $connection;

    public function __construct($config)
    {
        // Decided to go with sqlite for now, will use if I change my mind
        // http_build_query($config, '', ';');

        $dsn = "{$config['db']}:{$config['dbname']}";
        $this->connection = new PDO($dsn, '', '', [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function query($query, $params = [])
    {
        $statement = $this->connection->prepare($query);
        $statement->execute($params);

        return $statement;
    }
}
