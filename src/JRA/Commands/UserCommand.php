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
use JRA\Commands\Methods\User\PutUserProfileId;
use JRA\Commands\Routes\UserRoutes;
use JRA\Exceptions\CommandException;

class UserCommand extends AbstractCommand
{

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
            case UserRoutes::GET_USER:
                $method = new GetUser($this->_config, $this->_factory);
                $method->setMethodRoute(UserRoutes::GET_USER);
                $this->_setMethod($method);
                break;
            case UserRoutes::GET_USER_LOGIN_USERNAME_PASSWORD:
                $method = new GetUserLoginUsernamePassword($this->_config, $this->_factory);
                $method->setMethodRoute(UserRoutes::GET_USER_LOGIN_USERNAME_PASSWORD);
                $this->_setMethod($method);
                break;
            case UserRoutes::GET_USER_LOGOUT_USER_SESSION:
                $method = new GetUserLogoutUserSession($this->_config, $this->_factory);
                $method->setMethodRoute(UserRoutes::GET_USER_LOGOUT_USER_SESSION);
                $this->_setMethod($method);
                break;
            case UserRoutes::GET_USER_SESSIONS:
                $method = new GetUserSessions($this->_config, $this->_factory);
                $method->setMethodRoute(UserRoutes::GET_USER_SESSIONS);
                $this->_setMethod($method);
                break;
            case UserRoutes::PUT_USER_PROFILE:
                $method = new PutUserProfile($this->_config, $this->_factory);
                $method->setMethodRoute(UserRoutes::PUT_USER_PROFILE);
                $this->_setMethod($method);
                break;
            case UserRoutes::PUT_USER_PROFILE_ID:
                $method = new PutUserProfileId($this->_config, $this->_factory);
                $method->setMethodRoute(UserRoutes::PUT_USER_PROFILE_ID);
                $this->_setMethod($method);
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

    private function _processMethod()
    {
        $this->_getMethod()->process();
    }

    private function _storeResponse()
    {
        $this->setResponse($this->_getMethod()->getResponse());
    }
}