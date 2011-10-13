<?php

require_once(dirname(__DIR__).'/mb/classes/mb_base.class.php'); // Required
require_once(dirname(__DIR__).'/mb/classes/mb_app.class.php'); // Required for $app, which is required for display
require_once(dirname(__DIR__).'/mb/classes/mb_module.class.php'); // Allows modules
require_once(dirname(__DIR__).'/mb/displays/mb_display.class.php'); // Desired module
require_once(dirname(__DIR__).'/mb/displays/mb_form.class.php'); // Desired module

$app = new MONGOBASE_APP;

$form_options = array(
	'submit'        => true,
	'submit_text'   => $app->__('Submit Example'),
	'id'            => 'example',
	'class'         => 'example-form',
	'method'        => 'post',
	'enctype'       => 'multipart/form-data',
	'debug'         => false,
	'fields'        => array(
		'field-01'	=> array(
			'type'          => 'textbox',
			'id'            => false,
			'name'          => false,
			'current_value' => false,
			'default_value' => false,
			'placeholder'   => false,
			'required'      => false,
			'label'         => false,
			'class'         => 'blanked'
		)
	),
	'styles'        => array(
		'wrapped'       => true,
		'fluid'         => true,
		'bg'            => '#F5F5F5',
		'border'        => '1px solid #DDDDDD',
		'color'         => '#757575',
		'label'         => '#006699',
		'hover'         => array(
			'bg'            => '#EFEFEF',
			'border'        => '1px solid #CCCCCC',
			'color'         => '#333333'
		)
	)
);

$mb = new MONGOBASE_FORM('example_form',$app,$form_options);

//var_dump($mb->FORM);
$mb->display();