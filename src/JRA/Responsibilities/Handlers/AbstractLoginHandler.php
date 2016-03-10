<?php
/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2016
 * User: jbaumann
 * File: AbstractLoginHandler.php
 * Date: 06.01.2016
 * Time: 10:30
 */

namespace JRA\Responsibilities\Handlers;


use JRA\Factories\InternalFactory;
use JRA\Interfaces\ConfigInterface;
use stdClass;

abstract class AbstractLoginHandler
{

    /**
     * @var AbstractLoginHandler
     */
    private $_successor = null;

    /**
     * @param AbstractLoginHandler $pHandler
     */
    final public function append(AbstractLoginHandler $pHandler)
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