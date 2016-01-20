<?php
/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2016
 * User: jbaumann
 * File: UserCommand.php
 * Date: 18.01.2016
 * Time: 17:09
 */

namespace JRA\Commands;


use JRA\Abstracts\AbstractCommand;
use JRA\Commands\Methods\User\GetUser;
use JRA\Commands\Methods\User\GetUserLoginUsernamePassword;
use JRA\Commands\Methods\User\GetUserLogoutUserSession;
use JRA\Commands\Methods\User\GetUserSessions;
use JRA\Commands\Methods\User\PutUserProfile;
use JRA\Commands\Methods\User\PutUserProfileById;
use JRA\Commands\Methods\User\PutUserProfileId;
use JRA\Commands\Routes\UserRoutes;
use JRA\Exceptions\CommandException;
use JRA\Factories\InternalFactory;
use JRA\Interfaces\ConfigInterface;

class UserCommand extends AbstractCommand
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
        switch ($this->getRoute()) {
            case UserRoutes::GET_USER:
                $this->_setMethod(new GetUser($this->_config, $this->_factory));
                break;
            case UserRoutes::GET_USER_LOGIN_USERNAME_PASSWORD:
                $this->_setMethod(new GetUserLoginUsernamePassword($this->_config, $this->_factory));
                break;
            case UserRoutes::GET_USER_LOGOUT_USER_SESSION:
                $this->_setMethod(new GetUserLogoutUserSession($this->_config, $this->_factory));
                break;
            case UserRoutes::GET_USER_SESSIONS:
                $this->_setMethod(new GetUserSessions($this->_config, $this->_factory));
                break;
            case UserRoutes::PUT_USER_PROFILE:
                $this->_setMethod(new PutUserProfile($this->_config, $this->_factory));
                break;
            case UserRoutes::PUT_USER_PROFILE_ID:
                $this->_setMethod(new PutUserProfileId($this->_config, $this->_factory));
                break;
            default:
                throw new CommandException('No correct route specified.', CommandException::COMMAND_EXCEPTION_ROUTES_ERROR);
                break;
        }
    }

    private function _defineAdditionalArguments()
    {
        $this->_getMethod()
            ->setAdditionalArguments(
                $this->getAdditionalArguments()
            );
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