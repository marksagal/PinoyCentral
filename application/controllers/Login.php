<?php

use users\login\Rest;

class Login extends CoreController
{
    public function rest($sClient = null)
    {
        $sUsername = $this->input->get('username');
        $sPassword = $this->input->get('password');
        $sToken = $this->input->cookie('token', true);
        $this->load->model('Users');
        $oRest = new Rest($this->Users);
        $mResponse = $oRest->run([
            'username' => $this->input->get('username'),
            'password' => $this->input->get('password'),
            'tokens' => array(
                'server' => $sToken,
                'client' => $sClient
            )
        ]);

        echo json_encode($mResponse);
    }
}
