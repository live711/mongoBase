<?php

require_once(dirname(__DIR__).'/mb/classes/mb_base.class.php'); // Required
require_once(dirname(__DIR__).'/mb/classes/mb_app.class.php'); // Required for $app, which is required for display
require_once(dirname(__DIR__).'/mb/classes/mb_module.class.php'); // Allows modules
require_once(dirname(__DIR__).'/mb/classes/mb_display.class.php'); // Desired module

$app = new MONGOBASE_APP;

/* FUNCTION FOR ADDING CONTENT */
function custom_body($self){
	$content = 'Hello World';
	$body = $self.$content;
	return $body;
}
$app->add_filter('body_init','custom_body'); // global functions

$mb = new MONGOBASE_DISPLAY('default',$app);

$mb->display($mb);