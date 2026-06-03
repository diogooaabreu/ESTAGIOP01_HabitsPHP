<?php

namespace Core;

use PDO;

class Database
{
    public $connection; // Instância do PDO
    public $statement;  // O último comando preparado

    public function __construct($config, $username = 'root', $password = '')
    {
        // Monta a string de conexão (DSN)
        $dsn = 'mysql:' . http_build_query($config, '', ';');

        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC // Retorna arrays associativos
        ]);
    }

    public function query($query, $params = [])
    {
        // Prepara e executa a query
        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($params);

        return $this; // Permite chamar ->find() ou ->get() logo em seguida
    }

    public function find() { return $this->statement->fetch(); } // Retorna um registro
    public function get() { return $this->statement->fetchAll(); } // Retorna todos os registros
}