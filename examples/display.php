<?php

require_once(dirname(__DIR__).'/mb/classes/mb_base.class.php'); // Required
require_once(dirname(__DIR__).'/mb/classes/mb_app.class.php'); // Required for $app, which is required for display
require_once(dirname(__DIR__).'/mb/classes/mb_module.class.php'); // Allows modules
require_once(dirname(__DIR__).'/mb/displays/mb_display.class.php'); // Desired module

global $app;
$app = new MONGOBASE_APP;

/* FUNCTION FOR ADDING CONTENT */
function custom_body($self){
	global $app;
	$content = '<div id="content">'.$app->__('Hello World').'</div>';
	$body = $self.$content;
	return $body;
};
/* DISPLAY OPTIONS */
$display_options = array(
	'header'	=> array(
		'title'		=> 'mongoBase Form Example',
		'styles'	=> array(
			'base'	=> 'css',
			'reset'	=> 'example.css'
		),
		'scripts'	=> array(
			'base'	=> 'js',
			'js'	=> 'js.js'
		)
	)
);
$app->add_filter('body_init','custom_body'); // global functions

$mb = new MONGOBASE_DISPLAY('default',$app);

//$mb->display($mb); // Uncomment to see the $mb display object
$mb->display();