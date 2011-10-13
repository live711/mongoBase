<?php

require_once(dirname(__DIR__).'/mb/classes/mb_base.class.php'); // Required
require_once(dirname(__DIR__).'/mb/classes/mb_app.class.php'); // Required for $app, which is required for display
require_once(dirname(__DIR__).'/mb/classes/mb_module.class.php'); // Allows modules
require_once(dirname(__DIR__).'/mb/displays/mb_display.class.php'); // Desired module
require_once(dirname(__DIR__).'/mb/displays/mb_form.class.php'); // Desired module

$app = new MONGOBASE_APP;

/* FUNCTION FOR ADDING CONTENT */
function custom_body($self){
	$content = '<div id="content">An example form:</div>';
	$body = $self.$content;
	return $body;
}
$app->add_filter('body_init','custom_body'); // global functions

$mb = new MONGOBASE_DISPLAY('default',$app);

//$mb->display($mb); // Uncomment to see the $mb display object
$mb->display();