<?php
/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2016
 * User: jbaumann
 * File: CAPIResponseObject.php
 * Date: 12.01.2016
 * Time: 09:46
 */

namespace JRA\Objects;


use JRA\Abstracts\AbstractResponseObject;

class CAPIResponseObject extends AbstractResponseObject
{

    /**
     * Class specified parsing
     *
     * @return boolean
     */
    protected function _parse()
    {

        return true;
    }
}