<?php

namespace MyNameSpace\AnnualReport;

use Twig_Loader_Filesystem;
use Twig_Environment;

class Application extends \Shared\WS_Application
{
    private $charset;
    private $sessionTimeout = 3600;
    public $aisapi;

    public function __construct($requireSession = false)
    {
        parent::__construct($requireSession, $this->sessionTimeout);
        $this->charset = "utf-8";

        $this->aisapi = new AisConnector(array('environment' => $this->environment()));
    }

    public function environment()
    {
        if ($this->isDev())
        {
            return 'dev';
        }

        return 'prod';
    }
}