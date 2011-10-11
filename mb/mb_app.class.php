<?php

class MONGOBASE_APP extends MONGOBASE {

    /* BASE CLASS FOR THE APPLICATIONS USING MONGOBASE */

    public $modules; // various objects
    public $plugins; // in array

    public $db; // fundamental objects will


    public function __construct() {
        
        // For now - just create a db instance and register it.
        if (! class_exists('MONGOBASE_DB')) {
            // Could do - a require_once - and assume directory structure...
            trigger_error("MONGOBASE_DB Class Required",E_FATAL);
            die();
        }

        $this->db = new MONGOBASE_DB();
    }

}


?>
