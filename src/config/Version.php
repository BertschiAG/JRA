<?php
/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2015
 * User: jbaumann
 * File: Version.php
 * Date: 24.12.2015
 * Time: 08:37
 */

namespace JRA\Config;


use JRA\Config\Helper\APIRoutes;
use JRA\config\helper\Versions;
use JRA\Exceptions\VersionException;

class Version
{
    private $_version;
    private $_APIRoute;

    public function __construct($pVersion)
    {
        $this->_version = $pVersion;
        $this->_validateVersion();
    }

    private function _validateVersion()
    {
        switch ($this->_version) {
            case Versions::API_VERSION_110:
                $this->_APIRoute = APIRoutes::API_VERSION_110;
                break;
            case Versions::API_VERSION_105:
                throw new VersionException('Version is not supported.', VersionException::VERSION_CONFIG_EXCEPTION_VERSION_NOT_SUPPORTED);
                break;
            default:
                throw new VersionException();
                break;
        }
    }
}