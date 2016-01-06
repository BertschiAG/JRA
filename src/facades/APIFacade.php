<?php
/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2016
 * User: jbaumann
 * File: APIFacade.php
 * Date: 05.01.2016
 * Time: 13:25
 */

namespace JRA\Facades;


use JRA\Factories\InternalFactory;
use JRA\FrontFactory;
use JRA\Interfaces\APIInterface;
use JRA\Interfaces\ConfigInterface;
use stdClass;

class APIFacade implements APIInterface
{
    private $_config;
    private $_frontFactory;
    private $_internalFactory;

    /**
     * APIFacade constructor.
     * @param ConfigInterface $pConfig
     * @param FrontFactory $pFrontFactory
     * @param InternalFactory $pInternalFactory
     */
    public function __construct(ConfigInterface $pConfig, FrontFactory $pFrontFactory, InternalFactory $pInternalFactory)
    {
        $this->_config = $pConfig;
        $this->_frontFactory = $pFrontFactory;
        $this->_internalFactory = $pInternalFactory;
    }

    /**
     * Login on the website, without depending on an authentication method
     *
     * @return bool|stdClass false on failure or json decoded response object as stdClass
     */
    public function login()
    {
        $loginChain = $this->_internalFactory
            ->getChainFactory()
            ->getLoginChain();
        return $loginChain->handle($this->_config, $this->_internalFactory);
    }

    public function logout()
    {
        // TODO: Implement logout() method.
    }

    public function getSessions()
    {
        // TODO: Implement getSessions() method.
    }

    public function updateProfile()
    {
        // TODO: Implement updateProfile() method.
    }

    public function updateProfileById()
    {
        // TODO: Implement updateProfileById() method.
    }

    public function getAllCategories()
    {
        // TODO: Implement getAllCategories() method.
    }

    public function getAllSubCategoriesByParentId()
    {
        // TODO: Implement getAllSubCategoriesByParentId() method.
    }

    public function getAllContents()
    {
        // TODO: Implement getAllContents() method.
    }

    public function getAllCategoryFields()
    {
        // TODO: Implement getAllCategoryFields() method.
    }

    public function getAllContentsByCategoryId()
    {
        // TODO: Implement getAllContentsByCategoryId() method.
    }

    public function getCategoryById()
    {
        // TODO: Implement getCategoryById() method.
    }

    public function getAllContentFields()
    {
        // TODO: Implement getAllContentFields() method.
    }

    public function deleteContentById()
    {
        // TODO: Implement deleteContentById() method.
    }

    public function getContentById()
    {
        // TODO: Implement getContentById() method.
    }

    public function createContent()
    {
        // TODO: Implement createContent() method.
    }

    public function updateContentById()
    {
        // TODO: Implement updateContentById() method.
    }

    public function createArsDlId()
    {
        // TODO: Implement createArsDlId() method.
    }
}