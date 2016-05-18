<?php

	$router_routes = [];

	// voegt een router toe aan de globale router_routes array
	function add_route($request_method, $url_pattern, $cb, $alias = null)
	{
		global $router_routes;

		// alleen GET en POST mogelijk!
		if (!in_array($request_method, ['GET', 'POST']))
		{
			return false;
		}

		$router_routes[] = [
			'alias' => $alias,
			'request_method' => $request_method,
			'url_pattern' => '/^\/' . $url_pattern . '(|\/)$/',
			'callback' => $cb
		];

		return true;
	}

	// request method
	function get_request_method()
	{
		return $_SERVER['REQUEST_METHOD'];
	}

	// fixed request uri voor execute_route
	function get_request_uri()
	{
		global $_CONFIG;

		$folder = $_CONFIG['url']['folder'];

		if (is_bool($_CONFIG['url']['withIndex']) && $_CONFIG['url']['withIndex'])
		{
			$folder .= 'index.php/';
		}

		$start_pos = strlen($folder) - 1;
		$end_pos = strpos($_SERVER['REQUEST_URI'], '?');
		if ($end_pos !== false)
		{
			$result = substr($_SERVER['REQUEST_URI'], $start_pos, $end_pos - $start_pos);
		}
		else
		{
			$result = substr($_SERVER['REQUEST_URI'], $start_pos);
		}

		if (empty($result))
		{
			$result = '/';
		}

		return $result;
	}

	// voert de juiste callback uit aan de hand van request method en url
	function execute_route($request_method, $url)
	{
		global $router_routes, $_CONFIG;

		// haalt alleen de request method items op
		$routes = array_filter($router_routes, function($route) use ($request_method) {
			return $route['request_method'] == $request_method;
		});

		foreach ($routes as $route)
		{
			// match de url_pattern van het item met de url
			if (preg_match($route['url_pattern'], $url, $matches))
			{
				$reflection = new ReflectionFunction($route['callback']);

				// inject function variables
				$parameters = [];
				foreach($reflection->getParameters() as $param)
				{
					if (!isset($matches[$param->name]))
					{
						continue (2);
					}

					$parameters[] = $matches[$param->name];
				}
				
				// execute callback with variables
				return call_user_func_array($route['callback'], $parameters);
			}
		}

		// error 404 pagina bestaat niet
		header('HTTP/1.0 404 Not Found');
		return display_view('error_404');
	}