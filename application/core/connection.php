<?php

class Connection{                                                           //singletone connection
    /**
     * @var
     */
    protected static $_instance;
    /**
     * @var mysqli
     */
    public $db;

    /**
     * @return Connection
     */
    public static function getInstance() {
        if (self::$_instance === null) {
            self::$_instance = new self;
        }

        return self::$_instance;
    }

    /**
     * Connection constructor.
     */
    private function __construct()
    {
        $this->db = $this->getConnection();
    }

    /**
     * @return mysqli
     */
    private function getConnection()
    {
        $db = require(__DIR__ . '/../config/db.php');

        if(!$db)
        {
            die("DB Connection failed: check config");
        }

        $connection = new mysqli($db['host'], $db['username'], $db['password'], $db['dbname']);

        if ($connection->connect_error) {
            die("DB Connection failed: " . $connection->connect_error);
        }

        return $connection;
    }
}