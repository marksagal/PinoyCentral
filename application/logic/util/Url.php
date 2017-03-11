<?php

namespace util;

class Url extends \Base
{
    public static function cache()
    {
        if (parent::hasCookie('location') === true) {
            return parent::getCookie('location');
        }

        return MAIN_PAGE;
    }
}
