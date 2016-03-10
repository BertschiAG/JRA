<?php
/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2016
 * User: jbaumann
 * File: AbstractLogoutHandler.php
 * Date: 27.01.2016
 * Time: 14:33
 */

namespace JRA\Responsibilities\Handlers;


use JRA\Factories\InternalFactory;
use JRA\Interfaces\ConfigInterface;
use stdClass;

abstract class AbstractLogoutHandler
{

    /**
     * @var AbstractLogoutHandler
     */
    private $_successor = null;

    /**
     * @param AbstractLogoutHandler $pHandler
     */
    final public function append(AbstractLogoutHandler $pHandler)
    {
        if (is_null($this->_successor)) {
            $this->_successor = $pHandler;
        } else {
            $this->_successor->append($pHandler);
        }
    }

    /**
     * @param ConfigInterface $pConfig
     * @param InternalFactory $pInternalFactory
     * @return bool|stdClass
     */
    final public function handle(ConfigInterface $pConfig, InternalFactory $pInternalFactory)
    {
        $processed = $this->process($pConfig, $pInternalFactory);
        if (!$processed) {
            if (!is_null($this->_successor)) {
                $processed = $this->_successor->handle($pConfig, $pInternalFactory);
            }
        }
        return $processed;
    }

    /**
     * @param ConfigInterface $pConfig
     * @param InternalFactory $pInternalFactory
     * @return bool|stdClass true if the request has been processed, false otherwise
     */
    abstract protected function process(ConfigInterface $pConfig, InternalFactory $pInternalFactory);
}