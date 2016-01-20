<?php
/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2016
 * User: jbaumann
 * File: CategoryListResponseObject.php
 * Date: 20.01.2016
 * Time: 16:40
 */

namespace JRA\Objects;


class CategoryListResponseObject
{

    /**
     * @var CategoryListObject[]
     */
    private $_categories;

    /**
     * @var string
     */
    private $_error;

    /**
     * @var string
     */
    private $_status;

    /**
     * CategoryListResponseObject constructor.
     *
     * @param string $pResponse
     */
    public function __construct($pResponse)
    {
        $object = json_decode($pResponse);
        foreach ($object->msg as $pValue) {
            $this->_categories[] = new CategoryListObject($pValue);
        }
        $this->_error = $object->error;
        $this->_status = $object->status;
    }
}