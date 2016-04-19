<?php
/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2016
 * User: jbaumann
 * File: TokenCommand.php
 * Date: 18.01.2016
 * Time: 17:09
 */

namespace JRA\Commands;


use JRA\Abstracts\AbstractCommand;
use JRA\Commands\Methods\Token\GetTokenToken;
use JRA\Commands\Routes\TokenRoutes;
use JRA\Exceptions\CommandException;
use JRA\Factories\InternalFactory;
use JRA\Interfaces\ConfigInterface;

class TokenCommand extends AbstractCommand
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
            case TokenRoutes::GET_TOKEN_TOKEN:
                $method = new GetTokenToken($this->_config, $this->_factory);
                $method->setMethodRoute(TokenRoutes::GET_TOKEN_TOKEN);
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
        $this->_getMethod()
            ->setAdditionalArguments(
                $this->getAdditionalArguments()
            );
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