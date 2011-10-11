<?php

/* THIS EXAMPLE SHOWCASES THE URLS CLASS */

require_once(__DIR__.'/mb/mb_base.class.php');
require_once(__DIR__.'/mb/mb_db.class.php');
require_once(__DIR__.'/mb/mb_app.class.php');
require_once(__DIR__.'/mb/mb_plugin.class.php');
require_once(__DIR__.'/mb/mb_urls.class.php');

$app = new MONGOBASE_APP;
// 'custom_urls'  is a special case as it's called on the object set up...

class CUSTOM_URLS extends MONGOBASE_URLS {
	public function my_urls() {
		if(!defined('ADMIN_SLUG')) define('ADMIN_SLUG', 'admin');
		$this->register_configuration_setting('ADMIN', 'ADMIN_SLUG', ADMIN_SLUG);
		if(!defined('MEDIA_SLUG')) define('MEDIA_SLUG', 'media');
		$this->register_configuration_setting('MEDIA', 'MEDIA_SLUG', MEDIA_SLUG);
	}
}

$app->add_action('custom_urls','my_urls'); // global functions
$urls = new MONGOBASE_URLS('urls',$app);
var_dump($urls);

$app->add_action('custom_urls','themed_urls','my_urls'); // if second argument present that's the name of the plugin
$themed_urls = new CUSTOM_URLS('themed_urls',$app);
var_dump($themed_urls);

// other options can be added on the fly
if(!defined('VIDEO_SLUG')) define('VIDEO_SLUG', 'video');
$urls->register_configuration_setting('VIDEO', 'VIDEO_SLUG', VIDEO_SLUG);
$urls->env(true);

var_dump($urls);

// custom function for demo
function my_urls($self){
	// self is set by the calling object
	if(!defined('ADMIN_SLUG')) define('ADMIN_SLUG', 'admin');
	$self->register_configuration_setting('ADMIN', 'ADMIN_SLUG', ADMIN_SLUG);
	if(!defined('MEDIA_SLUG')) define('MEDIA_SLUG', 'media');
	$self->register_configuration_setting('MEDIA', 'MEDIA_SLUG', MEDIA_SLUG);

}

