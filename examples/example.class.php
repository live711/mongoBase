<?php

class MONGOBASE_EXAMPLE extends MONGOBASE_MODULE {

	private $EXAMPLE = null;
	private $got_example = false;
	private $construct_set = false;

	function __construct($name=null,$app=null){
		parent::__construct($name,$app);
		if($name!==null && $app!==null) $this->construct_set = true;
		$this->got_example = $this->example();
	}

	public function example($force_refresh = false){

		if(!$force_refresh && $this->FORM!==null) return true;

		$example = '';
		
		$this->EXAMPLE = $example;
		return true;
	}

	public function options(){

		if (isset($this->options) && ! empty($this->options)) return $this->options;

		if($this->construct_set) $this->do_action('example_options',$this);

		return $this->options;

	}

}
