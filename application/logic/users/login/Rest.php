<?php

namespace users\login;

use util\Url;

class Rest extends \users\Base
{
    public function __construct($oModel)
    {
        parent::__construct($oModel);
    }

    protected function response($aParams)
    {
        $aTokens = $aParams['tokens'];
        $sUsername = $aParams['username'];
        $sPassword = $aParams['password'];

        $mToken = $this->_checkTokens($aTokens);

        if ($mToken !== true) {
            return $mToken;
        }

        $aUser = $this->_checkUser($sUsername, $sPassword);

        if ($aUser['bResult'] !== true) {
            return $aUser;
        }

        $this->setUser($aUser['aInfo']);

        return array(
            'bResult' => true,
            'location' => Url::cache()
        );
    }

    private function _checkUser($sUsername, $sPassword)
    {
        $sPassword = $this->password($sPassword);
        $aUser = current($this->oModel->userInfo($sUsername));

        if ($aUser === false) {
            return array(
                'bResult' => false,
                'sMessage' => 'Invalid Username'
            );
        }

        if ($aUser['password'] !== $sPassword) {
            return array(
                'bResult' => false,
                'sMessage' => 'Invalid Password'
            );
        }

        unset($aUser['password']);

        return array(
            'bResult' => true,
            'aInfo' => $aUser
        );
    }

    private function _checkTokens($aTokens)
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
