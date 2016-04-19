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

    /**
     * The configuration for the requests.
     *
     * @var ConfigInterface
     */
    private $_config;

    /**
     * The internal factory for all internal object creations.
     *
     * @var InternalFactory
     */
    private $_internalFactory;

    /**
     * APIFacade constructor.
     *
     * @param ConfigInterface $pConfig The configuration of the request.
     * @param InternalFactory $pInternalFactory The factory which is used internal for creating objects.
     */
    public function __construct(ConfigInterface $pConfig, InternalFactory $pInternalFactory)
    {
        $this->_config = $pConfig;
        $this->_internalFactory = $pInternalFactory;
    }

    /**
     * Login on the website, without depending on an authentication method.
     *
     * @return bool|stdClass Returns false on failure or json decoded response object as stdClass.
     */
    public function login()
    {
        $loginChain = $this->_internalFactory
            ->getChainFactory()
            ->getLoginChain();
        return $loginChain->handle($this->_config, $this->_internalFactory);
    }

    /**
     * Logout on the website, without depending on an authentication method.
     *
     * @return bool|stdClass Returns false on failure or json decoded response object as stdClass.
     */
    public function logout()
    {
        $logoutChain = $this->_internalFactory
            ->getChainFactory()
            ->getLogoutChain();
        return $logoutChain->handle($this->_config, $this->_internalFactory);
    }

    /**
     * Get all active sessions.
     *
     * @return SessionResponseObject Returns the response in an functionality providing object.
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
     * Update the own user profile.
     *
     * @throws UserAPIException This functionality is not supported yet.
     */
    public function updateProfile()
    {
        throw new UserAPIException('Not supported yet!');
    }

    /**
     * Update user profile of other users by id.
     *
     * @throws UserAPIException This functionality is not supported yet.
     */
    public function updateProfileById()
    {
        throw new UserAPIException('Not supported yet!');
    }

    /**
     * Get all categories from joomla.
     *
     * @return CategoryListResponseObject Returns the response in an functionality providing object.
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
     * Get all categories which are a subcategory an parent category, which is selected by id.
     *
     * @param int $pId The parent id if for selecting all child categories.
     * @return CategoryListResponseObject Returns the response in an functionality providing object.
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
     * Get all content from joomla.
     *
     * @return ContentListResponseObject Returns the response in an functionality providing object.
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
     * Get all database fields with the field configuration from an category.
     *
     * @return CategoryFieldsResponseObject Returns the response in an functionality providing object.
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
     * Get all content which is under one category by id.
     *
     * @param int $pId The category id for selecting all contents under this category.
     * @return ContentListResponseObject Returns the response in an functionality providing object.
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
     * Get an single category by id.
     *
     * @param int $pId The category id to select this record.
     * @return CategoryListResponseObject Returns the response in an functionality providing object.
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
     * Get all database fields with the field configuration from an content.
     *
     * @return ContentFieldsResponseObject Returns the response in an functionality providing object.
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
     * Delete an content by id.
     *
     * @param int $pId The content id to delete this record.
     * @return ContentResponseObject Returns the response in an functionality providing object.
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
     * Get an single content by id.
     *
     * @param int $pId The content id to select this record.
     * @return ContentResponseObject Returns the response in an functionality providing object.
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
     * Create an content from an create content object.
     *
     * @param CreateContentObject $pContent The object with all information in it to create a content.
     * @return MsgResponseObject Returns the response in an functionality providing object.
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
     * Update an content by an update content object.
     * The id for updating the right content is inside the update content object.
     *
     * @param UpdateContentObject $pContent The object with all information in it to update a content.
     * @param int $pId The content id of the content which should be updated.
     * @return MsgResponseObject Returns the response in an functionality providing object.
     */
    public function updateContentById(UpdateContentObject $pContent, $pId)
    {
        $params = $pContent->getRequestParams();
        $params['id'] = $pId;

        $contentCommand = $this->_internalFactory
            ->getCommandFactory()
            ->getContentCommand($this->_config, ContentRoutes::POST_CONTENT_UPDATE_ID, $params);
        $contentCommand->run();
        return new MsgResponseObject($contentCommand->getContents());
    }

    /**
     * Make an login request with an token.
     *
     * @param string $pToken The token for login at the cAPI.
     * @return JResponseObject Returns the response in an functionality providing object.
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
     * Login with the user credentials.
     *
     * @param string $pUsername The username which is used to login at the cAPI.
     * @param string $pPassword The password which is used to login at the cAPI.
     * @return UserLoginResponseObject Returns the response in an functionality providing object.
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
     * Logout an specified user session.
     *
     * @param string $pUsername The username which is used to get the correct session.
     * @param string $pSession The password which is used to get the correct session.
     * @return UserLogoutResponseObject Returns the response in an functionality providing object.
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
     * Get the current logged in user.
     *
     * @return UserLogoutResponseObject Returns the response in an functionality providing object.
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