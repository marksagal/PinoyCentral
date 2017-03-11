<?php

use util\Checker;
use util\Url;

class Home extends CoreController
{
    public function index()
    {
        if (Checker::isLogged() === true) {
            header('Location: ' . Url::cache());
        }

        $this->blade->view('home/index', [
            'css' => $this->css(['home/nav.css'], 'home/index'),
            'js' => $this->js(['ajax.js', 'home/login.js'], 'home/login'),
            'csrf_name' => $this->security->get_csrf_token_name(),
            'csrf_token' => $this->security->get_csrf_hash()
        ]);
    }
}
