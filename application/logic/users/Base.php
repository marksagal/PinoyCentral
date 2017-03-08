<?php
namespace users;

abstract class Base
{
    protected $oModel;
    private $sHash = 'M@rKJ4c08';

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

    abstract protected function response($aParams);
}
