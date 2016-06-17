<?php
/*
Plugin Name: Visual Composer Modal Popups
Plugin URI: https://brainstormforce.com/demos/modal/
Author: Brainstorm Force
Author URI: https://www.brainstormforce.com
Version: 1.4.3
Description: This is one of the very useful element that can go on any website. Create modal popup boxes and embed anything you wish inside the popup box through easy WYSIWYG editor.
Text Domain: VC_Modals
*/
if(!defined('BSF_MODAL_VERSION')){
	define('BSF_MODAL_VERSION', '1.4.3');
}
if(!class_exists('Ultimate_Modals'))
{
	class Ultimate_Modals
	{
		function __construct()
		{
			// Add shortcode for icon box
			add_shortcode('ultimate_modal', array(&$this, 'modal_shortcode' ) );
			// Initialize the icon box component for Visual Composer
			add_action('admin_init', array( &$this, 'ultimate_modal_init' ) );
			add_action('init',array($this,'init_icon_manager'));
			// Generate param type "icon_manager"
		}
		function init_icon_manager(){
			require_once('Ultimate_Icon_Manager.php');
		}
		// Add shortcode for icon-box
		function modal_shortcode($atts, $content = null)
		{
			wp_enqueue_script('ultimate-modernizr',plugins_url('js/',__FILE__).'modernizr.custom.js',array('jquery'),BSF_MODAL_VERSION);
			//wp_enqueue_script('ultimate-classie',plugins_url('js/',__FILE__).'classie.js',array('jquery'),BSF_MODAL_VERSION);
			//wp_enqueue_script('ultimate-snap-svg',plugins_url('js/',__FILE__).'snap.svg-min.js',array('jquery'),BSF_MODAL_VERSION);
			//wp_enqueue_script('ultimate-modal',plugins_url('js/',__FILE__).'modal.js',array('jquery'),BSF_MODAL_VERSION);
			wp_enqueue_style('ultimate-modal',plugins_url('css/',__FILE__).'modal.css',array(),BSF_MODAL_VERSION);
			wp_enqueue_script('ultimate-modal-all',plugins_url('js/',__FILE__).'modal-all.min.js',array('jquery'),BSF_MODAL_VERSION);

			$icon = $modal_on = $modal_contain = $btn_size = $btn_bg_color = $btn_txt_color = $btn_text = $read_text = $txt_color = $modal_title = $modal_size = $el_class = $modal_style = $icon_type = $icon_img = $btn_img = $overlay_bg_color = $overlay_bg_opacity = $modal_on_align = $content_bg_color = $content_text_color = $header_bg_color = $header_text_color = $modal_border_style = $modal_border_width = $modal_border_color = $modal_border_radius = '';
			extract(shortcode_atts(array(
				'icon_type' => 'none',
				'icon' => '',
				'icon_img' => '',
				'modal_on' => 'button',
				'modal_on_selector' => '',
				'modal_contain' => 'ult-html',
				'onload_delay'=>'2',
				'btn_size' => 'sm',
				'overlay_bg_color' => '#333333',
				'overlay_bg_opacity' => '80',
				'btn_bg_color' => '#333333',
				'btn_txt_color' => '#FFFFFF',
				'btn_text' => '',
				'read_text' => '',
				'txt_color' => '#f60f60',
				'btn_img' => '',
				'modal_title' => '',
				'modal_size' => 'small',
				'modal_style' => 'overlay-cornerbottomleft',
				'content_bg_color' => '',
				'content_text_color' => '',
				'header_bg_color' => '',
				'header_text_color' => '#333333',
				'modal_on_align' => 'center',
				'modal_border_style' => '',
				'modal_border_width' => '2',
				'modal_border_color' => '#333333',
				'modal_border_radius' => '',
				'el_class' => '',
				),$atts,'ultimate_modal'));
			$vc_version = (defined('WPB_VC_VERSION')) ? WPB_VC_VERSION : 0;
			$is_vc_49_plus = (version_compare(4.9, $vc_version, '<=')) ? 'ult-adjust-bottom-margin' : '';

			$html = $style = $box_icon = $modal_class = $modal_data_class = $uniq = $overlay_bg = $content_style = $header_style = $border_style = '';
			if($modal_on == "ult-button"){
				$modal_on = "button";
			}
			// Create style for content background color
			if($content_bg_color !== '')
				$content_style .= 'background:'.$content_bg_color.';';
			// Create style for content text color
			if($content_text_color !== '')
				$content_style .= 'color:'.$content_text_color.';';
			// Create style for header background color
			if($header_bg_color !== '')
				$header_style .= 'background:'.$header_bg_color.';';
			// Create style for header text color
			if($header_text_color !== '')
				$header_style .= 'color:'.$header_text_color.';';
			if($modal_border_style !== ''){
				$border_style .= 'border-style:'.$modal_border_style.';';
				$border_style .= 'border-width:'.$modal_border_width.'px;';
				$border_style .= 'border-radius:'.$modal_border_radius.'px;';
				$border_style .= 'border-color:'.$modal_border_color.';';
				$header_style .= 'border-color:'.$modal_border_color.';';
			}
			$overlay_bg_opacity = ($overlay_bg_opacity/100);
			if($overlay_bg_color !== ''){
				if(strlen($overlay_bg_color) <= 7)
					$overlay_bg = ultimate_hex2rgb($overlay_bg_color,$overlay_bg_opacity);
				else
					$overlay_bg = $overlay_bg_color;

				if($modal_style != 'overlay-show-cornershape' && $modal_style != 'overlay-show-genie' && $modal_style != 'overlay-show-boxes'){
					$overlay_bg = 'background:'.$overlay_bg.';';
				} else {
					$overlay_bg = 'fill:'.$overlay_bg.';';
				}
			}

			$uniq = uniqid();
			if($icon_type == 'custom'){
				$ico_img = wp_get_attachment_image_src( $icon_img, 'large');
				$box_icon = '<div class="modal-icon"><img src="'.$ico_img[0].'" class="ult-modal-inside-img"></div>';
			} elseif($icon_type == 'selector'){
				if($icon !== '')
					$box_icon = '<div class="modal-icon"><i class="'.$icon.'"></i></div>';
			}
			if($modal_style != 'overlay-show-cornershape' && $modal_style != 'overlay-show-genie' && $modal_style != 'overlay-show-boxes'){
				$modal_class = 'overlay-show';
				$modal_data_class = 'data-overlay-class="'.$modal_style.'"';
			} else {
				$modal_class = $modal_style;
				$modal_data_class = '';
			}
			if($modal_on != "custom-selector") {
				$html .= '<div class="ult-modal-input-wrapper '.$is_vc_49_plus.' '.$init_extra_class.'">';
			}
			if($modal_on == "button"){
				if($btn_bg_color !== ''){
					$style .= 'background:'.$btn_bg_color.';';
					$style .= 'border-color:'.$btn_bg_color.';';
				}
				if($btn_txt_color !== ''){
					$style .= 'color:'.$btn_txt_color.';';
				}
				if($el_class != '')
					$modal_class .= ' '.$el_class.'-button ';

				$html .= '<button style="'.$style.'" data-class-id="content-'.$uniq.'" class="btn-modal btn-primary btn-modal-'.$btn_size.' '.$modal_class.' ult-align-'.$modal_on_align.'" '.$modal_data_class.'>'.$btn_text.'</button>';
			} elseif($modal_on == "image"){
				if($btn_img !==''){
					if($el_class != '')
						$modal_class .= ' '.$el_class.'-image ';
					$img = wp_get_attachment_image_src( $btn_img, 'large');
					$html .= '<img src="'.$img[0].'" data-class-id="content-'.$uniq.'" class="ult-modal-img '.$modal_class.' ult-align-'.$modal_on_align.' ult-modal-image-'.$el_class.'" '.$modal_data_class.'/>';
				}
			}
			elseif($modal_on == "onload"){
				$html .= '<div data-class-id="content-'.$uniq.'" class="ult-onload '.$modal_class.' " '.$modal_data_class.' data-onload-delay="'.$onload_delay.'"></div>';
			}
			elseif($modal_on == "custom-selector") {
				$html .= '<script type="text/javascript">
				(function($){
					$(document).ready(function(){
						var selector = "'.$modal_on_selector.'";
						$(selector).addClass("custom-ult-modal '.$modal_class.'");
						$(selector).attr("data-class-id", "content-'.$uniq.'");
						$(selector).attr("data-overlay-class", "'.$modal_style.'");
					});
				})(jQuery);
				</script>';
			}
			else {
				if($txt_color !== ''){
					$style .= 'color:'.$txt_color.';';
					$style .= 'cursor:pointer;';
				}
				if($el_class != '')
					$modal_class .= ' '.$el_class.'-link ';
				$html .= '<span style="'.$style.'" data-class-id="content-'.$uniq.'" class="'.$modal_class.' ult-align-'.$modal_on_align.'" '.$modal_data_class.'>'.$read_text.'</span>';
			}
			if($modal_on != "custom-selector") {
				$html .= '</div>';
			}
			if($modal_style == 'overlay-show-cornershape') {
				$html .= "\n".'<div class="ult-overlay overlay-cornershape content-'.$uniq.' '.$el_class.'" style="display:none" data-class="content-'.$uniq.'" data-path-to="m 0,0 1439.999975,0 0,805.99999 -1439.999975,0 z">';
            	$html .= "\n\t".'<svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 1440 806" preserveAspectRatio="none">
                					<path class="overlay-path" d="m 0,0 1439.999975,0 0,805.99999 0,-805.99999 z" style="'.$overlay_bg.'"/>
            					</svg>';
			} elseif($modal_style == 'overlay-show-genie') {
				$html .= "\n".'<div class="ult-overlay overlay-genie content-'.$uniq.' '.$el_class.'" style="display:none" data-class="content-'.$uniq.'" data-steps="m 701.56545,809.01175 35.16718,0 0,19.68384 -35.16718,0 z;m 698.9986,728.03569 41.23353,0 -3.41953,77.8735 -34.98557,0 z;m 687.08153,513.78234 53.1506,0 C 738.0505,683.9161 737.86917,503.34193 737.27015,806 l -35.90067,0 c -7.82727,-276.34892 -2.06916,-72.79261 -14.28795,-292.21766 z;m 403.87105,257.94772 566.31246,2.93091 C 923.38284,513.78233 738.73561,372.23931 737.27015,806 l -35.90067,0 C 701.32034,404.49318 455.17312,480.07689 403.87105,257.94772 z;M 51.871052,165.94772 1362.1835,168.87863 C 1171.3828,653.78233 738.73561,372.23931 737.27015,806 l -35.90067,0 C 701.32034,404.49318 31.173122,513.78234 51.871052,165.94772 z;m 52,26 1364,4 c -12.8007,666.9037 -273.2644,483.78234 -322.7299,776 l -633.90062,0 C 359.32034,432.49318 -6.6979288,733.83462 52,26 z;m 0,0 1439.999975,0 0,805.99999 -1439.999975,0 z">';
				$html .= "\n\t".'<svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 1440 806" preserveAspectRatio="none">
							<path class="overlay-path" d="m 701.56545,809.01175 35.16718,0 0,19.68384 -35.16718,0 z" style="'.$overlay_bg.'"/>
						</svg>';
			} elseif($modal_style == 'overlay-show-boxes') {
				$html .= "\n".'<div class="ult-overlay overlay-boxes content-'.$uniq.' '.$el_class.'" style="display:none" data-class="content-'.$uniq.'">';
				$html .= "\n\t".'<svg xmlns="http://www.w3.org/2000/svg" width="100%" height="101%" viewBox="0 0 1440 806" preserveAspectRatio="none">';
				$html .= "\n\t\t".'<path d="m0.005959,200.364029l207.551124,0l0,204.342453l-207.551124,0l0,-204.342453z" style="'.$overlay_bg.'"/>';
				$html .= "\n\t\t".'<path d="m0.005959,400.45401l207.551124,0l0,204.342499l-207.551124,0l0,-204.342499z" style="'.$overlay_bg.'"/>';
				$html .= "\n\t\t".'<path d="m0.005959,600.544067l207.551124,0l0,204.342468l-207.551124,0l0,-204.342468z" style="'.$overlay_bg.'"/>';
				$html .= "\n\t\t".'<path d="m205.752151,-0.36l207.551163,0l0,204.342437l-207.551163,0l0,-204.342437z" style="'.$overlay_bg.'"/>';
				$html .= "\n\t\t".'<path d="m204.744629,200.364029l207.551147,0l0,204.342453l-207.551147,0l0,-204.342453z" style="'.$overlay_bg.'"/>';
				$html .= "\n\t\t".'<path d="m204.744629,400.45401l207.551147,0l0,204.342499l-207.551147,0l0,-204.342499z" style="'.$overlay_bg.'"/>';
				$html .= "\n\t\t".'<path d="m204.744629,600.544067l207.551147,0l0,204.342468l-207.551147,0l0,-204.342468z" style="'.$overlay_bg.'"/>';
				$html .= "\n\t\t".'<path d="m410.416046,-0.36l207.551117,0l0,204.342437l-207.551117,0l0,-204.342437z" style="'.$overlay_bg.'"/>';
				$html .= "\n\t\t".'<path d="m410.416046,200.364029l207.551117,0l0,204.342453l-207.551117,0l0,-204.342453z" style="'.$overlay_bg.'"/>';
				$html .= "\n\t\t".'<path d="m410.416046,400.45401l207.551117,0l0,204.342499l-207.551117,0l0,-204.342499z" style="'.$overlay_bg.'"/>';
				$html .= "\n\t\t".'<path d="m410.416046,600.544067l207.551117,0l0,204.342468l-207.551117,0l0,-204.342468z" style="'.$overlay_bg.'"/>';
				$html .= "\n\t\t".'<path d="m616.087402,-0.36l207.551086,0l0,204.342437l-207.551086,0l0,-204.342437z" style="'.$overlay_bg.'"/>';
				$html .= "\n\t\t".'<path d="m616.087402,200.364029l207.551086,0l0,204.342453l-207.551086,0l0,-204.342453z" style="'.$overlay_bg.'"/>';
				$html .= "\n\t\t".'<path d="m616.087402,400.45401l207.551086,0l0,204.342499l-207.551086,0l0,-204.342499z" style="'.$overlay_bg.'"/>';
				$html .= "\n\t\t".'<path d="m616.087402,600.544067l207.551086,0l0,204.342468l-207.551086,0l0,-204.342468z" style="'.$overlay_bg.'"/>';
				$html .= "\n\t\t".'<path d="m821.748718,-0.36l207.550964,0l0,204.342437l-207.550964,0l0,-204.342437z" style="'.$overlay_bg.'"/>';
				$html .= "\n\t\t".'<path d="m821.748718,200.364029l207.550964,0l0,204.342453l-207.550964,0l0,-204.342453z" style="'.$overlay_bg.'"/>';
				$html .= "\n\t\t".'<path d="m821.748718,400.45401l207.550964,0l0,204.342499l-207.550964,0l0,-204.342499z" style="'.$overlay_bg.'"/>';
				$html .= "\n\t\t".'<path d="m821.748718,600.544067l207.550964,0l0,204.342468l-207.550964,0l0,-204.342468z" style="'.$overlay_bg.'"/>';
				$html .= "\n\t\t".'<path d="m1027.203979,-0.36l207.550903,0l0,204.342437l-207.550903,0l0,-204.342437z" style="'.$overlay_bg.'"/>';
				$html .= "\n\t\t".'<path d="m1027.203979,200.364029l207.550903,0l0,204.342453l-207.550903,0l0,-204.342453z" style="'.$overlay_bg.'"/>';
				$html .= "\n\t\t".'<path d="m1027.203979,400.45401l207.550903,0l0,204.342499l-207.550903,0l0,-204.342499z" style="'.$overlay_bg.'"/>';
				$html .= "\n\t\t".'<path d="m1027.203979,600.544067l207.550903,0l0,204.342468l-207.550903,0l0,-204.342468z" style="'.$overlay_bg.'"/>';
				$html .= "\n\t\t".'<path d="m1232.659302,-0.36l207.551147,0l0,204.342437l-207.551147,0l0,-204.342437z" style="'.$overlay_bg.'"/>';
				$html .= "\n\t\t".'<path d="m1232.659302,200.364029l207.551147,0l0,204.342453l-207.551147,0l0,-204.342453z" style="'.$overlay_bg.'"/>';
				$html .= "\n\t\t".'<path d="m1232.659302,400.45401l207.551147,0l0,204.342499l-207.551147,0l0,-204.342499z" style="'.$overlay_bg.'"/>';
				$html .= "\n\t\t".'<path d="m1232.659302,600.544067l207.551147,0l0,204.342468l-207.551147,0l0,-204.342468z" style="'.$overlay_bg.'"/>';
				$html .= "\n\t\t".'<path d="m-0.791443,-0.360001l207.551163,0l0,204.342438l-207.551163,0l0,-204.342438z" style="'.$overlay_bg.'"/>';
				$html .= "\n\t".'</svg>';
			} else {
				$html .= "\n".'<div class="ult-overlay content-'.$uniq.' '.$el_class.'" data-class="content-'.$uniq.'" id="button-click-overlay" style="'.$overlay_bg.' display:none;">';
			}
			$html .= "\n\t".'<div class="ult_modal ult-fade ult-'.$modal_size.'">';
			$html .= "\n\t\t".'<div class="ult_modal-content" style="'.$border_style.'">';
			if($modal_title !== ''){
				$html .= "\n\t\t\t".'<div class="ult_modal-header" style="'.$header_style.'">';
				$html .= "\n\t\t\t\t".$box_icon.'<h3 class="ult_modal-title">'.$modal_title.'</h3>';
				$html .= "\n\t\t\t".'</div>';
			}
			$html .= "\n\t\t\t".'<div class="ult_modal-body '.$modal_contain.'" style="'.$content_style.'">';
			$html .= "\n\t\t\t".do_shortcode($content);
			$html .= "\n\t\t\t".'</div>';
			$html .= "\n\t".'</div>';
			$html .= "\n\t".'</div>';
			$html .= "\n\t".'<div class="ult-overlay-close">Close</div>';
			$html .= "\n".'</div>';
			return $html;
		}
		/* Add icon box Component*/
		function ultimate_modal_init()
		{
			if ( function_exists('vc_map'))
			{
				vc_map(
					array(
						"name"		=> __("Modal Box", "VC_Modals"),
						"base"		=> "ultimate_modal",
						"icon"		=> "vc_modal_box",
						"class"	   => "modal_box",
						"category"  => __("Content", "VC_Modals"),
						"description" => __("Adds bootstrap modal box in your content", "VC_Modals"),
						"controls" => "full",
						"show_settings_on_create" => true,
						"params" => array(
							array(
								"type" => "dropdown",
								"class" => "",
								"heading" => __("Icon to display:", "VC_Modals"),
								"param_name" => "icon_type",
								"value" => array(
									"No Icon" => "none",
									"Font Icon Manager" => "selector",
									"Custom Image Icon" => "custom",
								),
								"description" => __("Use <a href='admin.php?page=Font_Icon_Manager' target='_blank'>existing font icon</a> or upload a custom image.", "VC_Modals")
							),
							array(
								"type" => "icon_manager",
								"class" => "",
								"heading" => __("Select Icon ","smile"),
								"param_name" => "icon",
								"value" => "",
								"description" => __("Click and select icon of your choice. If you can't find the one that suits for your purpose, you can <a href='admin.php?page=AIO_Icon_Manager' target='_blank'>add new here</a>.", "VC_Modals"),
								"dependency" => Array("element" => "icon_type","value" => array("selector")),
							),
							array(
								"type" => "attach_image",
								"class" => "",
								"heading" => __("Upload Image Icon:", "VC_Modals"),
								"param_name" => "icon_img",
								"admin_label" => true,
								"value" => "",
								"description" => __("Upload the custom image icon.", "VC_Modals"),
								"dependency" => Array("element" => "icon_type","value" => array("custom")),
							),
							// Modal Title
							array(
								"type" => "textfield",
								"class" => "",
								"heading" => __("Modal Box Title", "VC_Modals"),
								"param_name" => "modal_title",
								"value" => "",
								"description" => __("Provide the title for modal box.", "VC_Modals"),
							),
							// Add some description
							array(
								"type" => "textarea_html",
								"class" => "",
								"heading" => __("Modal Content", "VC_Modals"),
								"param_name" => "content",
								"value" => "",
								"description" => __("Provide the description for this icon box.", "VC_Modals")
							),
							array(
								"type" => "dropdown",
								"class" => "",
								"heading" => __("What's in Modal Popup?", "smile"),
								"param_name" => "modal_contain",
								"value" => array(
									"Miscellaneous Things" => "ult-html",
									"Youtube Video" => "ult-youtube",
									"Vimeo Video" => "ult-vimeo",
								),
								"description" => ""
							),
							array(
								"type" => "dropdown",
								"class" => "",
								"heading" => __("Display Modal On -", "VC_Modals"),
								"param_name" => "modal_on",
								"value" => array(
									"Button" => "button",
									"Image" => "image",
									"Text" => "text",
									"On Page Load" => "onload",
									"Selector" => "custom-selector"
								),
								"description" => __("Selector the targer selector for modal", "VC_Modals")
							),
							array(
								"type" => "textfield",
								"heading" => __("Class and/or ID", "ultimate_vc"),
								"param_name" => "modal_on_selector",
								"description" => __("Add .Class and/or #ID to open your modal. Multiple ID or Classes separated by comma","ultimate_vc"),
								"value" => "",
								"dependency"=>Array("element"=>"modal_on","value"=>array("custom-selector")),
							),
							array(
								"type"=>"number",
								"class"=>'',
								"heading"=>"Delay in Popup Display",
								"param_name"=>"onload_delay",
								"value"=>"2",
								"suffix"=>"seconds",
								"description"=>__("Time delay before modal popup on page load (in seconds)","smile"),
								"dependency"=>Array("element"=>"modal_on","value"=>array("onload"))
							),
							array(
								"type" => "attach_image",
								"class" => "",
								"heading" => __("Upload Image", "VC_Modals"),
								"param_name" => "btn_img",
								"admin_label" => true,
								"value" => "",
								"description" => __("Upload the custom image / image banner.", "VC_Modals"),
								"dependency" => Array("element" => "modal_on","value" => array("image")),
							),
							array(
								"type" => "dropdown",
								"class" => "",
								"heading" => __("Button Size", "VC_Modals"),
								"param_name" => "btn_size",
								"value" => array(
									"Small" => "sm",
									"Medium" => "md",
									"Large" => "lg",
									"Block" => "block",
								),
								"description" => __("How big the button would you like?", "VC_Modals"),
								"dependency" => Array("element" => "modal_on","value" => array("button")),
							),
							array(
								"type" => "colorpicker",
								"class" => "",
								"heading" => __("Button Background Color", "VC_Modals"),
								"param_name" => "btn_bg_color",
								"value" => "#333333",
								"description" => __("Give it a nice paint!", "VC_Modals"),
								"dependency" => Array("element" => "modal_on","value" => array("button")),
							),
							array(
								"type" => "colorpicker",
								"class" => "",
								"heading" => __("Button Text Color", "VC_Modals"),
								"param_name" => "btn_txt_color",
								"value" => "#FFFFFF",
								"description" => __("Give it a nice paint!", "VC_Modals"),
								"dependency" => Array("element" => "modal_on","value" => array("button")),
							),
							array(
								"type" => "dropdown",
								"class" => "",
								"heading" => __("Alignment", "VC_Modals"),
								"param_name" => "modal_on_align",
								"value" => array(
									"Center" => "center",
									"Left" => "left",
									"Right" => "right",
								),
								"description" => __("Selector the alignment of button/text/image", "VC_Modals"),
								"dependency" => Array("element" => "modal_on","value" => array("button","image","text")),
							),
							array(
								"type" => "textfield",
								"class" => "",
								"heading" => __("Text on Button", "VC_Modals"),
								"param_name" => "btn_text",
								"admin_label" => true,
								"value" => "",
								"description" => __("Provide the title for this button.", "VC_Modals"),
								"dependency" => Array("element" => "modal_on","value" => array("button")),
							),
							// Custom text for modal trigger
							array(
								"type" => "textfield",
								"class" => "",
								"heading" => __("Enter Text", "VC_Modals"),
								"param_name" => "read_text",
								"value" => "",
								"description" => __("Enter the text on which the modal box will be triggered.", "VC_Modals"),
								"dependency" => Array("element" => "modal_on","value" => array("text")),
							),
							array(
								"type" => "colorpicker",
								"class" => "",
								"heading" => __("Text Color", "VC_Modals"),
								"param_name" => "txt_color",
								"value" => "#f60f60",
								"description" => __("Give it a nice paint!", "VC_Modals"),
								"dependency" => Array("element" => "modal_on","value" => array("text")),
							),
							// Modal box size
							array(
								"type" => "dropdown",
								"class" => "",
								"heading" => __("Modal Size", "VC_Modals"),
								"param_name" => "modal_size",
								"value" => array(
									"Small" => "small",
									"Medium" => "medium",
									"Large" => "container",
									"Block" => "block",
								),
								"description" => __("How big the modal box would you like?", "VC_Modals"),
							),
							// Modal Style
							array(
								"type" => "dropdown",
								"class" => "",
								"heading" => "Modal Box Style",
								"param_name" => "modal_style",
								"value" => array(
									"Corner Bottom Left" => "overlay-cornerbottomleft",
									"Corner Bottom Right" => "overlay-cornerbottomright",
									"Corner Top Left" => "overlay-cornertopleft",
									"Corner Top Right" => "overlay-cornertopright",
									"Corner Shape" => "overlay-show-cornershape",
									"Door Horizontal" => "overlay-doorhorizontal",
									"Door Vertical" => "overlay-doorvertical",
									"Fade" => "overlay-fade",
									"Genie" => "overlay-show-genie",
									"Little Boxes" => "overlay-show-boxes",
									"Simple Genie" => "overlay-simplegenie",
									"Slide Down" => "overlay-slidedown",
									"Slide Up" => "overlay-slideup",
									"Slide Left" => "overlay-slideleft",
									"Slide Right" => "overlay-slideright",
									"Zoom in" => "overlay-zoomin",
									"Zoom out" => "overlay-zoomout",
								),
							),
							array(
								"type" => "colorpicker",
								"class" => "",
								"heading" => __("Overlay Background Color", "VC_Modals"),
								"param_name" => "overlay_bg_color",
								"value" => "#333333",
								"description" => __("Give it a nice paint!", "VC_Modals"),
							),
							/*
							* Deprecated option
							*
							array(
								"type" => "number",
								"class" => "",
								"heading" => __("Overlay Background Opacity", "VC_Modals"),
								"param_name" => "overlay_bg_opacity",
								"value" => 80,
								"min" => 10,
								"max" => 100,
								"suffix" => "%",
								"description" => __("Select opacity of overlay background.", "VC_Modals"),
							),
							*/
							array(
								"type" => "colorpicker",
								"class" => "",
								"heading" => __("Content Background Color", "VC_Modals"),
								"param_name" => "content_bg_color",
								"value" => "",
								"description" => __("Give it a nice paint!", "VC_Modals"),
							),
							array(
								"type" => "colorpicker",
								"class" => "",
								"heading" => __("Content Text Color", "VC_Modals"),
								"param_name" => "content_text_color",
								"value" => "",
								"description" => __("Give it a nice paint!", "VC_Modals"),
							),
							array(
								"type" => "colorpicker",
								"class" => "",
								"heading" => __("Header Background Color", "VC_Modals"),
								"param_name" => "header_bg_color",
								"value" => "",
								"description" => __("Give it a nice paint!", "VC_Modals"),
							),
							array(
								"type" => "colorpicker",
								"class" => "",
								"heading" => __("Header Text Color", "VC_Modals"),
								"param_name" => "header_text_color",
								"value" => "#333333",
								"description" => __("Give it a nice paint!", "VC_Modals"),
							),
							// Modal box size
							array(
								"type" => "dropdown",
								"class" => "",
								"heading" => __("Modal Box Border", "VC_Modals"),
								"param_name" => "modal_border_style",
								"value" => array(
									"None" => "",
									"Solid" => "solid",
									"Double" => "double",
									"Dashed" => "dashed",
									"Dotted" => "dotted",
									"Inset" => "inset",
									"Outset" => "outset",
								),
								"description" => __("Do you want to give border to the modal content box?", "VC_Modals"),
							),
							array(
								"type" => "number",
								"class" => "",
								"heading" => __("Border Width", "VC_Modals"),
								"param_name" => "modal_border_width",
								"value" => 2,
								"min" => 1,
								"max" => 25,
								"suffix" => "px",
								"description" => __("Select size of border.", "VC_Modals"),
								"dependency" => Array("element" => "modal_border_style","not_empty" => true),
							),
							array(
								"type" => "colorpicker",
								"class" => "",
								"heading" => __("Border Color", "VC_Modals"),
								"param_name" => "modal_border_color",
								"value" => "#333333",
								"description" => __("Give it a nice paint!", "VC_Modals"),
								"dependency" => Array("element" => "modal_border_style","not_empty" => true),
							),
							array(
								"type" => "number",
								"class" => "",
								"heading" => __("Border Radius", "VC_Modals"),
								"param_name" => "modal_border_radius",
								"value" => 0,
								"min" => 1,
								"max" => 500,
								"suffix" => "px",
								"description" => __("Want to shape the modal content box?.", "VC_Modals"),
								"dependency" => Array("element" => "modal_border_style","not_empty" => true),
							),
							// Customize everything
							array(
								"type" => "textfield",
								"class" => "",
								"heading" => __("Extra Class", "VC_Modals"),
								"param_name" => "el_class",
								"value" => "",
								"description" => __("Add extra class name that will be applied to the icon box, and you can use this class for your customizations.", "VC_Modals"),
							),
						) // end params array
					) // end vc_map array
				); // end vc_map
			} // end function check 'vc_map'
		}// end function icon_box_init
		function hex2rgb($hex) {
		   $hex = str_replace("#", "", $hex);

		   if(strlen($hex) == 3) {
			  $r = hexdec(substr($hex,0,1).substr($hex,0,1));
			  $g = hexdec(substr($hex,1,1).substr($hex,1,1));
			  $b = hexdec(substr($hex,2,1).substr($hex,2,1));
		   } else {
			  $r = hexdec(substr($hex,0,2));
			  $g = hexdec(substr($hex,2,2));
			  $b = hexdec(substr($hex,4,2));
		   }
		   $rgb = array($r, $g, $b);
		   //return implode(",", $rgb); // returns the rgb values separated by commas
		   return $rgb; // returns an array with the rgb values
		}
	}//Class Ultimate_Modals end
	new Ultimate_Modals;
}

