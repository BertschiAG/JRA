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
     * The successor of the current object.
     *
     * @var AbstractLogoutHandler
     */
    private $_successor = null;

    /**
     * Appends an new successor, which will be added to the end ob the chain.
     *
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
     * Starts processing the current object and start handling the next if the current one failed.
     *
     * @param ConfigInterface $pConfig The configuration which is used to make the requests.
     * @param InternalFactory $pInternalFactory The factory which is responsible for the internal object creation.
     * @return bool|stdClass Return false on failure, otherwise it will return a stdClass object which contains the response of the request.
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
     * Each chain needs to fill this function with it's own actions.
     * This function contains the functionality of each chain.
     *
     * @param ConfigInterface $pConfig The configuration which is used to make the request.
     * @param InternalFactory $pInternalFactory The factory which is responsible for the internal object creation.
     * @return bool|stdClass true if the request has been processed, false otherwise
     */
    abstract protected function process(ConfigInterface $pConfig, InternalFactory $pInternalFactory);
}