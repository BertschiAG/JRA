<?php
/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2016
 * User: jbaumann
 * File: CategoryListResponseObject.php
 * Date: 20.01.2016
 * Time: 16:40
 */

namespace JRA\Objects\Response;


use JRA\Objects\Response\Data\CategoryObject;

class CategoryListResponseObject
{

    /**
     * @var CategoryObject[]
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
        foreach ($object->categories as $pValue) {
            $this->_categories[] = new CategoryObject($pValue);
        }
        $this->_error = $object->error;
        $this->_status = $object->status;
    }

    /**
     * @return CategoryObject[]
     */
    public function getCategories()
    {
        return $this->_categories;
    }

    /**
     * @return string
     */
    public function getError()
    {
        return $this->_error;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->_status;
    }
}