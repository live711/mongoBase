<?php

class MONGOBASE_FORM extends MONGOBASE_MODULE {

	public $FORM = null;
	private $got_form = false;
	private $construct_set = false;
	private $form_options = null;

	function __construct($name=null,$app=null,$settings=null){
		parent::__construct($name,$app);
		$this->form_options = $settings;
		if($name!==null && $app!==null) $this->construct_set = true;
		$this->got_form = $this->form();
	}

	private function field_settings($field_settings = false, $form_settings = false){
		$default_field = array(
			'type'          => 'textbox',
			'position'		=> false,
			'id'            => false,
			'name'          => false,
			'current_value' => false,
			'default_value' => false,
			'placeholder'   => false,
			'required'      => false,
			'label'         => false,
			'class'         => 'blanked'
		);
		if(is_array($field_settings)){
			$settings = array_merge($default_field,$field_settings);
		}else{
			$settings = $default_field;
		}
		/* MODIFY THE SETTINGS ARRAY */
		if(isset($settings['default_value'])){
			if(isset($settings['current_value'])){
				if((empty($settings['current_value']))&&(!empty($settings['default_value']))){
					$settings['value'] = $settings['default_value'];
				}else{
					if(!empty($settings['current_value'])){
						$settings['value'] = $settings['current_value'];
					}else{
						$settings['value'] = false;
					}
				}
			}else{
				if(isset($settings['default_value'])){
					$settings['value'] = $settings['default_value'];
				}else{
					$settings['value'] = false;
				}
			}
		}elseif(isset($settings['current_value'])){
			$settings['value'] = $settings['current_value'];
		}else{
			$settings['value'] = false;
		} $this_wrap = false;
		if(isset($form_settings)){
			if(isset($settings['wrapped'])){
				if($settings['wrapped']!=true){
					$default_wrapped = $form_settings['styles']['wrapped'];
					if(isset($settings['wrapped'])){
						$this_wrap = $settings['wrapped'];
					}else{
						$this_wrap = $default_wrapped;
					}
				}
			}else{
				if(isset($form_settings['styles']['wrapped'])){
					if($form_settings['styles']['wrapped']===true){
						$this_wrap = true;
					}
				}
			}
		}else{
			if($settings['wrapped']===true){
				$this_wrap = true;
			}
		} $settings['this_wrap'] = $this_wrap;
		return $settings;
	}

