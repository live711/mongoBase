<?php

class MONGOBASE_FORM extends MONGOBASE_MODULE {

	private $FORM = null;
	private $got_form = false;
	private $construct_set = false;

	function __construct($name=null,$app=null){
		parent::__construct($name,$app);
		if($name!==null && $app!==null) $this->construct_set = true;
		$this->got_form = $this->form();
	}

	public function form($force_refresh = false){

		if(!$force_refresh && $this->FORM!==null) return true;

		$form = '';
		
		$this->FORM = $form;
		return true;
	}

	public function options(){

		if (isset($this->options) && ! empty($this->options)) return $this->options;

		if($this->construct_set) $this->do_action('form_options',$this);

		return $this->options;

	}

}
