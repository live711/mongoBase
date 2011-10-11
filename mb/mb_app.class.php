<?php

class MONGOBASE_APP extends MONGOBASE {

    /* BASE CLASS FOR THE APPLICATIONS USING MONGOBASE */

    public $modules; // various objects
	public $actions = null;
    public $db; // fundamental object


    public function __construct() {
        
        // For now - just create a db instance and register it.
        if (! class_exists('MONGOBASE_DB')) {
            // Could do - a require_once - and assume directory structure...
            trigger_error("MONGOBASE_DB Class Required",E_FATAL);
            die();
        }

        $this->db = new MONGOBASE_DB();
    }

	
	public function register_module($module) {
		if (isset($this->modules[$module->name]) && is_object($this->modules[$module->name]))
			trigger_error("MONGOBASE_MODULE ALREADY REGISTERED",E_USER_WARNING);


		$this->modules[$module->name] = $module;
	}


	public function apply_filters($key, $values){
		if (function_exists('apply_filters')){
			return apply_filters($key, $values); // how to deal with unknown number of values? (func_get_args)
		}
		return $values;
	}

	public function add_action($key, $a1, $a2 = null){

		if ($this->actions !== null) $this->actions = array();
		
		if ($a2 !== null) $this->actions[$key] = array($a1,$a2);
		else $this->actions[$key] = $a1;

	}


	public function do_action($key, $args = array()) {

		// TODO: USE AN OBJECT METHOD WITH THE ARGS

		if(isset($this->actions[$key])) $do = $this->actions[$key];

		if (is_array($do)) {
			$module= $do[0]; $method = $do[1];
			if (method_exists($this->modules[$module],$method)) return $this->modules[$module]->$method($args); 
				// or should we use is_callable?
			else print "\n\nMethod $method undefined\n\n";
		} else {	
			$function = &$do;
			if (function_exists($function)){
				return $function($args);
			} else print "\n\nFunction $function undefined\n\n"; // TODO: Error handling
		}
	}



}


?>