if(!function_exists('ultimate_hex2rgb')){
	function ultimate_hex2rgb($hex,$opacity=1) {
	   $hex = str_replace("#", "", $hex);
	   if(strlen($hex) == 3) {
		  $r = hexdec(substr($hex,0,1).substr($hex,0,1));
		  $g = hexdec(substr($hex,1,1).substr($hex,1,1));
		  $b = hexdec(substr($hex,2,1).substr($hex,2,1));
	   } else {
		  $r = hexdec(substr($hex,0,2));
		  $g = hexdec(substr($hex,2,2));
		  $b = hexdec(substr($hex,4,2));
	   }
	   $rgba = 'rgba('.$r.','.$g.','.$b.','.$opacity.')';
	   //return implode(",", $rgb); // returns the rgb values separated by commas
	   return $rgba; // returns an array with the rgb values
	}
}
// bsf core
add_action('init','load_bsf_core');
if(!function_exists('load_bsf_core')) {
	function load_bsf_core() {
		include_once realpath(dirname(__FILE__)).'/admin/bsf-core/index.php';
	}
}
// BSF CORE commom functions
if(!function_exists('bsf_get_option')) {
	function bsf_get_option($request = false) {
		$bsf_options = get_option('bsf_options');
		if(!$request)
			return $bsf_options;
		else
			return (isset($bsf_options[$request])) ? $bsf_options[$request] : false;
	}
}
if(!function_exists('bsf_update_option')) {
	function bsf_update_option($request, $value) {
		$bsf_options = get_option('bsf_options');
		$bsf_options[$request] = $value;
		return update_option('bsf_options', $bsf_options);
	}
}
add_action( 'wp_ajax_bsf_dismiss_notice', 'bsf_dismiss_notice');
if(!function_exists('bsf_dismiss_notice')) {
	function bsf_dismiss_notice() {
		$notice = $_POST['notice'];
		$x = bsf_update_option($notice, true);
		echo ($x) ? true : false;
		die();
	}
}

