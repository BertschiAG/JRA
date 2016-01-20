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
use JRA\Commands\Methods\Content\GetContentId;
use JRA\Commands\Methods\Content\GetContentListAll;
use JRA\Commands\Methods\Content\GetContentSingleId;
use JRA\Commands\Methods\Content\PostContentCreate;
use JRA\Commands\Methods\Content\PutContentUpdateId;
use JRA\Commands\Routes\ContentRoutes;
use JRA\Exceptions\CommandException;
use JRA\Factories\InternalFactory;
use JRA\Interfaces\ConfigInterface;

class ContentCommand extends AbstractCommand
{

    /**
     * ContentCommand constructor.
     *
     * @param ConfigInterface $pConfig
     * @param InternalFactory $pInternalFactory
     */
    public function __construct(ConfigInterface $pConfig, InternalFactory $pInternalFactory)
    {
        parent::__construct($pConfig, $pInternalFactory);
    }

    /**
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
     * @throws CommandException
     */
    private function _defineMethod()
    {
        switch ($this->getMethodRoute()) {
            case ContentRoutes::GET_CATEGORY_LIST_ALL:
                $this->_setMethod(new GetCategoryListAll($this->_config, $this->_factory));
                break;
            case ContentRoutes::GET_CATEGORY_LIST_ID_CATEGORIES:
                $this->_setMethod(new GetCategoryListIdCategories($this->_config, $this->_factory));
                break;
            case ContentRoutes::GET_CONTENT_LIST_ALL:
                $this->_setMethod(new GetContentListAll($this->_config, $this->_factory));
                break;
            case ContentRoutes::GET_CATEGORY_FIELDS:
                $this->_setMethod(new GetCategoryFields($this->_config, $this->_factory));
                break;
            case ContentRoutes::GET_CATEGORY_LIST_ID_CONTENT:
                $this->_setMethod(new GetCategoryListIdContent($this->_config, $this->_factory));
                break;
            case ContentRoutes::GET_CATEGORY_SINGLE_ID:
                $this->_setMethod(new GetCategorySingleId($this->_config, $this->_factory));
                break;
            case ContentRoutes::GET_CONTENT_FIELDS:
                $this->_setMethod(new GetContentFields($this->_config, $this->_factory));
                break;
            case ContentRoutes::GET_CONTENT_ID:
                $this->_setMethod(new GetContentId($this->_config, $this->_factory));
                break;
            case ContentRoutes::GET_CONTENT_SINGLE_ID:
                $this->_setMethod(new GetContentSingleId($this->_config, $this->_factory));
                break;
            case ContentRoutes::POST_CONTENT_CREATE:
                $this->_setMethod(new PostContentCreate($this->_config, $this->_factory));
                break;
            case ContentRoutes::DELETE_CONTENT_ID:
                $this->_setMethod(new DeleteContentId($this->_config, $this->_factory));
                break;
            case ContentRoutes::PUT_CONTENT_UPDATE_ID:
                $this->_setMethod(new PutContentUpdateId($this->_config, $this->_factory));
                break;
            default:
                throw new CommandException('No correct route specified.', CommandException::COMMAND_EXCEPTION_ROUTES_ERROR);
                break;
        }
    }

    private function _defineAdditionalArguments()
    {
        $this->_getMethod()->setAdditionalArguments($this->getAdditionalArguments());
    }


    /**
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
     * @return boolean
     */
    protected function _checkArguments()
    {
        return true;
    }

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

    private
    function _processMethod()
    {
        $this->_getMethod()->process();
    }

    private
    function _storeResponse()
    {
        $this->setResponse($this->_getMethod()->getResponse());
    }
}