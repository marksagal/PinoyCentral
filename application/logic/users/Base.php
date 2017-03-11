<?php

namespace users;

abstract class Base extends \Base
{
    protected $oModel;
    private $sHash = 'M@rKJ4c08';

    abstract protected function response($aParams);

    public function __construct($oModel)
    {
        $this->oModel = $oModel;
    }

    public function run($aParams = array())
    {
        return $this->response($aParams);
    }

    protected function password($sPassword)
    {
        return hash('sha256', $this->sHash . $sPassword);
    }

    protected function setUser($aUser)
    {
        parent::setSession([
            'user' => array(
                'logged_time' => time(),
                'info' => $aUser
            )
        ]);
    }
}
