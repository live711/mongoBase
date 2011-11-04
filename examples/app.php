<?php

/* THIS IS AN EXAMPLE APP */

// This file is required and includes other files


require_once(dirname(__DIR__).'/mb/lib/mb_lang.php');
require_once(dirname(__DIR__).'/mb/classes/mb_base.class.php');
require_once(dirname(__DIR__).'/mb/classes/mb_db.class.php');
require_once(dirname(__DIR__).'/mb/classes/mb_app.class.php');

$app = new MONGOBASE_APP;
$app->setup_db();

var_dump($app);

$add_object = array(
	'obj'	=> array(
		'key'	=> 'value'
	)
);

var_dump( $app->db->mbsert($add_object) );