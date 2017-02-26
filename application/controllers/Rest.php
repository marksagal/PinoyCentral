<?php
class Rest extends CoreController
{
    public function __construct()
    {
        parent::__construct();
        header('Content-Type: application/json');
    }

    public function login()
    {
        echo json_encode($this->input->get());
    }
}
