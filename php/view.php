<?php

	$view_data = [];
	$view_assets = [];

	// set data wat gebruikt kan worden in een view of w.e.
	function set_data_view($name, $value)
	{
		global $view_data;

		$view_data[$name] = $value;
	}

	// voegt een asset toe voor in de view
	function add_asset_view($type, $path)
	{
		global $view_assets;

		$view_assets[] = [
			'type' => $type,
			'path' => $path
		];
	}

	// haalt een variable op voor de view
	function get_data_view($name)
	{
		global $view_data;

		$ref_data =& $view_data;
		foreach (func_get_args() as $name)
		{
			if (isset($ref_data[$name]))
			{
				$ref_data =& $ref_data[$name];
			}
			else
			{
				return null;
			}
		}

		return $ref_data;
	}

	// haalt alle assets op van een bepaalt type
	function get_assets_view($type)
	{
		global $view_assets;

		return array_filter($view_assets, function($asset) use ($type) {
			return $asset['type'] == $type;
		});
	}

	// htmlspecialchars variable
	function echo_data_view($name)
	{
		$result = call_user_func_array('get_data_view', func_get_args());

		echo htmlspecialchars($result);
	}

	// returnt een view
	function display_view($viewname)
	{
		$filename = VIEWS_FOLDER . $viewname . '.php';

		if (!file_exists($filename))
		{
			return '';
		}

		ob_start();
		require $filename;
		$content = ob_get_clean();

		return $content;
	}