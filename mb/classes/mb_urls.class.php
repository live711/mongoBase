<?php

class MONGOBASE_URLS extends MONGOBASE_MODULE {

	private $ENV = null;
	private $got_env = false;

	function __construct($name,$app){
		parent::__construct($name,$app);
		$this->got_env = $this->env();
	}

	public function env($force_refresh = false){

		if(!$force_refresh && $this->ENV!==null) return true;

		$env['ROOT_PATH'] = dirname(__DIR__);
		if (DIRECTORY_SEPARATOR !== '/') {
			$env['ROOT_PATH'] = str_replace('\\','/',$env['ROOT_PATH']).'/';
		}
		$env['ROOT'] = str_replace($_SERVER['DOCUMENT_ROOT'],'',$env['ROOT_PATH']);
		if (empty($env['ROOT'])) $env['ROOT'] = '/';



		$env['SLUG'] = $_SERVER['REQUEST_URI'];
		$qs_pos = strpos($env['SLUG'],'?');
		if ($qs_pos !== false) $env['SLUG'] = substr($env['SLUG'],0,$qs_pos);
		$env['SLUG_PATH'] = $env['ROOT_PATH'].substr($env['SLUG'],strlen($env['ROOT']));
		$env['SLUG'] = substr($env['SLUG'],strlen($env['ROOT']));

		$this->ENV = $env;
		return true;
	}

	public function options(){

		if (isset($this->options) && ! empty($this->options)) return $this->options;

		/* ADDITIONAL ENV SETTINGS GET AUTO-GENERATED BASED ON THESE OPTIONS */
	
		$this->do_action('custom_urls',$this); // self referencing function... for a GLOBAL function
		//$this->do_action('custom_urls'); // when registering a module and method.

		return $this->options;

	}

}
