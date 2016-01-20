<?php
/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2016
 * User: jbaumann
 * File: PostContentCreate.php
 * Date: 18.01.2016
 * Time: 11:58
 */

namespace JRA\Commands\Methods\Content;


use JRA\Abstracts\AbstractMethod;
use JRA\Factories\InternalFactory;
use JRA\Interfaces\ConfigInterface;

class PostContentCreate extends AbstractMethod
{

    /**
     * PostContentCreate constructor.
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
        if (!empty($urlParams) && is_a($urlParams, 'CreateContentObject')) {
            return true;
        }
        return false;
    }
}