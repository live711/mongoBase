<?php

/* THIS EXAMPLE SHOWCASES THE URLS CLASS */

require_once(__DIR__.'/mb/mb_base.class.php');
require_once(__DIR__.'/mb/mb_db.class.php');
require_once(__DIR__.'/mb/mb_app.class.php');
require_once(__DIR__.'/mb/mb_urls.class.php');

$app = new MONGOBASE_APP;
$app->add_action('custom_urls','my_urls');

function my_urls(){
	$obj = $GLOBALS['urls'];
	if(!defined('ADMIN_SLUG')) define('ADMIN_SLUG', 'admin');
	$obj->register_configuration_setting('ADMIN', 'ADMIN_SLUG', ADMIN_SLUG);
	if(!defined('MEDIA_SLUG')) define('MEDIA_SLUG', 'media');
	$obj->register_configuration_setting('MEDIA', 'MEDIA_SLUG', MEDIA_SLUG);
}

$urls = new MONGOBASE_URLS;

var_dump($urls);