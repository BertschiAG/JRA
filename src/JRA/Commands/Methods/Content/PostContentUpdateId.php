<?php
/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2016
 * User: jbaumann
 * File: PostContentUpdateId.php
 * Date: 18.01.2016
 * Time: 11:59
 */

namespace JRA\Commands\Methods\Content;


use JRA\Abstracts\AbstractMethod;
use JRA\Factories\InternalFactory;
use JRA\Interfaces\ConfigInterface;

class PostContentUpdateId extends AbstractMethod
{

    /**
     * PutContentUpdateId constructor.
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
     * @return boolean
     */
    protected function _checkArguments()
    {
        $urlParams = $this->getUrlParams();
        if (!empty($urlParams) && is_a($urlParams, 'UpdateContentObject')) {
            return true;
        }
        return true;
    }
}