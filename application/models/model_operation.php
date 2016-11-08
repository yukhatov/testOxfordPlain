<?php

/**
 * Class Model_Feedback
 */
class Model_Operation extends Model
{
    private $firstNumber;
    private $secondNumber;

    /**
     * Model_Operation constructor.
     */
    function __construct()
	{
		parent::__construct();
	}
    /**
     * @return mixed
     */
    public function getFirstNumber()
    {
        return $this->firstNumber;
    }

    /**
     * @param mixed $firstNumber
     */
    public function setFirstNumber($firstNumber)
    {
        $this->firstNumber = $firstNumber;
    }

    /**
     * @return mixed
     */
    public function getSecondNumber()
    {
        return $this->secondNumber;
    }

    /**
     * @param mixed $secondNumber
     */
    public function setSecondNumber($secondNumber)
    {
        $this->secondNumber = $secondNumber;
    }

	public function load($request)
    {
        if(isset($request['firstNumber']) and isset($request['secondNumber']))
        {
            $firstNumber = $this->db->real_escape_string($request['firstNumber']);
            $secondNumber = $this->db->real_escape_string($request['secondNumber']);

            $this->setFirstNumber($firstNumber);
            $this->setSecondNumber($secondNumber);

            return true;
        }

        return false;
    }

    public function validate(){
        $regex = '/^[0-9]{3,15}$/';

        if (preg_match($regex, $this->getFirstNumber()) and preg_match($regex, $this->getSecondNumber())) {
            return true;
        }

        return false;
    }

    public function save(){
        $sql = "INSERT INTO operation (firstNumber, secondNumber)
				VALUES ('" . $this->getFirstNumber() . "','" . $this->getSecondNumber() ."')";

        $result = $this->db->query($sql);
        $this->db->close();

        if($result)
        {
            return true;
        }

        return false;
    }
}
