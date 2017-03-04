<?php
class Login extends CoreController
{
    public function rest($sHash = null)
    {
        $sUsername = $this->input->get('username');
        $sPassword = $this->input->get('password');
        $sMatch = $this->input->cookie('csrf', true);
        $bResult = ($sMatch === $sHash) ? true : false;
        echo json_encode([
            'bResult'  => $bResult,
            'username' => $sUsername,
            'password' => $sPassword,
            'client' => $sHash,
            'server' => $sMatch
        ]);
    }
}
