<?php
/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2016
 * User: jbaumann
 * File: CategoryFieldsResponseObject.php
 * Date: 13.01.2016
 * Time: 11:10
 */

namespace JRA\Objects;


use JRA\Abstracts\AbstractResponseObject;

class CategoryFieldsResponseObject extends AbstractResponseObject
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