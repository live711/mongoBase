<?php

/* THIS IS AN EXAMPLE APP */

// This file is required and includes other files


require_once(__DIR__.'/mb/mb_lang.php');
require_once(__DIR__.'/mb/mb_base.class.php');
require_once(__DIR__.'/mb/mb_db.class.php');
require_once(__DIR__.'/mb/mb_app.class.php');

$app = new MONGOBASE_APP;

var_dump($app);

$add_object = array(
	'obj'	=> array(
		'key'	=> 'value'
	)
);

var_dump( $app->db->mbsert($add_object) );



?>
