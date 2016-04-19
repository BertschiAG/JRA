<?php
/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2015
 * User: jbaumann
 * File: APIRoutes.php
 * Date: 24.12.2015
 * Time: 09:17
 */

namespace JRA\Config\Helper;


class APIRoutes
{
    /**
     * If the route of the latest compatible api should be used.
     */
    const API_VERSION_LATEST = APIRoutes::API_VERSION_110;

    /**
     * If the route of the api version 1.1.0 should be used.
     */
    const API_VERSION_110 = APIRoutes::API_VERSION_105;

    /**
     * If the route of the api version 1.0.5 should be used.
     */
    const API_VERSION_105 = 'api/v1/';
}