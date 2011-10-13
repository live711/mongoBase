<?php

class MONGOBASE_DISPLAY extends MONGOBASE_MODULE {

	private $VIEW = null;
	private $got_view = false;

	function __construct($name=null,$app=null){
		parent::__construct($name,$app);
		$this->got_view = $this->view();
	}

	private function header_init($options=false){

		$defaults = array(
			'title'		=> 'mongoBase',
			'styles'	=> array(
				'base'	=> 'css',
				'reset'	=> 'reset.css'
			),
			'scripts'	=> array(
				'base'	=> 'js',
				'js'	=> 'js.js'
			)
		);
		$settings = $this->settings($options,$defaults);

		/* ESTABLISH HEADER VIEW */
		$view = '<!doctype html>';
		$view.= '<html class="" lang="en">';
		$view.= '<head>';
		$view.= '<title>'.$settings['title'].'</title>';
		if($this->is_set($settings['styles'])){
			$view.= $this->styles($settings['styles']);
		} if($this->is_set($settings['scripts'])){
			$view.= $this->scripts($settings['scripts']);
		}
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

	private function styles($styles=false){
		$style = false;
		if(($this->is_set($styles))&&($this->is_set($styles,0,'base'))){
			$base = array_shift($styles);
			foreach($styles as $handle => $file){
				$style.= '<link rel="stylesheet" id="'.$handle.'-css" href="'.$base.'/'.$file.'" type="text/css" media="all" />';
			}
		} if($style) return $style;
	}

	private function scripts($scripts=false){
		$script = false;
		if(($this->is_set($scripts))&&($this->is_set($scripts,0,'base'))){
			$base = array_shift($scripts);
			foreach($scripts as $handle => $file){
				$script.= '<script id="'.$handle.'-js" src="'.$base.'/'.$file.'"></script>';
			}
		} if($script) return $script;
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

		$this->do_action('custom_views',$this);

		return $this->options;

	}

}
