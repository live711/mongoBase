<?php

global $app, $data;

require_once(dirname(__DIR__).'/mb/classes/mb_base.class.php'); // Required
require_once(dirname(__DIR__).'/mb/classes/mb_db.class.php'); // Required
require_once(dirname(__DIR__).'/mb/classes/mb_app.class.php'); // Required for $app, which is required for display
require_once(dirname(__DIR__).'/mb/classes/mb_module.class.php'); // Allows modules
require_once(dirname(__DIR__).'/mb/displays/mb_display.class.php'); // Desired module
require_once(dirname(__DIR__).'/mb/classes/mb_process.class.php'); // Desired module

$app = new MONGOBASE_APP;
$app->setup_db();

$process_options = array(

);
$data = new MONGOBASE_PROCESS('process_form',$app,$process_options);

// Check the process object
//var_dump($data);

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