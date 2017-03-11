<?php

abstract class CoreController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        spl_autoload_extensions('.php');
        spl_autoload_register(function ($sClass) {
            $sLogicPath = APPPATH . 'logic' . DS . $sClass . '.php';

            if (file_exists($sLogicPath) === true
            && empty($sClass) !== true) {
                require_once $sLogicPath;
            }

            if (property_exists($sClass, 'oCI') === true
            && isset($sClass::$oCI) === false) {
                $sClass::$oCI = $this;
            }

            if (method_exists($sClass, 'init') === true
            && is_callable([$sClass, 'init'])) {
                $sClass::init();
            }
        });
    }

    protected function js($aScripts, $sPath)
    {
        $this->minify->add_js($aScripts, 'js' . DS . $sPath);
        $this->minify->deploy_js();

        return '/assets/js/' . $sPath . '_scripts.min.js';
    }

    protected function css($aStyles, $sPath)
    {
        $this->minify->add_css($aStyles, 'css' . DS . $sPath);
        $this->minify->deploy_css();

        return '/assets/css/' . $sPath . '_styles.min.css';
    }

    protected function isDevelopment()
    {
        if (ENVIRONMENT === 'development') {
            return true;
        }

        return false;
    }
}
