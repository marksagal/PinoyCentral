<?php

abstract class Base
{
    /**
     * CodeIgniter Instance
     * @var object
     */
    public static $oCI;

    final public static function init()
    {
        // ..
    }

    final protected static function setSession($mData, $mValue = null)
    {
        if (isset($mData) === false) {
            return false;
        }

        self::$oCI->session->set_userdata($mData, $mValue);
    }

    final protected static function unsetSession($mData)
    {
        if (isset($mData) === false) {
            return false;
        }

        self::$oCI->session->unset_userdata($mData);
    }

    final protected static function getSession($mData = null)
    {
        return self::$oCI->session->userdata($mData);
    }

    final protected static function hasSession($sKey)
    {
        return self::$oCI->session->has_userdata($sKey);
    }

    final protected static function destroySession()
    {
        self::$oCI->session->sess_destroy();
    }

    final protected static function setCookie($aCookie, $iExpiration = 0)
    {
        if (is_array($aCookie)) {
            foreach ($aCookie as $sKey => $sValue) {
                setcookie($sKey, $sValue, $iExpiration);
            }

            return $aCookie;
        }

        return false;
    }

    final protected static function getCookie($sKey = null)
    {
        if (empty($sKey) === true) {
            return $_COOKIE;
        }

        if (isset($_COOKIE[$sKey]) === true) {
            return $_COOKIE[$sKey];
        }

        return null;
    }

    final protected static function hasCookie($sKey)
    {
        return isset($_COOKIE[$sKey]);
    }

    final protected static function unsetCookie($sKey)
    {
        setcookie($sKey, '', time() - 28800);
    }

    final protected static function destroyCookie()
    {
        if (is_array($_COOKIE) === true) {
            foreach ($_COOKIE as $sKey => $sValue) {
                setcookie($sKey, '', time() - 28800);
            }

            return true;
        }

        return false;
    }
}
