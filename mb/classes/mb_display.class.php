<?php

class MONGOBASE_DISPLAY extends MONGOBASE_MODULE {

	private $VIEW = null;
	private $got_view = false;
	private $construct_set = false;

	function __construct($name=null,$app=null){
		parent::__construct($name,$app);
		if($name!==null && $app!==null) $this->construct_set = true;
		$this->got_view = $this->view();
	}

	private function header_init($options=false){

		$defaults = array(
			'title'	=> 'mongoBase'
		);
		$settings = $this->settings($options,$defaults);

		$view = '<!doctype html>';
		$view.= '<html class="" lang="en">';
		$view.= '<head>';
		$view.= '<title>'.$settings['title'].'</title>';
		$view.= '</head>';
		$view.= '<body>';

		$display['view'] = $this->apply_filters('header_init',$view);
		return $display;
	}

	private function body_init(){
		$view = '';
		$display['view'] = $this->apply_filters('body_init',$view);
		return $display;
	}

	private function footer_init(){
		$view = '</body>';
		$view.= '</html>';
		$display['view'] = $this->apply_filters('footer_init',$view);
		return $display;
	}

	public function display($debug=false){
		$page = $this->VIEW['HEADER']['view'];
		$page.= $this->VIEW['BODY']['view'];
		if(is_object($debug)){
			$page.= $this->mb_dump($debug);
		}
		$page.= $this->VIEW['FOOTER']['view'];
		echo $page;
	}

	public function view($force_refresh = false){

		if(!$force_refresh && $this->VIEW!==null) return true;

		/* NON-OPTIONAL */
		$view['HEADER'] = $this->header_init();
		$view['BODY'] = $this->body_init();
		$view['FOOTER'] = $this->footer_init();

		/* OPTIONAL */
		if($this->is_set($this->options)){
			foreach($this->options as $key => $value){
				$view[$key] = $value;
			}
		}

		$this->VIEW = $view;
		return true;
	}

	public function options(){

		if (isset($this->options) && ! empty($this->options)) return $this->options;

		if($this->construct_set) $this->do_action('custom_views',$this);

		return $this->options;

	}

}
