<?php
/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2015
 * User: jbaumann
 * File: Versions.php
 * Date: 24.12.2015
 * Time: 08:38
 */

namespace JRA\Config\Helper;


class Versions
{
    /**
     * If the latest compatible api version should be used.
     */
    const API_VERSION_LATEST = Versions::API_VERSION_110;

    /**
     * If the api version 1.1.0 should be used.
     */
    const API_VERSION_110 = 110;

    /**
     * If the api version 1.0.5 should be used.
     */
    const API_VERSION_105 = 105;
}