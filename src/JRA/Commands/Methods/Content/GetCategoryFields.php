<?php
/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2016
 * User: jbaumann
 * File: GetCategoryFields.php
 * Date: 18.01.2016
 * Time: 11:57
 */

namespace JRA\Commands\Methods\Content;


use JRA\Abstracts\AbstractMethod;
use JRA\Factories\InternalFactory;
use JRA\Interfaces\ConfigInterface;

class GetCategoryFields extends AbstractMethod
{

    /**
     * GetCategoryFields constructor.
     *
     * @param ConfigInterface $pConfig
     * @param InternalFactory $pInternalFactory
     */
    public function __construct(ConfigInterface $pConfig, InternalFactory $pInternalFactory)
    {
        $this->setAutoLogin(true);
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