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

	require_once(__DIR__.'/mb/mb_base.class.php'); // The one file to rule them all
	require_once(__DIR__.'/mb/mb_db.class.php'); // Required for MongoDB Connections

	$mb = new MONGOBASE_DB; // Assign the DB Object to $mb
	var_dump($mb); // Take a look at what the $mb object contains

	?>

# See it in Action:
* Supporting [MongoPress](http://mongopress.org) 0.3+