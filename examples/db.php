<?php

require_once(dirname(__DIR__).'/mb/classes/mb_base.class.php');
require_once(dirname(__DIR__).'/mb/classes/mb_db.class.php');

$mb = new MONGOBASE_DB;
var_dump($mb);

/* EXAMPLE OF ADDING AN OBJECT */
$add_object = array(
	'obj'	=> array(
		'key'	=> 'value'
	)
);
var_dump($mb->mbsert($add_object));

/* EXAMPLE OF EDITING AN OBJECT */
$edit_object = array(
	'obj'	=> array(
		'key'	=> time()
	),
	'id'	=> 'XXX' // Replace with valid ID to accomplish an edit
);
var_dump($mb->mbsert($edit_object));

/* EXAMPLE OF FINDING AN OBJECT */
var_dump($mb->find());

/* EXAMPLE OF DELETING AN OBJECT */
$delete_object = array(
	'id'	=> 'XXX' // Replace with valid ID to accomplish an edit
);
var_dump($mb->delete($delete_object));
