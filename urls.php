<?php

/* THIS EXAMPLE SHOWCASES THE URLS CLASS */

require_once(__DIR__.'/mb/mb_base.class.php');
require_once(__DIR__.'/mb/mb_db.class.php');
require_once(__DIR__.'/mb/mb_app.class.php');
require_once(__DIR__.'/mb/mb_plugin.class.php');
require_once(__DIR__.'/mb/mb_urls.class.php');

$app = new MONGOBASE_APP;

// 'custom_urls'  is a special case as it's called on the object set up...
$app->add_action('custom_urls','my_urls');


function my_urls($self){
	// self is set by the calling object

	if(!defined('ADMIN_SLUG')) define('ADMIN_SLUG', 'admin');
	$self->register_configuration_setting('ADMIN', 'ADMIN_SLUG', ADMIN_SLUG);
	if(!defined('MEDIA_SLUG')) define('MEDIA_SLUG', 'media');
	$self->register_configuration_setting('MEDIA', 'MEDIA_SLUG', MEDIA_SLUG);

}

$urls = new MONGOBASE_URLS('urls',$app);

// other options can be added on the fly

if(!defined('VIDEO_SLUG')) define('VIDEO_SLUG', 'video');
var_dump($urls);

$urls->register_configuration_setting('VIDEO', 'VIDEO_SLUG', VIDEO_SLUG);

var_dump($urls->options);

