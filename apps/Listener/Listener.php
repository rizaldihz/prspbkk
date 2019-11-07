<?php

namespace MyApp\Listeners;

use Phalcon\Logger;
use Phalcon\Config;
use Phalcon\Db\AdapterInterface;
use Phalcon\Di\Injectable;
use Phalcon\Events\Event;

/**
 * Class QueryListener
 *
 * @property Config $config
 * @property Logger $logger
 */
class Listener extends Injectable
{
    public function beforeQuery (Event $event, $connection) {
        echo 'beforeQuery : ' . $connection->getSQLStatement() . '<br>';
    }


    public function afterQuery (Event $event, $connection) {
        echo 'afterQuery : ' . $connection->getSQLStatement() . '<br>';
    }
}