	private function form_settings($options=false){
		$default_styles_wrapped = true;
		$default_styles_fluid = true;
		$default_styles_bg = '#F5F5F5';
		$default_styles_border = '1px solid #DDDDDD';
		$default_styles_color = '#757575';
		$default_styles_label = '#006699';
		$default_styles_hover_bg = '#EFEFEF';
		$default_styles_hover_border = '1px solid #CCCCCC';
		$default_styles_hover_color = '#333333';
		if(isset($options['styles']['wrapped'])){
			$this_styles_wrapped = $options['styles']['wrapped'];
		} if(isset($this_styles_wrapped)){
			$styles_wrapped = $this_styles_wrapped;
		}else{
			$styles_wrapped = $default_styles_wrapped;
		} if(isset($options['styles']['fluid'])){
			$this_styles_fluid = $options['styles']['fluid'];
		} if(isset($this_styles_fluid)){
			$styles_fluid = $this_styles_fluid;
		}else{
			$styles_fluid = $default_styles_fluid;
		} if(isset($options['styles']['bg'])){
			$this_styles_bg = $options['styles']['bg'];
		} if(isset($this_styles_bg)){
			$styles_bg = $this_styles_bg;
		}else{
			$styles_bg = $default_styles_bg;
		} if(isset($options['styles']['border'])){
			$this_styles_border = $options['styles']['border'];
		} if(isset($this_styles_border)){
			$styles_border = $this_styles_border;
		}else{
			$styles_border = $default_styles_border;
		} if(isset($options['styles']['color'])){
			$this_styles_color = $options['styles']['color'];
		} if(isset($this_styles_color)){
			$styles_color = $this_styles_color;
		}else{
			$styles_color = $default_styles_color;
		} if(isset($options['styles']['label'])){
			$this_styles_label = $options['styles']['label'];
		} if(isset($this_styles_label)){
			$styles_label = $this_styles_label;
		}else{
			$styles_label = $default_styles_label;
		} if(isset($options['styles']['hover']['bg'])){
			$this_styles_hover_bg = $options['styles']['hover']['bg'];
		} if(isset($this_styles_hover_bg)){
			$styles_hover_bg = $this_styles_hover_bg;
		}else{
			$styles_hover_bg = $default_styles_hover_bg;
		} if(isset($options['styles']['hover']['border'])){
			$this_styles_hover_border = $options['styles']['hover']['border'];
		} if(isset($this_styles_hover_border)){
			$styles_hover_border = $this_styles_hover_border;
		}else{
			$styles_hover_border = $default_styles_hover_border;
		} if(isset($options['styles']['hover']['color'])){
			$this_styles_hover_color = $options['styles']['hover']['color'];
		} if(isset($this_styles_hover_color)){
			$styles_hover_color = $this_styles_hover_color;
		}else{
			$styles_hover_color = $default_styles_hover_color;
		}
		$default_options = array(
			'submit'        => true,
			'submit_text'   => $this->__('Submit'),
			'id'            => false,
			'class'         => 'mb-form',
			'method'        => 'post',
			'enctype'       => 'multipart/form-data',
			'debug'         => false,
			'fields'        => false,
			'styles'        => array(
				'wrapped'       => $styles_wrapped,
				'fluid'         => $styles_fluid,
				'bg'            => $styles_bg,
				'border'        => $styles_border,
				'color'         => $styles_color,
				'label'         => $styles_label,
				'hover'         => array(
					'bg'            => $styles_hover_bg,
					'border'        => $styles_hover_border,
					'color'         => $styles_hover_color
				)
			)
		);
		if(is_array($options)){
			$settings = array_merge($default_options,$options);
		}else{
			$settings = $default_options;
		} /* MODIFY SETTINGS ARRAY */
		if(isset($settings['styles']['wrapped'])){ }else{ $settings['styles']['wrapped'] = $styles_wrapped; }
		if(isset($settings['styles']['fluid'])){ }else{ $settings['styles']['fluid'] = $styles_fluid; }
		if(isset($settings['styles']['bg'])){ }else{ $settings['styles']['bg'] = $styles_bg; }
		if(isset($settings['styles']['border'])){ }else{ $settings['styles']['border'] = $styles_border; }
		if(isset($settings['styles']['color'])){ }else{ $settings['styles']['color'] = $styles_color; }
		if(isset($settings['styles']['label'])){ }else{ $settings['styles']['label'] = $styles_label; }
		if(isset($settings['styles']['hover']['bg'])){ }else{ $settings['styles']['hover'] = $styles_hover_bg; }
		if(isset($settings['styles']['hover']['border'])){ }else{ $settings['styles']['hover'] = $styles_hover_border; }
		if(isset($settings['styles']['hover']['color'])){ }else{ $settings['styles']['hover'] = $styles_hover_color; }
		return $settings;
	}

