<?php

namespace li3_newrelic\config;

use lithium\core\Libraries;
use lithium\action\Dispatcher;
use lithium\core\Environment;
use lithium\aop\Filters;
use li3_newrelic\extensions\Newrelic;

/**
 * Main filter to add newrelic transaction for each request.
 */
Filters::apply('lithium\action\Dispatcher', '_callable', function($params, $next) {
	$controller = $next($params);
	Newrelic::filterDispatcher($controller, $params);
	return $controller;
});
