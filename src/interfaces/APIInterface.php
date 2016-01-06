<?php
/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2016
 * User: jbaumann
 * File: APIInterface.php
 * Date: 05.01.2016
 * Time: 13:29
 */

namespace JRA\Interfaces;


use JRA\Factories\InternalFactory;
use JRA\FrontFactory;

interface APIInterface
{
    public function __construct(ConfigInterface $pConfig, FrontFactory $pFrontFactor, InternalFactory $pInternalFactory);

    public function login();

    public function logout();

    public function getSessions();

    public function updateProfile();

    public function updateProfileById();

    public function getAllCategories();

    public function getAllSubCategoriesByParentId();

    public function getAllContents();

    public function getAllCategoryFields();

    public function getAllContentsByCategoryId();

    public function getCategoryById();

    public function getAllContentFields();

    public function deleteContentById();

    public function getContentById();

    public function createContent();

    public function updateContentById();

    public function createArsDlId();
}