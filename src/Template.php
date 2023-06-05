<?php

namespace Ocdla;



	
class Template {

	private $path;


	private $name;


	private $hasPreprocessor;

	

	public function __construct($path) {
		$this->path = $path . ".tpl.php";

		$parts = explode(DIRECTORY_SEPARATOR, $path);

		$this->name = array_pop($parts);

		$path_only = implode(DIRECTORY_SEPARATOR, $parts);

		$file = $path_only . DIRECTORY_SEPARATOR . "preprocess.php";

		$this->hasPreprocessor = @include $file;
	}



	
	public function render($vars) {

		$preprocess = $this->name . "_preprocess";


		if(function_exists($preprocess)) {
			$vars = call_user_func($preprocess, $vars);
		}

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