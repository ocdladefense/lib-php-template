<?php

namespace Ocdla;



	
class Template {

	private $path;


	public function __construct($path) {
		$this->path = $path;
	}

	
	public function render($vars) {
		extract($vars);

		ob_start();

		require $this->path;
		$content = ob_get_contents(); // get contents of buffer
		ob_end_clean();

		return $content;
	}


	public static function renderTemplate($path, $vars = array()) {

		extract($vars);

		ob_start();

		require $path;
		$content = ob_get_contents(); // get contents of buffer
		ob_end_clean();

		return $content;
	}



}