<?php

class MONGOBASE_APP extends MONGOBASE {

    /* BASE CLASS FOR THE APPLICATIONS USING MONGOBASE */

    public $modules; // various objects
    public $plugins; // in array
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


	
	public function register_plugin($plugin) {
		if (isset($this->plugins[$plugin->name]) && is_object($this->plugins[$plugin->name]))
			trigger_error("MONGOBASE_PLUGIN ALREADY REGISTERED",E_USER_WARNING);


		$this->plugins[$plugin->name] = $plugin;
	}


	public function apply_filters($key, $values){
		if (function_exists('apply_filters')){
			return apply_filters($key, $values); // how to deal with unknown number of values? (func_get_args)
		}
		return $values;
	}

	public function add_action($key, $function){
		// TODO: NEED TO BE ABLE TO ADD OBJECT METHODS AS ACTIONS!
		if($this->actions!==null && is_array($this->actions)) $this->actions[$key] = $function;
		else $this->actions = array($key=>$function);
	}

	public function do_action($key, $args = array()) {
		// TODO: USE AN OBJECT METHOD WITH THE ARGS
		if($this->actions[$key]) $function = $this->actions[$key];

		if (function_exists($function)){
			return $function($args);
		}
		else print "\n\nFunction $function undefined\n\n"; // TODO: Error handling
	}



}


?>
