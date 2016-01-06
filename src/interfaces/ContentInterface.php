<?php
/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2016
 * User: jbaumann
 * File: ContentInterface.php
 * Date: 05.01.2016
 * Time: 13:55
 */

namespace JRA\Interfaces;


use stdClass;

interface ContentInterface
{
    /**
     * @return stdClass
     */
    public function getCategoryList();

    /**
     * @return stdClass
     */
    public function getSubCategoriesByCategoryId();

    /**
     * @return stdClass
     */
    public function getContentList();

    /**
     * @return stdClass
     */
    public function getCategoryFields();

    /**
     * @param integer $pId
     * @return stdClass
     */
    public function getContentListByCategoryId($pId);

    /**
     * @param integer $pId
     * @return stdClass
     */
    public function getCategoryById($pId);

    /**
     * @return stdClass
     */
    public function getContentFields();

    /**
     * @param integer $pId
     * @return stdClass
     */
    public function deleteContentById($pId);

    /**
     * @param integer $pId
     * @return stdClass
     */
    public function getContentById($pId);

    /**
     * @param CreateContentObjectInterface $pCreateContentObject
     * @return stdClass
     */
    public function createContent(CreateContentObjectInterface $pCreateContentObject);

    /**
     * @param UpdateContentObjectInterface $pUpdateContentObject
     * @return stdClass
     */
    public function updateContentById(UpdateContentObjectInterface $pUpdateContentObject);
}