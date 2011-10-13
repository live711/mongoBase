<?php

require_once(dirname(__DIR__).'/mb/classes/mb_base.class.php'); // Required
require_once(dirname(__DIR__).'/mb/classes/mb_app.class.php'); // Required for $app, which is required for display
require_once(dirname(__DIR__).'/mb/classes/mb_module.class.php'); // Allows modules
require_once(dirname(__DIR__).'/mb/displays/mb_display.class.php'); // Desired module
require_once(dirname(__DIR__).'/mb/displays/mb_form.class.php'); // Desired module

$app = new MONGOBASE_APP;

/* EXAMPLE OF BUILDING A FORM - SHOWCASING ALL AVAILABLE OPTIONS */
// Please note that $app->__('') allows for translatable strings
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
			'position'		=> 'half left',
			'id'            => false,
			'name'          => false,
			'current_value' => false,
			'default_value' => false,
			'placeholder'   => false,
			'required'      => false,
			'label'         => $app->__('First Name'),
			'class'         => 'blanked'
		),
		'field-02'	=> array(
			'type'          => 'textbox',
			'position'		=> 'half right',
			'id'            => false,
			'name'          => false,
			'current_value' => false,
			'default_value' => false,
			'placeholder'   => false,
			'required'      => false,
			'label'         => $app->__('Family Name'),
			'class'         => 'blanked'
		),
		'field-03'	=> array(
			'type'          => 'textbox',
			'position'		=> 'third left',
			'id'            => false,
			'name'          => false,
			'current_value' => false,
			'default_value' => false,
			'placeholder'   => false,
			'required'      => false,
			'label'         => $app->__('Nickname'),
			'class'         => 'blanked'
		),
		'field-04'	=> array(
			'type'          => 'textbox',
			'position'		=> 'third middle',
			'id'            => false,
			'name'          => false,
			'current_value' => false,
			'default_value' => false,
			'placeholder'   => false,
			'required'      => false,
			'label'         => $app->__('Email'),
			'class'         => 'blanked'
		),
		'field-05'	=> array(
			'type'          => 'select',
			'position'		=> 'third right',
			'id'            => false,
			'name'          => false,
			'current_value' => false,
			'default_value' => false,
			'placeholder'   => false,
			'required'      => false,
			'label'         => $app->__('Nationality'),
			'class'         => 'blanked',
			'values'		=> array(
				''			=> $app->__(' -- Select Nationality -- '),
				'usa'		=> $app->__('United States'),
				'uk'		=> $app->__('United Kingdom'),
				'my'		=> $app->__('Malaysia')
			)
		),
		'field-08'	=> array(
			'type'          => 'textbox',
			'position'		=> 'thirds left',
			'id'            => false,
			'name'          => false,
			'current_value' => false,
			'default_value' => false,
			'placeholder'   => false,
			'required'      => false,
			'label'         => $app->__('Address'),
			'class'         => 'blanked'
		),
		'field-09'	=> array(
			'type'          => 'select',
			'position'		=> 'third right',
			'id'            => false,
			'name'          => false,
			'current_value' => false,
			'default_value' => 'eng',
			'placeholder'   => false,
			'required'      => false,
			'label'         => $app->__('Language'),
			'class'         => 'blanked',
			'values'		=> array(
				''			=> '',
				'eng'		=> $app->__('English'),
				'es'		=> $app->__('Spanish')
			)
		),
		'field-10'	=> array(
			'type'          => 'textarea',
			'position'		=> 'third left',
			'id'            => false,
			'name'          => false,
			'current_value' => false,
			'default_value' => false,
			'placeholder'   => false,
			'required'      => false,
			'label'         => $app->__('Description'),
			'class'         => 'blanked'
		),
		'field-11'	=> array(
			'type'          => 'radio',
			'position'		=> 'third middle',
			'id'            => false,
			'name'          => false,
			'current_value' => false,
			'default_value' => false,
			'placeholder'   => false,
			'required'      => false,
			'label'         => $app->__('Your Gender'),
			'class'         => 'blanked',
			'values'		=> array(
				'm'			=> 'Male',
				'f'			=> 'Female'
			)
		),
		'field-12'	=> array(
			'type'          => 'checkbox',
			'position'		=> 'third right',
			'id'            => false,
			'name'          => false,
			'current_value' => false,
			'default_value' => false,
			'placeholder'   => false,
			'required'      => false,
			'label'         => $app->__('Preferred Gender'),
			'class'         => 'blanked',
			'values'		=> array(
				'm'			=> 'Male',
				'f'			=> 'Female'
			)
		),
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
$form = new MONGOBASE_FORM('example_form',$app,$form_options);

// Check the form object
//var_dump($form);

// Simply display the form as is:
// $form->display();

/* USE FORM IN CONJUNCTION WITH DISPLAY */
global $app, $example_form;
$example_form = $form->get();

/* FUNCTION FOR ADDING CONTENT */
function custom_body($self){
	global $app, $example_form;
	$content = '<div id="content"><h1>'.$app->__('This is an example form').'</h1>'.$example_form.'</div>';
	$body = $self.$content;
	return $body;
}
$app->add_filter('body_init','custom_body'); // global functions

/* ASSIGN APP TO DISPLAY */
$display_options = array(
	'header'	=> array(
		'title'		=> 'mongoBase Form Example',
		'styles'	=> array(
			'base'		=> 'css',
			'example'	=> 'example.css'
		),
		'scripts'	=> array(
			'base'		=> 'js',
			'example'	=> 'example.js'
		)
	)
);
$mb = new MONGOBASE_DISPLAY('default',$app,$display_options);

// Check the display object
//$mb->display($mb);

// PRINT the display object
$mb->display();