	private function form_styles(){
		$settings = $this->form_options;
		ob_start();
		?>
		<style>
		/* TODO: THIS NEEDS TO BE ADDED TO DYNAMIC PHP-BASED CSS STYLESHEET */

		form.<?php echo $settings['class']; ?> div.<?php echo $settings['class']; ?>-field-wrapper {
			vertical-align: top;
			display: inline-block;
			width: 100%;
		}

		form.<?php echo $settings['class']; ?> div.<?php echo $settings['class']; ?>-field-wrapper.half {
			display: inline-block;
			width: 48%;
		}

		form.<?php echo $settings['class']; ?> div.<?php echo $settings['class']; ?>-field-wrapper.third {
			display: inline-block;
			width: 31%;
		}

		form.<?php echo $settings['class']; ?> div.<?php echo $settings['class']; ?>-field-wrapper.thirds {
			display: inline-block;
			width: 65%;
		}

		form.<?php echo $settings['class']; ?> div.<?php echo $settings['class']; ?>-field-wrapper.left {
			padding-right: 2%;
		}

		form.<?php echo $settings['class']; ?> div.<?php echo $settings['class']; ?>-field-wrapper.middle {
			padding-left: 1%;
			padding-right: 1%;
			width: 32%;
		}

		form.<?php echo $settings['class']; ?> div.<?php echo $settings['class']; ?>-field-wrapper.right {
			padding-left: 2%;
		}

		form.<?php echo $settings['class']; ?> div.<?php echo $settings['class']; ?>-field-wrapper.thirds.right {
			padding-left: 1%;
			width: 66%;
		}

		form#<?php echo $settings['id']; ?> .input-wrapper,
		form.<?php echo $settings['class']; ?> .input-wrapper {
			display: block;
			padding: 8px;
			margin: 0 0 25px;
		}
		form#<?php echo $settings['id']; ?> .input-wrapper .blanked,
		form.<?php echo $settings['class']; ?> .input-wrapper .blanked {
			background: transparent;
			border: none;
			border-color: transparent;
			display: block;
			width: 100%;
			padding: 0;
			margin: 0;
		}
		form#<?php echo $settings['id']; ?> label.<?php echo $settings['class']; ?>-label,
		form.<?php echo $settings['class']; ?> label.<?php echo $settings['class']; ?>-label {
			display: block;
			padding: 5px;
			margin: 0 0 5px;
			font-weight: bold;
			color: <?php echo $settings['styles']['label']; ?>;
		}
		form#<?php echo $settings['id']; ?> textarea,
		form.<?php echo $settings['class']; ?> texarea {
			min-height: 85px;
		}

		form#<?php echo $settings['id']; ?> .<?php echo $settings['class']; ?>-submit,
		form.<?php echo $settings['class']; ?> .<?php echo $settings['class']; ?>-submit {
			clear: both;
			display: block;
			margin: 15px 0 25px;
		}

		/* FOR WRAPPED FIELDS ONLY */
		form#<?php echo $settings['id']; ?> .input-wrapper,
		form.<?php echo $settings['class']; ?> .input-wrapper {
			background-color: <?php echo $settings['styles']['bg']; ?>;
			border: <?php echo $settings['styles']['border']; ?>;
			color: <?php echo $settings['styles']['color']; ?>;
		}
		form#<?php echo $settings['id']; ?> .input-wrapper .blanked,
		form.<?php echo $settings['class']; ?> .input-wrapper .blanked {
			color: <?php echo $settings['styles']['color']; ?>;
		}

		/* FOR UN-WRAPPED FIELDS ONLY */
		form#<?php echo $settings['id']; ?> .not-wrapped,
		form.<?php echo $settings['class']; ?> .not-wrapped {
			background-color: <?php echo $settings['styles']['bg']; ?>;
			border: <?php echo $settings['styles']['border']; ?>;
			color: <?php echo $settings['styles']['color']; ?>;
		}

		</style>
		<?php
		$form_styles = ob_get_clean();
		return $form_styles;
	}

	private function textarea($id = false, $class = false, $name = false, $placeholder = false, $required = false, $value = false){
		$textarea = '<textarea id="'.$id.'" class="'.$class.'" name="'.$name.'" placeholder="'.$placeholder.'" autocomplete="off" '.$required.'>'.$value.'</textarea>';
		return $textarea;
	}

	private function select($id = false, $class = false, $name = false, $placeholder = false, $required = false, $value = false, $values = false){
		$selectbox = '<select id="'.$id.'" class="'.$class.'" name="'.$name.'" placeholder="'.$placeholder.'" autocomplete="off" '.$required.' >';
			if((is_array($values))&&(!empty($values))){
				foreach($values as $option_value => $option_label){
					if($option_value==$value){
						$selected = 'selected="selected"';
					}else{
						$selected = false;
					}
					$selectbox.= '<option value="'.$option_value.'" '.$selected.'>'.$option_label.'</option>';
				}
			}
		$selectbox.= '</select>';
		return $selectbox;
	}

