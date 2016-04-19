<?php
/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2016
 * User: jbaumann
 * File: ContentCommand.php
 * Date: 18.01.2016
 * Time: 11:25
 */

namespace JRA\Commands;


use JRA\Abstracts\AbstractCommand;
use JRA\Commands\Methods\Content\DeleteContentId;
use JRA\Commands\Methods\Content\GetCategoryFields;
use JRA\Commands\Methods\Content\GetCategoryListAll;
use JRA\Commands\Methods\Content\GetCategoryListIdCategories;
use JRA\Commands\Methods\Content\GetCategoryListIdContent;
use JRA\Commands\Methods\Content\GetCategorySingleId;
use JRA\Commands\Methods\Content\GetContentFields;
use JRA\Commands\Methods\Content\GetContentListAll;
use JRA\Commands\Methods\Content\GetContentSingleId;
use JRA\Commands\Methods\Content\PostContentCreate;
use JRA\Commands\Methods\Content\PostContentUpdateId;
use JRA\Commands\Routes\ContentRoutes;
use JRA\Exceptions\CommandException;

class ContentCommand extends AbstractCommand
{

    /**
     * Processes the whole command
     *
     * @throws CommandException
     */
    public function process()
    {
        $this->_defineMethod();
        $this->_defineAdditionalArguments();
        $this->_checkMethodArguments();
        $this->_processAutoLogin();
        $this->_processMethod();
        $this->_storeResponse();
    }

    /**
     * Defines the current required class and registers them.
     *
     * @throws CommandException
     */
    private function _defineMethod()
    {
        switch ($this->getMethodRoute()) {
            case ContentRoutes::GET_CATEGORY_LIST_ALL:
                $method = new GetCategoryListAll($this->_config, $this->_factory);
                $method->setMethodRoute(ContentRoutes::GET_CATEGORY_LIST_ALL);
                $this->_setMethod($method);
                break;
            case ContentRoutes::GET_CATEGORY_LIST_ID_CATEGORIES:
                $method = new GetCategoryListIdCategories($this->_config, $this->_factory);
                $method->setMethodRoute(ContentRoutes::GET_CATEGORY_LIST_ID_CATEGORIES);
                $this->_setMethod($method);
                break;
            case ContentRoutes::GET_CONTENT_LIST_ALL:
                $method = new GetContentListAll($this->_config, $this->_factory);
                $method->setMethodRoute(ContentRoutes::GET_CONTENT_LIST_ALL);
                $this->_setMethod($method);
                break;
            case ContentRoutes::GET_CATEGORY_FIELDS:
                $method = new GetCategoryFields($this->_config, $this->_factory);
                $method->setMethodRoute(ContentRoutes::GET_CATEGORY_FIELDS);
                $this->_setMethod($method);
                break;
            case ContentRoutes::GET_CATEGORY_LIST_ID_CONTENT:
                $method = new GetCategoryListIdContent($this->_config, $this->_factory);
                $method->setMethodRoute(ContentRoutes::GET_CATEGORY_LIST_ID_CONTENT);
                $this->_setMethod($method);
                break;
            case ContentRoutes::GET_CATEGORY_SINGLE_ID:
                $method = new GetCategorySingleId($this->_config, $this->_factory);
                $method->setMethodRoute(ContentRoutes::GET_CATEGORY_SINGLE_ID);
                $this->_setMethod($method);
                break;
            case ContentRoutes::GET_CONTENT_FIELDS:
                $method = new GetContentFields($this->_config, $this->_factory);
                $method->setMethodRoute(ContentRoutes::GET_CONTENT_FIELDS);
                $this->_setMethod($method);
                break;
            case ContentRoutes::GET_CONTENT_SINGLE_ID:
                $method = new GetContentSingleId($this->_config, $this->_factory);
                $method->setMethodRoute(ContentRoutes::GET_CONTENT_SINGLE_ID);
                $this->_setMethod($method);
                break;
            case ContentRoutes::POST_CONTENT_CREATE:
                $method = new PostContentCreate($this->_config, $this->_factory);
                $method->setMethodRoute(ContentRoutes::POST_CONTENT_CREATE);
                $this->_setMethod($method);
                break;
            case ContentRoutes::DELETE_CONTENT_ID:
                $method = new DeleteContentId($this->_config, $this->_factory);
                $method->setMethodRoute(ContentRoutes::DELETE_CONTENT_ID);
                $this->_setMethod($method);
                break;
            case ContentRoutes::POST_CONTENT_UPDATE_ID:
                $method = new PostContentUpdateId($this->_config, $this->_factory);
                $method->setMethodRoute(ContentRoutes::POST_CONTENT_UPDATE_ID);
                $this->_setMethod($method);
                break;
            default:
                throw new CommandException('No correct route specified.', CommandException::COMMAND_EXCEPTION_ROUTES_ERROR);
                break;
        }
    }

    /**
     * Set the additional arguments, which are given for the current request.
     */
    private function _defineAdditionalArguments()
    {
        $this->_getMethod()->setAdditionalArguments($this->getAdditionalArguments());
    }


    /**
     * Checks if all required arguments are given.
     *
     * @return bool
     * @throws CommandException
     */
    protected function _checkMethodArguments()
    {
        if ($this->_getMethod()->checkArguments()) {
            return true;
        } else {
            throw new CommandException('Invalid additional arguments.', CommandException::COMMAND_EXCEPTION_ADDITIONAL_ARGUMENTS_ERROR);
        }
    }

    /**
     * The methods need to check addition arguments by itself.
     *
     * @return boolean
     */
    protected function _checkArguments()
    {
        return true;
    }

    /**
     * If the login should be process automatically, this will execute the necessary functions.
     */
    private function _processAutoLogin()
    {
        $globalAutoLogin = $this->_config->isAutoLoginOn();
        $methodSpecifiedAutoLogin = $this->_getMethod()->isAutoLogin();

        if ($globalAutoLogin && $methodSpecifiedAutoLogin) {
            $this->_factory
                ->getChainFactory()
                ->getLoginChain()
                ->handle($this->_config, $this->_factory);
        }
    }

    /**
     * Executes the process method of the given method.
     */
    private function _processMethod()
    {
        $this->_getMethod()->process();
    }

    /**
     * Stored the response of the method.
     */
    private function _storeResponse()
    {
        $this->setResponse($this->_getMethod()->getResponse());
    }
}