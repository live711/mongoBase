<!doctype html>
<html class="" lang="en">
<head>
	<title>mongoBase</title>
	<script src="examples/js/js.js" /></script>
	<style>
		body {
			background: #FFFFEE;
		}
		.ribbon {
			background-color: #a00;
			overflow: hidden;
			position: absolute;
			left: -3em;
			top: 2.5em;
			-moz-transform: rotate(-45deg);
			-webkit-transform: rotate(-45deg);
			-moz-box-shadow: 0 0 4px #888;
			-webkit-box-shadow: 0 0 4px #888;
		}
		.ribbon a {
			border: 1px solid #faa;
			color: #fff;
			display: block;
			font: bold 81.25% 'Helvetiva Neue', Helvetica, Arial, sans-serif;
			margin: 0.05em 0;
			padding: 0.5em 3.5em;
			text-align: center;
			text-decoration: none;
			white-space: nowrap;
			text-shadow: 0 0 1px #444;
		}
		#content {
			width: 70%;
			display: inline-block;
			position: absolute;
			padding: 15px 5%;
			opacity: 0;
			top: 10px;
			left: 10%;
			background: #FFFFFF;
			border: 1px solid #DDD;
			text-align: center;
			font: bold 81.25% 'Helvetiva Neue', Helvetica, Arial, sans-serif;
			box-shadow: 0 0 8px #CCC;
			-moz-box-shadow: 0 0 8px #CCC;
			-webkit-box-shadow: 0 0 8px #CCC;
			border-radius: 8px;
			-moz-border-radius: 8px;
			-webkit-border-radius: 8px;
		}
		#content:hover {
			box-shadow: 0 0 8px #ABABAB;
			-moz-box-shadow: 0 0 8px #ABABAB;
			-webkit-box-shadow: 0 0 8px #ABABAB;
		}
		#content a {
			color: #069;
			text-decoration: none;
		}
	</style>
</head>
<body>

	<div id="content">
		<p>Please review the following examples to get a feel for what mongoBase can do:</p>
		<p><a href="examples/db.php">The mongoBase DB Module</a></p>
		<p><a href="examples/urls.php">The mongoBase URL Module</a></p>
		<p><a href="examples/module.php">Extending mongoBase Modules</a></p>
		<p><a href="examples/display.php">Using mongoBase Display Views</a></p>
		<p><a href="examples/form.php">The mongoBase Form Module</a></p>
		<p><a href="examples/app.php">Deploying a mongoBase Application</a></p>
		<p>&nbsp;</p>
		<p>Or download <a href="http://mongopress.org">MongoPress</a> - the OpenSource MongoDB CMS - which uses <a href="https://github.com/MongoPress/mongoBase/">mongoBase</a> at core!</p>
	</div>

</body>
</html>