	private function textbox($id = false, $class = false, $name = false, $placeholder = false, $required = false, $value = false, $type = false){
		$textbox = '<input type="'.$type.'" id="'.$id.'" class="'.$class.'" name="'.$name.'" value="'.$value.'" placeholder="'.$placeholder.'" autocomplete="off" '.$required.' />';
		return $textbox;
	}

	private function get_field($settings=false,$class=false,$required=false){
		if($settings['type']=='textarea'){
            return $this->textarea($settings['id'], $settings['class'].' not-wrapped '.$class.'-'.$settings['type'], $settings['name'], $settings['placeholder'], $required, $settings['value']);
        }elseif($settings['type']=='email'){
            return $this->textbox($settings['id'], $settings['class'].' not-wrapped '.$class.'-'.$settings['type'], $settings['name'], $settings['placeholder'], $required, $settings['value'], 'email');
        }elseif($settings['type']=='select'){
            return $this->select($settings['id'], $settings['class'].' not-wrapped '.$class.'-'.$settings['type'], $settings['name'], $settings['placeholder'], $required, $settings['value'], $settings['values']);
        }else{
            return $this->textbox($settings['id'], $settings['class'].' not-wrapped '.$class.'-'.$settings['type'], $settings['name'], $settings['placeholder'], $required, $settings['value'], false);
        }
	}

	private function field($field_settings=false,$form_settings=null){
		$settings = $this->field_settings($field_settings, $form_settings);
		if($form_settings===null) $form_settings = $this->form_settings($form_settings);
		$form_class = $form_settings['class'];
		$this_wrap = $settings['this_wrap'];
		if($settings['required']){ $required = 'required="required"'; }else{ $required = false; }
		if($this_wrap){ $settings['class'] = $settings['class'].' blanked'; }
		/* ADD FIELD WRAPPER */
		$field = '<div id="'.$settings['id'].'-wrapper" class="'.$form_class.'-field-wrapper '.$form_class.'-'.$settings['type'].'-wrapper '.$settings['position'].'">';
			/* ADD THE LABEL */
			if($settings['label']){
				$field.= '<label for="'.$settings['id'].'" class="'.$form_class.'-label">'.$settings['label'].'</label>';
			} if($this_wrap){
				$field.= '<span class="input-wrapper">';
			} $field.= $this->get_field($settings,$form_class,$required);
			if($this_wrap){
				$field.= '</span>';
			}
			$field.= '';
		$field.= '</div>';
		return $field;
	}

	public function form($force_refresh = false){

		if(!$force_refresh && $this->FORM!==null) return true;
		
		$settings = $this->form_settings($this->form_options);
		$form = '<form id="'.$settings['id'].'-form" class="'.$settings['class'].'" method="'.$settings['method'].'" enctype="'.$settings['enctype'].'">';
			if($this->is_set($settings['fields'])){
				foreach($settings['fields'] as $key => $field){
					if(empty($field['id'])) $field['id'] = $key;
					if(empty($field['name'])) $field['name'] = $key;
					$form.= $this->field($field, $settings);
				}
			}
			$form.= '<input id="'.$settings['id'].'-submit" class="'.$settings['class'].'-submit" type="submit" value="'.$settings['submit_text'].'" />';
		$form.= '</form>';
		
		$this->FORM = $form;
		return true;
	}

	public function display(){
		print_r($this->form_styles());
		print_r($this->FORM);
	}

	public function get(){
		ob_start();
		$this->display();
		$form = ob_get_clean();
		return $form;
	}

	public function options(){

		if (isset($this->options) && ! empty($this->options)) return $this->options;

		//if($this->construct_set) $this->do_action('form_options',$this);
		$this->do_action('form_options',$this);

		return $this->options;

	}

}
