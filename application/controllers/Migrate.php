<?php
class Migrate extends CoreController
{
    public function index()
    {
        if ($this->isDevelopment() === false) {
            exit();
        }

        $this->load->library('migration');

        if ($this->migration->current() === false) {
            show_error($this->migration->error_string());
        }
    }
}
