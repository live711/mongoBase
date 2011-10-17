<?php

class MONGOBASE_WEBAPP extends MONGOBASE_APP {

    /* CLASS FOR THE WEB APPLICATIONS USING MONGOBASE */

	public $handlers= null,$slugs = null;

	private $headers, $javascript;
	

  	public function register_handler($handler) {
		if (isset($this->handlers[$handler->name]) && is_object($this->handlers[$handler->name]))
			trigger_error("MONGOBASE_HANDLER ALREADY REGISTERED",E_USER_WARNING);
		$this->handlers[$handler->name] = $handler;
	}

  	public function register_slug($slug,$handler) {
		// slug == string eg admin mp-admin media videos etc
		if (isset($this->slugs[$slug]) && is_object($this->slugs[$slug]))
			trigger_error("SLUG ALREADY REGISTERED",E_USER_WARNING);
		$this->slugs = $handler->name; // only want the name here
	}



	public function run($slug) {

		// this is envisaged to be the function that sets things off


	}


	public function enqueue_javascript($js,$filename=null,$content=null) {
		// here add in things for the theme.
		
		// if it's a filename
	}

}
