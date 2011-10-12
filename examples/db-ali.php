<?php
define('MONGODB_NAME', 'mongopress');
header('Content-Type: text/plain');

require_once(dirname(__DIR__).'/mb/classes/mb_base.class.php');
require_once(dirname(__DIR__).'/mb/classes/mb_db.class.php');

$mb = new MONGOBASE_DB(true);
var_dump($mb);


$tmp = $mb->dbh->listCollections();
	
$i=0;
foreach ($tmp as $col) {
	$i++; print "\n$i\t";
	var_dump($col->getName());
}

print "\n\n============= SLUGS ==============\n\n";
$options = array('col'=>'slugs');

var_dump($mb->find($options));

print "\n\n============= MBSERT =============\n\n";
$options = array('col'=>'mbsert');
var_dump($mb->find($options));


/*
/* EXAMPLE OF ADDING AN OBJECT 
$add_object = array(
	'obj'	=> array(
		'key'	=> 'value'
	)
);
var_dump($mb->mbsert($add_object));


/* EXAMPLE OF EDITING AN OBJECT 
$edit_object = array(
	'obj'	=> array(
		'key'	=> time()
	),
	'id'	=> 'XXX' // Replace with valid ID to accomplish an edit
);
var_dump($mb->mbsert($edit_object));

/* EXAMPLE OF FINDING AN OBJECT 

/* EXAMPLE OF DELETING AN OBJECT 
$delete_object = array(
	'id'	=> 'XXX' // Replace with valid ID to accomplish an edit
);
var_dump($mb->delete($delete_object));
*/
