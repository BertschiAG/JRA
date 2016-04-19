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

    /**
     * The version of cAPI which is used.
     *
     * @var int
     */
    private $_version;

    /**
     * The api route for the specified version.
     *
     * @var string
     */
    private $_APIRoute;

    /**
     * Version constructor.
     *
     * @param int $pVersion The cAPI version which is used.
     */
    public function __construct($pVersion)
    {
        $this->_version = $pVersion;
        $this->_validateVersion();
    }

    /**
     * Validates if the version is supported and if a valid version number is given.
     *
     * @throws VersionException Throws an exception if something went wrong with version defining.
     */
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