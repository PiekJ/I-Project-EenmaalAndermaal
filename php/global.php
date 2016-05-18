<?php


	// short en snelle definities
	define('DS', DIRECTORY_SEPARATOR);
	define('SYSTEM_FOLDER', __DIR__ . DS);
	define('VIEWS_FOLDER', SYSTEM_FOLDER . 'views' . DS);

	session_start();

	// initializeert de database connectie als deze niet bestaad en geeft deze terug.
	function get_db()
	{
		global $_CONFIG;

		static $db;

		if (!isset($db))
		{
			$db = sqlsrv_connect($_CONFIG['db']['server_name'], $_CONFIG['db']['options']);
			if($db === false)
			{
				die(var_export(sqlsrv_errors(), true));
			}
		}

		return $db;
	}

	// genereert de base url van de website (https/http)
	function get_url($https = null)
	{
		global $_CONFIG;

		if (is_bool($https) && $https)
		{
			return 'https://' . $_CONFIG['url']['domain'] . $_CONFIG['url']['folder'];
		}

		return 'http://' . $_CONFIG['url']['domain'] . $_CONFIG['url']['folder'];
	}

	// set de locatie header om te redirecten
	function location($url = null, $https = null)
	{
		global $_CONFIG;

		$url = (isset($url)) ? $url : '';

		header('Location: ' . get_url($https) . $url);
	}

	// include sub php files
	require_once SYSTEM_FOLDER . 'config.php';

	require_once SYSTEM_FOLDER . 'view.php';
	require_once SYSTEM_FOLDER . 'router.php';