<?php

$loader = new \Phalcon\Loader();

/**
  * Load library namespace
  */
// var_dump(APP_PATH);die();
$loader->registerNamespaces(array(
	/**
	 * Load SQL server db adapter namespace
	 */
	//'Phalcon\Db\Adapter\Pdo' => APP_PATH . '/lib/Phalcon/Db/Adapter/Pdo',
	//'Phalcon\Db\Dialect' => APP_PATH . '/lib/Phalcon/Db/Dialect',
	//'Phalcon\Db\Result' => APP_PATH . '/lib/Phalcon/Db/Result',
	//
	'MyApp\Listeners' => APP_PATH . '/Listener'
));

$loader->register();
