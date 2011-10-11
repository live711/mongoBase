<?php
class MONGOBASE_PLUGIN extends MONGOBASE {

    /* BASE PLUGIN OBJECT FOR MONGOBASE */

	public $name;
	public $app;

    public function __construct($name = 'default plugin',$app=null) {
		// Plugin objects need to register with an app - if not - they are being run standalone
		// as yet - when would a plugin be run standalone and how it should work is undefined
		$this->name = $name;
				
		if ($app !== null && is_object($app)) {
			$app->register_plugin($this);
			$this->app = $app;	
		}
        parent::__construct();
    }


	public function do_action($key,$args=array()) {
		// pass-through method
		$this->app->do_action($key,$args);
	}

	// we could also do add_action and filters etc... probably should

}



?>
