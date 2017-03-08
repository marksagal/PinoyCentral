<?php
namespace users\login;

class Rest extends \users\Base
{
    public function __construct($oModel)
    {
        parent::__construct($oModel);
    }

    protected function response($aParams)
    {
        $mToken = $this->checkTokens($aParams['tokens']);
        if ($mToken !== true) {
            return $mToken;
        }

        return $this->checkUser($aParams['username'], $aParams['password']);
    }

    private function checkUser($sUsername, $sPassword)
    {
        $sPassword = $this->password($sPassword);
        $aResult = $this->oModel->userInfo($sUsername);

        if (empty($aResult) === true) {
            return array(
                'bResult' => false,
                'sMessage' => 'Invalid Username'
            );
        }

        if (current($aResult)['password'] !== $sPassword) {
            return array(
                'bResult' => false,
                'sMessage' => 'Invalid Password'
            );
        }

        return true;
    }

    private function checkTokens($aTokens)
    {
        if ($aTokens['server'] !== $aTokens['client']) {
            return array(
                'bResult' => false,
                'sMessage' => 'Invalid Tokens'
            );
        }

        return true;
    }
}
