<?php

require_once(dirname(__DIR__).'/mb/classes/mb_base.class.php'); // Required
require_once(dirname(__DIR__).'/mb/classes/mb_db.class.php'); // Required by App class
require_once(dirname(__DIR__).'/mb/classes/mb_app.class.php'); // Required for $app, which is required for display
require_once(dirname(__DIR__).'/mb/classes/mb_module.class.php'); // Allows modules
require_once(dirname(__DIR__).'/mb/classes/mb_display.class.php'); // Desired module

$app = new MONGOBASE_APP;
$mb = new MONGOBASE_DISPLAY('default',$app);
var_dump($mb);