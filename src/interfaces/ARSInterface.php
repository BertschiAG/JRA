<?php
/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2016
 * User: jbaumann
 * File: ARSInterface.php
 * Date: 05.01.2016
 * Time: 13:54
 */

namespace JRA\Interfaces;


use stdClass;

interface ARSInterface
{
    /**
     * @param string $pDownloadId
     * @return stdClass
     */
    public function updateArsDlId($pDownloadId);
}