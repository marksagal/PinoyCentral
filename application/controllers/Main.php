<?php

class Main extends CoreController
{
    public function index()
    {
        var_dump($_SESSION);
        if (isset($_SESSION['user'])) unset($_SESSION['user']);
        echo 'This is main page';
    }
}
