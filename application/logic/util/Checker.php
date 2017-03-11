<?php

namespace util;

class Checker extends \Base
{
    public static function isLogged()
    {
        return parent::hasSession('user');
    }
}