add_action('admin_init', 'bsf_core_check',10);
if(!function_exists('bsf_core_check')) {
	function bsf_core_check() {
		if(!defined('BSF_CORE')) {
			if(!bsf_get_option('hide-bsf-core-notice'))
				add_action( 'admin_notices', 'bsf_core_admin_notice' );
		}
	}
}

if(!function_exists('bsf_core_admin_notice')) {
	function bsf_core_admin_notice() {
		?>
		<script type="text/javascript">
		(function($){
			$(document).ready(function(){
				$(document).on( "click", ".bsf-notice", function() {
					var bsf_notice_name = $(this).attr("data-bsf-notice");
				    $.ajax({
				        url: ajaxurl,
				        method: 'POST',
				        data: {
				            action: "bsf_dismiss_notice",
				            notice: bsf_notice_name
				        },
				        success: function(response) {
				        	console.log(response);
				        }
				    })
				})
			});
		})(jQuery);
		</script>
		<div class="bsf-notice update-nag notice is-dismissible" data-bsf-notice="hide-bsf-core-notice">
            <p><?php _e( 'License registration and extensions are not part of plugin/theme anymore. Kindly download and install "BSF CORE" plugin to manage your licenses and extensins.', 'bsf' ); ?></p>
        </div>
		<?php
	}
}

if(isset($_GET['hide-bsf-core-notice']) && $_GET['hide-bsf-core-notice'] === 're-enable') {
	$x = bsf_update_option('hide-bsf-core-notice', false);
}

// end of common functions
