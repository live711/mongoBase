<?php
class MONGOBASE_PLUGIN extends MONGOBASE {

    /* BASE PLUGIN OBJECT FOR MONGOBASE */

	public $name;

    public function __construct($app,$name = 'default plugin') {
        
		// Plugin objects need to register with an app - if not - they are being run standalone
		$this->name = $name;
				
		$this->register_with($app);
    }

	public function register_with($app) {
		print "registering with APP\n";
		$app->register_plugin($this);
	}



}



?>
