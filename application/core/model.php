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
     * @param $request
     * @return mixed
     */
    abstract protected function load($request);

    /**
     * @return mixed
     */
    abstract protected function validate();

    /**
     * @return mixed
     */
    abstract protected function save();
}
