<?php
/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2016
 * User: jbaumann
 * File: GetTokenToken.php
 * Date: 18.01.2016
 * Time: 12:06
 */

namespace JRA\Commands\Methods\Token;


use JRA\Abstracts\AbstractMethod;
use JRA\Factories\InternalFactory;
use JRA\Interfaces\ConfigInterface;

class GetTokenToken extends AbstractMethod
{

    /**
     * GetTokenToken constructor.
     *
     * @param ConfigInterface $pConfig
     * @param InternalFactory $pInternalFactory
     */
    public function __construct(ConfigInterface $pConfig, InternalFactory $pInternalFactory)
    {
        $this->setAutoLogin(false);
        parent::__construct($pConfig, $pInternalFactory);
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
}