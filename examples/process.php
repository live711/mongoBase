<?php

global $app, $data;

require_once(dirname(__DIR__).'/mb/classes/mb_base.class.php'); // The one file to rule them all
require_once(dirname(__DIR__).'/mb/classes/mb_db.class.php'); // Required for processing
require_once(dirname(__DIR__).'/mb/classes/mb_app.class.php'); // Required for $app, which is required for display
require_once(dirname(__DIR__).'/mb/classes/mb_module.class.php'); // Allows for modules to be included
require_once(dirname(__DIR__).'/mb/displays/mb_display.class.php'); // Required to display content nicely
require_once(dirname(__DIR__).'/mb/classes/mb_process.class.php'); // Desired module for this example

$app = new MONGOBASE_APP;
$app->setup_db();

$process_options = array(
	'col'	=> 'mbsert' // Name of collection to access
);
$process_options_edit = array(
	'col'	=> 'mbsert', // Name of collection to access
	'id'	=> 'replace-with-valid-id' // Allow editing of objects
);
$process_options_delete = array(
	'col'		=> 'mbsert', // Name of collection to access
	'id'		=> 'replace-with-valid-id', // Needed for deletion
	'delete'	=> true
);
$data = new MONGOBASE_PROCESS('process_form',$app,$process_options);

// Check the process object
//var_dump($data);
//$_POST['field-08'] = 'new'; // Used to manipulate data for tests...

/* USE PROCESS IN CONJUNCTION WITH DISPLAY */
$processed_results = $data->process($_POST);

/* FUNCTION FOR ADDING CONTENT */
function custom_body($self){
	global $app, $processed_results;
	$content = '<div id="content"><h1>'.$app->__('EXAMPLE OF PROCESSING DATA').'</h1><p>'.$app->__('Object processed as follows: ').$processed_results.'</p></div>';
	$body = $self.$content;
	return $body;
}
$app->add_filter('body_init','custom_body'); // global functions

/* ASSIGN APP TO DISPLAY */
$display_options = array(
	'header'	=> array(
		'title'		=> 'mongoBase Processing Form Example',
		'styles'	=> array(
			'base'		=> 'css',
			'example'	=> 'example.css'
		),
		'scripts'	=> array(
			'base'		=> 'js',
			'example'	=> 'example.js'
		)
	)
);
$mb = new MONGOBASE_DISPLAY('default',$app,$display_options);

// Check the display object
//$mb->display($mb);

// PRINT the display object
$mb->display();