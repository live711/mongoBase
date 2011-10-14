**A simple framework for building PHP-based mongoDB applications.**

# The Basic Features:
* Fully OOP - Everything is Classed
* Allows for Rapid App Development
* ONLY INCLUDE WHAT YOU NEED:

### Core optional modules include:
* MongoDB Connect
* Extendable Module Classes
* Language / Translation Module
* Base URLs and Routing Modules
* Security & Log-In Modules
* HTML5 Display Modules
* Form Framework Modules

# Getting Started:
	<?php
	require_once(__DIR__.'/mb/mb_base.class.php');
	require_once(__DIR__.'/mb/mb_db.class.php');
	$mb = new MONGOBASE_DB;
	var_dump($mb);
	?>

# See it in Action:
* Supporting [MongoPress](http://mongopress.org) 0.3+