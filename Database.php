<?php

namespace database;

use PDO;
use PDOException;

class Database
{

    public $connection;

    /** @var \PDOStatement $statement */
    public $statement;


    public function __construct($config, $username = 'root', $password = 'root')
    {
        $dsn = 'mysql:' . http_build_query($config['database'], '', ';');

        try {
            $this->connection = new PDO($dsn, $username, $password);
        } catch (PDOException $error) {
            echo 'Connection failed: ' . $error->getMessage();
        }
    }


    public function query($query, $params = [])
    {
        $statement = $this->connection->prepare($query);

        $statement->execute($params);

        $this->statement = $statement;

        return $this;
    }


    public function get()
    {
        return $this->statement->fetchAll(PDO::FETCH_ASSOC);
    }


    public function findOrFail()
    {
        $result = $this->statement->fetch(PDO::FETCH_ASSOC);

        if (!$result) {
            abort(403);
        }

        return $result;
    }
}
