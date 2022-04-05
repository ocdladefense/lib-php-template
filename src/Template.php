<?php

namespace Ocdla;



	
class Template {


	public static function renderTemplate($path, $vars = array()) {

		extract($vars);

		ob_start();

		require $path;
		$content = ob_get_contents(); // get contents of buffer
		ob_end_clean();

		return $content;
	}

	
	public static function render($path, $vars = array()) {
		return self::renderTemplate($path, $vars);
	}



}