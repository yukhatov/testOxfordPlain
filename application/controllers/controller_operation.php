<?php


class Controller_Operation extends Controller
{

    function __construct()
	{
	    parent::__construct();
		$this->model = new Model_Operation();
	}

    function action_index()
	{
	    if($_POST)
        {
            $modelOperation = new Model_Operation();

            if($modelOperation->load($_POST) and $modelOperation->validate())
            {
                if($modelOperation->save()){
                    header('Content-Type: application/json');

                    echo json_encode(array(
                        'result' => $modelOperation->getFirstNumber() + $modelOperation->getSecondNumber()
                    ));

                    return;
                }else{
                    header('Content-Type: application/json');

                    echo json_encode(array(
                        'result' => 'error'
                    ));

                    return;
                }
            }
        }

		$this->view->generate('operation_view.php', 'template_view.php');
	}
}
