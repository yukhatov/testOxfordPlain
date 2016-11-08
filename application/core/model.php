<?php

/**
 * Class Model
 */
abstract class Model
{
    /**
     * @var mysqli
     */
    public $db;

    /**
     * Model constructor.
     */
    function __construct()
	{
        $connection = Connection::getInstance();
		$this->db = $connection->db;
	}

    /**
     * @param $params
     */
    public function get_data($params)
	{
		// todo
	}
}
