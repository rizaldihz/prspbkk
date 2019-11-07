<?php

use Phalcon\Logger\Adapter\File as Logger;
use Phalcon\Session\Adapter\Files as Session;
use Phalcon\Http\Response\Cookies;
use Phalcon\Security;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Mvc\View;
use Phalcon\Flash\Direct as FlashDirect;
use Phalcon\Flash\Session as FlashSession;

$di['config'] = function() use ($config) {
	return $config;
};

$di->setShared('session', function() {
    $session = new Session(
        [
            'uniqueId' => 'prspbkk',
        ]
    );
	$session->start();

	return $session;
});

$di['dispatcher'] = function() use ($di, $defaultModule) {

    $eventsManager = $di->getShared('eventsManager');
    $dispatcher = new Dispatcher();
    $dispatcher->setEventsManager($eventsManager);

    return $dispatcher;
};

$di['url'] = function() use ($config, $di) {
	$url = new \Phalcon\Mvc\Url();

    $url->setBaseUri($config->url['baseUrl']);

	return $url;
};

$di['voltService'] = function($view, $di) use ($config) {
    $volt = new \Phalcon\Mvc\View\Engine\Volt($view, $di);
    if (!is_dir($config->application->cacheDir)) {
        mkdir($config->application->cacheDir);
    }

    $compileAlways = $config->mode == 'DEVELOPMENT' ? true : false;

    $volt->setOptions(array(
        "compiledPath" => $config->application->cacheDir,
        "compiledExtension" => ".compiled",
        "compileAlways" => $compileAlways
    ));
    return $volt;
};

$di['view'] = function () {
    $view = new View();
    $view->setViewsDir(APP_PATH . '/common/views/');

    $view->registerEngines(
        [
            ".volt" => "voltService",
        ]
    );

    return $view;
};

$di->set(
    'security',
    function () {
        $security = new Security();
        $security->setWorkFactor(12);

        return $security;
    },
    true
);

$di->set(
    'flash',
    function () {
        $flash = new FlashDirect(
            [
                'error'   => 'alert alert-danger',
                'success' => 'alert alert-success',
                'notice'  => 'alert alert-info',
                'warning' => 'alert alert-warning',
            ]
        );

        return $flash;
    }
);

$di->set(
    'flashSession',
    function () {
        $flash = new FlashSession(
            [
                'error'   => 'alert alert-danger',
                'success' => 'alert alert-success',
                'notice'  => 'alert alert-info',
                'warning' => 'alert alert-warning',
            ]
        );

        $flash->setAutoescape(false);
        
        return $flash;
    }
);
// Dipakai jika menggunakan Cara 2
use MyApp\Listeners\Listener as Listener;



use Phalcon\Events\Event;
use Phalcon\Events\Manager as EventsManager;
use Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter;

$di['db'] = function () use ($config) {
    $eventsManager = new EventsManager();
    // Cara 1
    $eventsManager->attach(
        'db:beforeQuery',
        function (Event $event, $connection) {
            echo 'beforeQuery : ' . $connection->getSQLStatement() . '<br>';
        }
    );
    $eventsManager->attach(
        'db:afterQuery',
        function (Event $event, $connection) {
            echo 'afterQuery : ' . $connection->getSQLStatement() . '<br>';
        }
    );
    $dbAdapter = new \Phalcon\Db\Adapter\Pdo\Mysql([
        "host" => $config->database->host,
        "username" => $config->database->username,
        "password" => $config->database->password,
        "dbname" => $config->database->dbname
    ]);

    $dbAdapter->setEventsManager($eventsManager);
    return $dbAdapter;
};


    // // Cara 2
    // $eventsManager->attach(
    //     'db',
    //     new Listener()
    // );
        // $eventsManager = new EventsManager();

        // $eventsManager->collectResponses(true);

        // $eventsManager->attach(
        //     'custom:pertama',
        //     function (Event $event, $component, $data) {
        //         return 'Dari Event Manager Custom ' . $data . ' <br>' ;
        //     }
        // );

        // $eventsManager->attach(
        //     'custom:pertama',
        //     function () {
        //         return 'Dari Event Manager Custom Tanpa Data' . '<br>';
        //     }
        // );

        // $eventsManager->fire('custom:pertama', $this, 'Dengan Data');

        // // $eventsManager->fire('custom:pertama', null);

        // print_r($eventsManager->getResponses());



// use Phalcon\Events\Exception;

// try {

//     $eventsManager = new EventsManager();

//     $eventsManager->attach('custom:custom', true);
// } catch (Exception $ex) {
//     echo $ex->getMessage();
// }