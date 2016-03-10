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


use JRA\Commands\Routes\ContentRoutes;
use JRA\Commands\Routes\TokenRoutes;
use JRA\Commands\Routes\UserRoutes;
use JRA\Exceptions\UserAPIException;
use JRA\Factories\InternalFactory;
use JRA\FrontFactory;
use JRA\Interfaces\ConfigInterface;
use JRA\Objects\CreateContentObject;
use JRA\Objects\Response\CategoryFieldsResponseObject;
use JRA\Objects\Response\CategoryListResponseObject;
use JRA\Objects\Response\CategoryResponseObject;
use JRA\Objects\Response\ContentDeleteResponseObject;
use JRA\Objects\Response\ContentFieldsResponseObject;
use JRA\Objects\Response\ContentListResponseObject;
use JRA\Objects\Response\ContentResponseObject;
use JRA\Objects\Response\JResponseObject;
use JRA\Objects\Response\MsgResponseObject;
use JRA\Objects\Response\SessionResponseObject;
use JRA\Objects\Response\UserLoginResponseObject;
use JRA\Objects\Response\UserLogoutResponseObject;
use JRA\Objects\UpdateContentObject;
use stdClass;

class APIFacade
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

    /**
     * Logout on the website, without depending on an authentication method
     *
     * @return bool|stdClass
     */
    public function logout()
    {
        $logoutChain = $this->_internalFactory
            ->getChainFactory()
            ->getLogoutChain();
        return $logoutChain->handle($this->_config, $this->_internalFactory);
    }

    /**
     * Get all active sessions
     *
     * @return SessionResponseObject
     */
    public function getSessions()
    {
        $userCommand = $this->_internalFactory
            ->getCommandFactory()
            ->getUserCommand($this->_config, UserRoutes::GET_USER_SESSIONS);
        $userCommand->run();
        return new SessionResponseObject($userCommand->getContents());
    }

    /**
     * Update the own user profile
     *
     * @throws UserAPIException
     */
    public function updateProfile()
    {
        throw new UserAPIException('Not supported yet!');
    }

    /**
     * Update user profile of other users by id
     *
     * @throws UserAPIException
     */
    public function updateProfileById()
    {
        throw new UserAPIException('Not supported yet!');
    }

    /**
     * Get all categories from joomla
     *
     * @return CategoryListResponseObject
     */
    public function getAllCategories()
    {
        $contentCommand = $this->_internalFactory
            ->getCommandFactory()
            ->getContentCommand($this->_config, ContentRoutes::GET_CATEGORY_LIST_ALL);
        $contentCommand->run();
        return new CategoryListResponseObject($contentCommand->getContents());
    }

    /**
     * Get all categories which are a subcategory an parent category, which is selected by id
     *
     * @param int $pId
     * @return CategoryListResponseObject
     */
    public function getAllSubCategoriesByParentId($pId)
    {
        $contentCommand = $this->_internalFactory
            ->getCommandFactory()
            ->getContentCommand($this->_config, ContentRoutes::GET_CATEGORY_LIST_ID_CATEGORIES, ['id' => $pId]);
        $contentCommand->run();
        return new CategoryListResponseObject($contentCommand->getContents());
    }

    /**
     * Get all content from joomla
     *
     * @return ContentListResponseObject
     */
    public function getAllContents()
    {
        $contentCommand = $this->_internalFactory
            ->getCommandFactory()
            ->getContentCommand($this->_config, ContentRoutes::GET_CONTENT_LIST_ALL);
        $contentCommand->run();
        return new ContentListResponseObject($contentCommand->getContents());
    }

    /**
     * Get all database fields with the field configuration from an category
     *
     * @return CategoryFieldsResponseObject
     */
    public function getAllCategoryFields()
    {
        $contentCommand = $this->_internalFactory
            ->getCommandFactory()
            ->getContentCommand($this->_config, ContentRoutes::GET_CATEGORY_FIELDS);
        $contentCommand->run();
        return new CategoryFieldsResponseObject($contentCommand->getContents());
    }

    /**
     * Get all content which is under one category by id
     *
     * @param int $pId
     * @return ContentListResponseObject
     */
    public function getAllContentsByCategoryId($pId)
    {
        $contentCommand = $this->_internalFactory
            ->getCommandFactory()
            ->getContentCommand($this->_config, ContentRoutes::GET_CATEGORY_LIST_ID_CONTENT, ['id' => $pId]);
        $contentCommand->run();
        return new ContentListResponseObject($contentCommand->getContents());
    }

    /**
     * Get an single category by id
     *
     * @param int $pId
     * @return CategoryListResponseObject
     */
    public function getCategoryById($pId)
    {
        $contentCommand = $this->_internalFactory
            ->getCommandFactory()
            ->getContentCommand($this->_config, ContentRoutes::GET_CATEGORY_SINGLE_ID, ['id' => $pId]);
        $contentCommand->run();
        return new CategoryResponseObject($contentCommand->getContents());
    }

    /**
     * Get all database fields with the field configuration from an content
     *
     * @return ContentFieldsResponseObject
     */
    public function getAllContentFields()
    {
        $contentCommand = $this->_internalFactory
            ->getCommandFactory()
            ->getContentCommand($this->_config, ContentRoutes::GET_CONTENT_FIELDS);
        $contentCommand->run();
        return new ContentFieldsResponseObject($contentCommand->getContents());
    }

    /**
     * Delete an content by id
     *
     * @param int $pId
     * @return ContentResponseObject
     */
    public function deleteContentById($pId)
    {
        $contentCommand = $this->_internalFactory
            ->getCommandFactory()
            ->getContentCommand($this->_config, ContentRoutes::GET_CONTENT_DELETE_ID, ['id' => $pId]);
        $contentCommand->run();
        return new ContentDeleteResponseObject($contentCommand->getContents());
    }

    /**
     * Get an single content by id
     *
     * @param int $pId
     * @return ContentResponseObject
     */
    public function getContentById($pId)
    {
        $contentCommand = $this->_internalFactory
            ->getCommandFactory()
            ->getContentCommand($this->_config, ContentRoutes::GET_CONTENT_SINGLE_ID, ['id' => $pId]);
        $contentCommand->run();
        return new ContentResponseObject($contentCommand->getContents());
    }

    /**
     * Create an content from an create content object
     *
     * @param CreateContentObject $pContent
     * @return MsgResponseObject
     */
    public function createContent(CreateContentObject $pContent)
    {
        $params = $pContent->getRequestParams();

        $contentCommand = $this->_internalFactory
            ->getCommandFactory()
            ->getContentCommand($this->_config, ContentRoutes::POST_CONTENT_CREATE, $params);
        $contentCommand->run();
        return new MsgResponseObject($contentCommand->getContents());
    }

    /**
     * Update an content by an update content object
     * The id for updating the right content is inside the update content object
     *
     * @param UpdateContentObject $pContent
     * @param int $pId
     * @return MsgResponseObject
     */
    public function updateContentById(UpdateContentObject $pContent, $pId)
    {
        $params = $pContent->getRequestParams();
        $params['id'] = $pId;

        $contentCommand = $this->_internalFactory
            ->getCommandFactory()
            ->getContentCommand($this->_config, ContentRoutes::PUT_CONTENT_UPDATE_ID, $params);
        $contentCommand->run();
        return new MsgResponseObject($contentCommand->getContents());
    }

    /**
     * Make an login request with an token
     *
     * @param $pToken
     * @return JResponseObject
     */
    public function loginToken($pToken)
    {
        $tokenCommand = $this->_internalFactory
            ->getCommandFactory()
            ->getTokenCommand($this->_config, TokenRoutes::GET_TOKEN_TOKEN, ['token' => $pToken]);
        $tokenCommand->run();
        return new JResponseObject($tokenCommand->getContents());
    }

    /**
     * Login with the user credentials
     *
     * @param $pUsername
     * @param $pPassword
     * @return UserLoginResponseObject
     */
    public function loginUserCredentials($pUsername, $pPassword)
    {
        $params = [
            'username' => $pUsername,
            'password' => $pPassword
        ];

        $userCommand = $this->_internalFactory
            ->getCommandFactory()
            ->getUserCommand($this->_config, UserRoutes::GET_USER_LOGIN_USERNAME_PASSWORD, $params);
        $userCommand->run();
        return new UserLoginResponseObject($userCommand->getContents());
    }

    /**
     * Logout an specified user session
     *
     * @param $pUsername
     * @param $pSession
     * @return UserLogoutResponseObject
     */
    public function logoutUserSession($pUsername, $pSession)
    {
        $params = [
            'username' => $pUsername,
            'session' => $pSession
        ];

        $userCommand = $this->_internalFactory
            ->getCommandFactory()
            ->getUserCommand($this->_config, UserRoutes::GET_USER_LOGOUT_USER_SESSION, $params);
        $userCommand->run();
        return new UserLogoutResponseObject($userCommand->getContents());
    }

    /**
     * Get the current logged in user
     *
     * @return UserLogoutResponseObject
     */
    public function getCurrentUser()
    {
        $userCommand = $this->_internalFactory
            ->getCommandFactory()
            ->getUserCommand($this->_config, UserRoutes::GET_USER);
        $userCommand->run();
        return new MsgResponseObject($userCommand->getContents());
    }
}