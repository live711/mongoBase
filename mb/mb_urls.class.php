<?php

class MONGOBASE_URLS extends MONGOBASE {

	private $ENV = null;
	private $got_env = false;

	function __construct(){
		parent::__construct();
		$this->got_env = $this->env();
	}

	private function env(){

		if($this->ENV!==null) return true;

		$env['ROOT_PATH'] = dirname(__DIR__);
		if (DIRECTORY_SEPARATOR !== '/') {
			$env['ROOT_PATH'] = str_replace('\\','/',$env['ROOT_PATH']).'/';
		}
		$env['ROOT'] = str_replace($_SERVER['DOCUMENT_ROOT'],'',$env['ROOT_PATH']);
		if (empty($env['ROOT'])) $env['ROOT'] = '/';

		if($this->is_set($this->options)){
			foreach($this->options as $key => $value){
				$env[$key.'_PATH'] = $env['ROOT_PATH'].$value.'/';
				$env[$key] = $env['ROOT'].$value.'/';
			}
		}

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

		/* ELSE - GATHER CONFIG SETTINGS */
		/* ADDITIONAL ENV SETTINGS GET AUTO-GENERATED BASED ON THESE OPTIONS */
		$this->do_action('custom_urls');

		/*
		if(!defined('ADMIN_SLUG')) define('ADMIN_SLUG', 'admin');
		$this->register_configuration_setting('ADMIN', 'ADMIN_SLUG', ADMIN_SLUG);

		if(!defined('MEDIA_SLUG')) define('MEDIA_SLUG', 'media');
		$this->register_configuration_setting('MEDIA', 'MEDIA_SLUG', MEDIA_SLUG);
		 */

		return $this->options;

	}

}