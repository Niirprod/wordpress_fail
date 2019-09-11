<?php
/**
 * Post Related Functions.
 *
 * @subpackage million-shades
 * @since   1.0.0
 */
 
 if ( ! defined( 'ABSPATH' ) ) {
	exit;
}




function million_shades_author_detail(){
	
	$title ='';
	$subtitle ='';
	$image_url ='';
	$social_url = array();
	$social_icon = array();
	
	$author_image_page = get_post_meta( get_the_ID(), 'author_image_page', true );
	
	if ($author_image_page != '0'){
			$slide1_content = million_shades_page_select($author_image_page);
		
	
			$title = $slide1_content[0];
			$subtitle = $slide1_content[1];
			$image_url = $slide1_content[2];
			$social_url = $slide1_content[3];
			$social_icon = $slide1_content[4];
		
	}

		$cta_styles = '';
		$image_styles = '';
	
            $image_styles .= 'float:left; ';
			$image_styles .= 'margin-right:15px; ';
			$image_styles .= 'position:relative; ';
			$cta_styles .= 'position:relative; ';
			$cta_styles .= 'text-align:left; ';
	$image_styles .= "height:100px;width:100px;border-radius:50%";
		
	 ?>
	<div class="post-author-box" >
	
				<?php if ($image_url){ ?>
					<a href="" target="_self" >
						<img   alt="Image Box" src="<?php echo esc_url($image_url); ?>" style="<?php echo esc_attr($image_styles) ?>" /></a>
				<?php } ?>
	
				<div class="post-author-cta" style="<?php echo esc_attr($cta_styles) ?>">
					<?php if ($title){ ?>
						<h4 class="nl-widget-title"><?php echo esc_html($title); ?></h4>
					<?php } ?>	
					<?php if ($subtitle){ ?>
						<span class="nl-widget-sub-title"><?php echo esc_html($subtitle);?></span>
					<?php } ?>	
			
						
				</div>
				
				<div class="single-post-social">
					<?php   for ( $i = 0; $i < 4; $i ++ ) {
					
					?>
										
					<a target="_blank" href="<?php echo esc_url($social_url[$i] ); ?>">
										
						<div class="icon" >
										
							<span class="fa fa-<?php echo esc_attr($social_icon[$i]); ?>"></span>
										
						</div>
										
					</a>
										
	        	
										
	    <?php	} ?> <!-- End For Loop -->
			    </div>
		
   
	</div>
<?php
}

function million_shades_post_social(){
	?>
	<div class="blog-post-social">
					<?php   for ( $i = 1; $i <= 4; $i ++ ) {
					$social_url='';
					$social_icon ='';
					$social_url = get_post_meta( get_the_ID(), 'post_social_url'.$i, true );
					$social_icon = get_post_meta( get_the_ID(), 'post_social_icon'.$i, true );
							
							
					if($social_url && $social_icon){ 
										?>
										
					<a target="_blank" href="<?php echo esc_url($social_url ); ?>">
										
						<div class="icon" >
										
							<span class="fa fa-<?php echo esc_attr($social_icon); ?>"></span>
										
						</div>
										
					</a>
										
	        	<?php 
	        	} ?><!-- End IF -->
										
	    <?php	} ?> <!-- End For Loop -->
			    </div>
				
				  <?php
}

function million_shades_post_featured_items(){

	$style = '';

	?>

	<div class="nl_grid_row ms-feature-grid col_gap_30">
		<?php for($i=1; $i<4; $i++) {?>
		
			<?php 	$feature_item_url = get_theme_mod('feature-item-url'.$i); ?>
			<div class="nl-feature-entry no_of_col_3 col_no_<?php echo esc_attr($i);  ?> col_padd_margin" style="position:relative;">
			
				<div class="feature_blog_border_style <?php echo esc_attr( $style );  ?> clear" style="position:absolute;">
					
				
				
							<?php 	$ft_post_title = get_theme_mod('post_feature_title'.$i,'Featured Title of Item'.$i);?>
						<a href="<?php echo esc_url($feature_item_url); ?>" target="_self" >		 
						<h6 class="feature-page-title"><?php echo esc_html($ft_post_title); ?></h6>
						</a>
				</div> 
				
				<div class="feature-media">
				<?php 	
				
			
				$featured_item_image = get_theme_mod('featured-item-image'.$i);
				?>
				
					<a href="<?php echo esc_url($feature_item_url); ?>" target="_self" >
						<img alt="feature image" src="<?php echo esc_url($featured_item_image); ?>"  />
					</a>
					
				</div>
			
			</div> 
		<?php } ?>
	</div>
	
	<?php 
}

function million_shades_header_media_slide_overlay(){
	
		$slide1_image_url = '';
		$slide2_image_url = '';
		$slide3_image_url = '';
		$slide4_image_url = '';
		
		$slide1_title = '';
		$slide1_subtitle = '';
		
		$slide2_title = '';
		$slide2_subtitle = '';
		
		$slide1_image_page = get_theme_mod('page-selection-slide1');
		$slide2_image_page = get_theme_mod('page-selection-slide2');
		$slide3_image_page = get_theme_mod('page-selection-slide3');
		$slide4_image_page = get_theme_mod('page-selection-slide4');
		
		
		if ($slide1_image_page != ''){
			$slide1_content = million_shades_page_select($slide1_image_page);
		
	
			$slide1_title = $slide1_content[0];
			$slide1_subtitle = $slide1_content[1];
			$slide1_image_url = $slide1_content[2];
		
		}
		
		if ($slide2_image_page != ''){
			$slide2_content = million_shades_page_select($slide2_image_page);
		
			$slide2_title = $slide2_content[0];
			$slide2_subtitle = $slide2_content[1];
			$slide2_image_url = $slide2_content[2];
		}
		
		
		if ($slide3_image_page != ''){
			$slide3_content = million_shades_page_select($slide3_image_page);
			$slide3_title = $slide3_content[0];
			$slide3_subtitle = $slide3_content[1];
			$slide3_image_url = $slide3_content[2];
		}
		
		if ($slide4_image_page != ''){
			$slide4_content = million_shades_page_select($slide4_image_page);
			$slide4_title = $slide4_content[0];
			$slide4_subtitle = $slide4_content[1];
			$slide4_image_url = $slide4_content[2];
		}
		 
		 
		if ($slide1_image_url == ''){
		$slide1_src = get_template_directory_uri() . "/assets/images/1.jpg"; 
		}else {
		$slide1_src = $slide1_image_url;
		}
		if ($slide2_image_url == ''){
		$slide2_src = get_template_directory_uri() . "/assets/images/1.jpg"; 
		}else {
		$slide2_src = $slide2_image_url;
		}
		
		$slide3_src ='';
		if ($slide3_image_url != ''){
		
		$slide3_src = $slide3_image_url;
		}
		$slide4_src ='';
		if ($slide4_image_url != ''){
		
		$slide4_src = $slide4_image_url;
		}
		
		
		$overlay_position_styles = '';
		$overlay_styles ='';
		$overlay_height ='';
		
		$slideshow_speed = '3000';
		$animation_speed = '500';
		$pause_on_hover = 'false';
		$control1_nav = 'false'; 
		$direction_nav = 'true'; 
		
		$overlay_height = get_theme_mod('ovr_heights','all');
	
		if ($overlay_height != 'all'){
		$overlay_top = intval($overlay_height)/2;
		$overlay_styles .= "top: calc(50% - ".intval($overlay_top)."px);";
		
			if ($overlay_height == '200'||$overlay_height == '225'){
				$overlay_styles .= "left: 25%;";
				$overlay_styles .= "right: 25%;";
			}
			if ($overlay_height == '250'||$overlay_height == '300'){
				$overlay_styles .= "left: 20%;";
				$overlay_styles .= "right: 20%;";
			}
			
			if ($overlay_height == '325'){
				$overlay_styles .= "left: 15%;";
				$overlay_styles .= "right: 45%;";
			}
		
		}
		
		if ($overlay_height != 'all'){
		
		$overlay_styles .= "height:".intval($overlay_height)."px;";
		
		} 
		
		$types = 'none';
		if ($overlay_height == 'all'){
		$overlay_styles .= "height: 100%;";
		$overlay_styles .= "padding: 0 50px;";
		//$slide_cta_styles = "top:70%;";
		$types = 'full';
		}
		
		$overlay_text_color = get_theme_mod('overlay-text-color','#fff');
		
		$overlay_bg_color = get_theme_mod('overlay-background-color','#000');
		
		$opacity = get_theme_mod('overlay-background-color-opacity','0.4');
		
		$overlay_bg_rgba	= million_shades_hex2rgba($overlay_bg_color, $opacity);
		$overlay_styles .=  "background-color:".$overlay_bg_rgba.";";
		
		$bg_image_height = get_theme_mod('header-media-height','500');
		$bg_image_width =  '100%';
		
		$container_styles = '';
		$container_styles .= 'background-position: center center;';
		$container_styles .= 'background-size: cover;';
		
		if ($bg_image_height == ''){
		$container_styles .= 'height:800px;';
		} else {
		$container_styles .= 'height:'.intval($bg_image_height).'px;';
		}
		
		if ($slide1_src != ''){
		$slide1_src = esc_url($slide1_src);
		$container1_styles = 'background-image:url('.$slide1_src.');';
		$container1_styles .= $container_styles;
		
		}
		
		if ($slide2_src != ''){
		$slide2_src = esc_url($slide2_src);
		$container2_styles = 'background-image:url('.$slide2_src.');';
		$container2_styles .= $container_styles;
		
		}
		
		if ($slide3_src != ''){
		$slide3_src = esc_url($slide3_src);
		$container3_styles = 'background-image:url('.$slide3_src.');';
		$container3_styles .= $container_styles;
		
		}
		
		if ($slide4_src != ''){
		$slide4_src = esc_url($slide4_src);
		$container4_styles = 'background-image:url('.$slide4_src.');';
		$container4_styles .= $container_styles;
		
		}
		
		$accent = million_shades_get_accent_color_mod();
	
	
			
		$btn_style = "border: 1px solid ".esc_attr($accent).";";
		
	
		$slide1_button1_text = get_theme_mod('header-media-button-input','Btn Txt');
		
		$hide_cta  = get_theme_mod('enable-overlay-text','1');
		
		if ($hide_cta != '1' ) {
			$overlay_styles =  "display:none;";	
		}
		
		$media_type  = get_theme_mod('header-media-type','image');
		$media_position  = get_theme_mod('header_media_position','bottom');
		
		
		
		
		$style = get_theme_mod('header_ovl_style','none');
			
		$slide1_button1_url = get_theme_mod('ovl-btn-url');
			
			
		
		
			?>

<?php

		$id = million_shades_html_id('slide-ovl');
		$class = '.';
		$class .= $id;


		$slide = million_shades_carousel_style($class,'.flexsliders','fade',$slideshow_speed,$animation_speed,$pause_on_hover,$control1_nav,$direction_nav);
	
?>
<?php echo $slide; ?>
<div class="flexsliders <?php echo esc_attr($id); ?>"> 
	<ul class="slides clear">
	
	<?php if ($slide1_src){ ?>
    <li>
      
		<div class="vc_slide_text" style="<?php echo esc_attr($container1_styles); ?>">
        
        <div class="slide_border_style <?php echo esc_attr($types); ?> <?php echo esc_attr($style); ?>" style="<?php echo esc_attr($overlay_styles) ?>">
		<div class="slide_cta" >
		<?php if ($slide1_title){ ?>
			<h1 class="nl-slide-ovr-title"><?php echo esc_html($slide1_title) ?></h1>
		<?php } ?>
		<?php if ($slide1_subtitle){ ?>
			<h5 class="nl-slide-ovr-sub-title"><?php echo esc_html($slide1_subtitle) ?></h5>
		<?php } ?>	
			
			<div class="slider-buttons">

	<?php if ($slide1_button1_text){ ?>
	<div class="slide1_button1">	
		<a  href="<?php echo esc_url($slide1_button1_url) ?>" class="btn-default nlbtn1 slide-btn" style="<?php echo esc_attr($btn_style) ?>"
			 target="_self">
	
		<?php echo esc_html($slide1_button1_text);  ?>
	
		</a>
	</div>
	<?php }  ?>

			
			</div>
	
	</div>
	</div>
	   
	</div>
    </li>
	<?php } ?>
	
	<?php if ($slide2_src){ ?>
	
    <li>
  
	  <div class="vc_slide_text" style="<?php echo esc_attr($container2_styles); ?>">
			<div class="slide_border_style <?php echo esc_attr($types); ?> <?php echo esc_attr($style); ?>" style="<?php echo esc_attr($overlay_styles) ?>">
	
				<div class="slide_cta">
					<?php if ($slide2_title){ ?>
					<h1 class="nl-slide-ovr-title"><?php echo esc_html($slide2_title) ?></h1>
					<?php } ?>
					<?php if ($slide2_subtitle){ ?>
					<h5 class="nl-slide-ovr-sub-title"><?php echo esc_html($slide2_subtitle) ?></h5>
					<?php } ?>
		
					<div class="slider-buttons">
	
						<?php if ($slide1_button1_text){ ?>
						<div class="slide1_button1">	
							<a  href="<?php echo esc_url($slide1_button1_url) ?>" class="btn-default nlbtn1 slide-btn" style="<?php echo esc_attr($btn_style) ?>"
							target="_self">
	
							<?php echo esc_html($slide1_button1_text);  ?>
	
							</a>
						</div>
						<?php }  ?>
	
					</div>
				</div>
		
			</div>
	  
		</div>
    </li>
   <?php } ?> 
	<?php if ($slide3_src){ ?>
	<li>
    
		<div class="vc_slide_text" style="<?php echo esc_attr($container3_styles); ?>">
			<div class="slide_border_style <?php echo esc_attr($types); ?> <?php echo esc_attr($style); ?>" style="<?php echo esc_attr($overlay_styles) ?>">
		
		
				<div class="slide_cta">
					<?php if ($slide3_title){ ?>
					<h1 class="nl-slide-ovr-title"><?php echo esc_html($slide3_title) ?></h1>
					<?php } ?> 
					<?php if ($slide3_subtitle){ ?>
					<h5 class="nl-slide-ovr-sub-title"><?php echo esc_html($slide3_subtitle) ?></h5>
					<?php } ?> 
	  
					<div class="slider-buttons">
	
					<?php if ($slide1_button1_text){ ?>
					<div class="slide1_button1">	
						<a  href="<?php echo esc_url($slide1_button1_url) ?>" class="btn-default nlbtn1 slide-btn" style="<?php echo esc_attr($btn_style) ?>" target="_self">
	
	
							<?php echo esc_html($slide1_button1_text);  ?>
	
		
						</a>
					</div>
					<?php }  ?>
	
					</div>
				</div>
 
			</div>
		</div>
                         
    </li>
<?php } ?>
	
	<?php if ($slide4_src){ ?>
    <li>
    
		<div class="vc_slide_text" style="<?php echo esc_attr($container4_styles); ?>">
        
		 <div class="slide_border_style <?php echo esc_attr($types); ?> <?php echo esc_attr($style); ?>" style="<?php echo esc_attr($overlay_styles) ?>">
			<div class="slide_cta">
				<?php if ($slide4_title){ ?>
					<h1 class="nl-slide-ovr-title"><?php echo esc_html($slide4_title) ?></h1>
				<?php } ?>
		
				<?php if ($slide4_subtitle){ ?>
					<h5 class="nl-slide-ovr-sub-title">
				<?php echo esc_html($slide4_subtitle) ?>
					</h5>
				<?php } ?>
	  
				<div class="slider-buttons">
	
				<?php if ($slide1_button1_text){ ?>
					<div class="slide1_button1">	
						<a  href="<?php echo esc_url($slide1_button1_url) ?>" class="btn-default nlbtn1 slide-btn" style="<?php echo esc_attr($btn_style) ?>" target="_self">
							<?php echo esc_html($slide1_button1_text);  ?>
		
						</a>
					</div>
				<?php }  ?>
	
			
				</div>
 
			</div>
		</div>
		</div>
    </li>
	<?php } ?>
  </ul>

</div>
<?php

}


function million_shades_header_media_image_overlay(){
		
	
		$container_styles = '';
		$container_styles = 'position:relative;';
		$overlays_height ='';
		$btn1_url ='';
		$btn1_url = get_theme_mod('ovl-btn-url');
		$title = get_theme_mod('header-media-title-input','I am Overlay Title');
		$overlay_subtitle = get_theme_mod('header-media-subtitle-input','');
		$btn1_text = get_theme_mod('header-media-button-input','Btn Txt');
		$overlay_enable = get_theme_mod('enable-overlay-text','1');
		$overlay_text_color = get_theme_mod('overlay-text-color','#fff');
		$overlay_bg_color = get_theme_mod('overlay-background-color','#000');
		
		$opacity = get_theme_mod('overlay-background-color-opacity','0.4');
		$overlay_bg_rgba	= million_shades_hex2rgba($overlay_bg_color, $opacity);
		
		$overlays_height = get_theme_mod('ovr_heights','all');
		
		
		
		if ($overlay_text_color != ''){
			
			$title_styles = "color:".esc_attr($overlay_text_color).";";
			$sub_title_styles = "color:".esc_attr($overlay_text_color).";";
			
		}
		
	
        $overlay_position_styles = '';
		$overlay_styles ='';
		if ($overlays_height == ''){
		
		$overlay_styles .= "height:100%;";
		
		} 
		  
		if ($overlays_height != 'all'){
		$overlay_top = intval($overlays_height)/2;
		$overlay_position_styles .= "top: calc(50% - ".intval($overlay_top)."px);";
		
			if ($overlays_height == '200'||$overlays_height == '225'){
				$overlay_position_styles .= "left: 25%;";
				$overlay_position_styles .= "right: 25%;";
			}
			if ($overlays_height == '250'||$overlays_height == '300'){
				$overlay_position_styles .= "left: 20%;";
				$overlay_position_styles .= "right: 20%;";
			}
			if ($overlays_height == '325'){
				$overlay_position_styles .= "left: 15%;";
				$overlay_position_styles .= "right: 45%;";
			}
		
		}
		
		if ($overlays_height != 'all'){
		
			$overlay_styles .= "height:".intval($overlays_height)."px;";
		
		} 
		
		$types = 'none';
		if ($overlays_height == 'all'){
			$overlay_styles .= "height: 100%;";
			$overlay_styles .= "padding: 0 50px;";
			$types = 'full';
		}
		
		
		
		$overlay_styles .= "width: 100%;";
		
		$overlay_styles .=  "background-color:".esc_attr($overlay_bg_rgba)."!important;";
		
		$accent = million_shades_get_accent_color_mod();
			
		$btn_style = "border: 1px solid ".esc_attr($accent).";";
	
		$overlay_position_styles .= "position: absolute;";
		$style = get_theme_mod('header_ovl_style','none');
		
		
		if ($overlay_enable != '1'){
			$overlay_styles .= "display:none;";
		}
		
			?>
        

<div class="header-media-image" style="<?php echo esc_attr($container_styles); ?>">

	<div class="overlay_text1 <?php echo esc_attr($types); ?>" style="<?php echo esc_attr($overlay_position_styles); ?>">
	
		<div class="image_border_style <?php echo esc_attr($style); ?>" style="<?php echo esc_attr($overlay_styles); ?>">
	
			<div class="overlay-cta" style="position:relative;">
				<?php if ($title){ ?>
					<h1 class="nl-media-ovr-title" style="<?php echo esc_attr($title_styles) ?>"><?php echo esc_html($title) ?></h1>
				<?php } ?>	
				<?php if ($overlay_subtitle){ ?>
					<h5 class="nl-media-ovr-sub-title" style="<?php echo esc_attr($sub_title_styles) ?>"><?php echo esc_html($overlay_subtitle);?></h5>
				<?php } ?>	
					<div class="overlay-buttons">
		
						<?php if ($btn1_text){ ?>
							<div class="btn1">
								<a href="<?php echo esc_url($btn1_url); ?>" class="ovr-button" style="<?php echo esc_attr($btn_style) ?>"
								target="_self">
	
								<?php echo esc_html($btn1_text);  ?>	
	
								</a>
							</div>
						<?php } ?>	
		
					</div>
			</div>
		</div>
   
	</div>
	
	<div class="header-media" >
	 
		<?php	the_header_image_tag(); ?>
	</div>

</div>
<?php
}


function million_shades_all_widgets() {
return $nl_widgets = array('Million_Shades_Author_Box','Million_Shades_Button_Widget','Million_Shades_Client',
'Million_Shades_Contacts_Widget','Million_Shades_Counter','Million_Shades_Custom_Heading',
'Million_Shades_Feature_Item','Million_Shades_Icon_Box','Million_Shades_Background_Image',
'Million_Shades_Image_Box','Million_Shades_Image_Overlay','Million_Shades_Latest_News','Million_Shades_Portfolios',
'Million_Shades_Post_Grid','Million_Shades_Shortcode','Million_Shades_Slide_Overlay','Million_Shades_Socials',
'Million_Shades_Spacing','Million_Shades_Staff','Million_Shades_Testimonial');
}

function million_shades_so_widgets() {
	

return $nl_widgets = array('Million_Shades_Button_Widget',
'Million_Shades_Counter','Million_Shades_Custom_Heading',
'Million_Shades_Feature_Item','Million_Shades_Icon_Box','Million_Shades_Background_Image',
'Million_Shades_Image_Overlay',
'Million_Shades_Spacing');

}

function million_shades_rest_widgets() {
	

return $nl_widgets = array('Million_Shades_Author_Box',
'Million_Shades_Contacts_Widget','Million_Shades_Image_Box','Million_Shades_Latest_News',
'Million_Shades_Post_Grid','Million_Shades_Shortcode','Million_Shades_Slide_Overlay','Million_Shades_Socials');

}



function million_shades_custom_post_widgets() {
	
	return $nl_widgets = array('Million_Shades_Client','Million_Shades_Portfolios',
'Million_Shades_Staff','Million_Shades_Testimonial');
	
}


function million_shades_excerpt_length( $length ) {
  $excerpt = get_theme_mod('post-exerpt-length', '50');
  return esc_html($excerpt);
}
add_filter( 'excerpt_length', 'million_shades_excerpt_length', 999 );


	
function million_shades_fontawesome_social_list(){
	return $fa_icons_array = array(
            "default"                      => "default",
            'fa-500px'              =>  '500px',
            "fa-adn"                => "ADN",
            'fa-amazon'             => 'Amazon',
            "fa-android"            => "Android",
            "fa-apple"              => "Apple",
            "fa-behance"            => "Behance",
            "fa-behance-square"     => "Behance Square",
            "fa-bitbucket"          => "Bitbucket",
            "fa-bitbucket-sign"     => "Bitbucket-Sign",
            "fa-bitcoin"            => "Bitcoin",
            "fa-btc"                => "BTC",
            "fa-css3"               => "CSS3",
            "fa-dribbble"           => "Dribbble",
            "fa-dropbox"            => "Dropbox",
            "fa-facebook"           => "Facebook",
            "fa-facebook-sign"      => "Facebook-Sign",
            "fa-flickr"             => "Flickr",
            "fa-foursquare"         => "Foursquare",
            "fa-github"             => "GitHub",
            "fa-github-alt"         => "GitHub-Alt",
            "fa-github-sign"        => "GitHub-Sign",
            "fa-gittip"             => "Gittip",
            "fa-google-plus"        => "Google Plus",
            "fa-google-plus-sign"   => "Google Plus-Sign",
            "fa-html5"              => "HTML5",
            "fa-instagram"          => "Instagram",
            "fa-linkedin"           => "LinkedIn",
            "fa-linkedin-sign"      => "LinkedIn-Sign",
            "fa-linux"              => "Linux",
            "fa-envelope"           => "Mail",
            "fa-envelope-o"         => "Mail Alt",
            "fa-envelope-square"    => "Mail Square",
            "fa-maxcdn"             => "MaxCDN",
            "fa-paypal"             => "Paypal",
            "fa-pinterest"          => "Pinterest",
            "fa-pinterest-sign"     => "Pinterest-Sign",
            "fa-renren"             => "Renren",
            "fa-skype"              => "Skype",
            "fa-stackexchange"      => "StackExchange",
            'fa-tripadvisor'        => 'Trip Advisor',
            "fa-trello"             => "Trello",
            "fa-tumblr"             => "Tumblr",
            "fa-tumblr-sign"        => "Tumblr-Sign",
            "fa-twitter"            => "Twitter",
            "fa-twitter-sign"       => "Twitter-Sign",
            'fa-vimeo'              => 'Vimeo',
            'fa-vimeo-square'       => 'Vimeo Square',
            'fa-vine'               => 'Vine',
            "fa-vk"                 => "VK",
            "fa-weibo"              => "Weibo",
            'fa-wikipedia-w'        => 'Wikipedia',
            "fa-windows"            => "Windows",
            'fa-wordpress'          => 'Wordpress',
            "fa-xing"               => "Xing",
            "fa-xing-sign"          => "Xing-Sign",
            "fa-youtube"            => "YouTube",
            "fa-youtube-play"       => "YouTube Play",
            "fa-youtube-sign"       => "YouTube-Sign"
        );
	
}




function million_shades_font_awesome_icons(){
		return array("long-arrow-right"=>"long-arrow-right","long-arrow-down"=>"long-arrow-down","long-arrow-up"=>"long-arrow-up",
		"long-arrow-left"=>"long-arrow-left",
		"glass"=>"glass","music"=>"music","search"=>"search",
		"envelope-o"=>"envelope-o","heart"=>"heart","star"=>"star",
		"star-o"=>"star-o","user"=>"user","film"=>"film",
		"th-large"=>"th-large","th"=>"th","th-list"=>"th-list",
		"check"=>"check",
		"remove"=>"remove","close"=>"close","times"=>"times",
		"search-plus"=>"search-plus",
		"search-minus"=>"search-minus","power-off"=>"power-off",
		"signal"=>"signal","gear"=>"gear","cog"=>"cog"
		
		,"trash-o"=>"trash-o","home"=>"home",
		"file-o"=>"file-o","clock-o"=>"clock-o",
		"road"=>"road","download"=>"download",
		"arrow-circle-o-down"=>"arrow-circle-o-down","arrow-circle-o-up"=>"arrow-circle-o-up",
		
		"inbox"=>"inbox",
		"play-circle-o"=>"play-circle-o","rotate-right"=>"rotate-right",
		
		"repeat"=>"repeat","refresh"=>"refresh",
		"list-alt"=>"list-alt","lock"=>"lock",
		"flag"=>"flag","headphones"=>"headphones",
		"volume-off"=>"volume-off",
		"volume-down"=>"volume-down","volume-up"=>"volume-up","qrcode"=>"qrcode",
		"barcode"=>"barcode","tag"=>"tag","tags"=>"tags",
		"book"=>"book","bookmark"=>"bookmark","print"=>"print",
		"camera"=>"camera",
		"font"=>"font","bold"=>"bold",
		"italic"=>"italic","text-height"=>"text-height",
		"text-width"=>"text-width","align-left"=>"align-left",
		
		"align-center"=>"align-center","align-right"=>"align-right",
		"align-justify"=>"align-justify","list"=>"list","dedent"=>"dedent",
		"outdent"=>"outdent","indent"=>"indent",
		
		"video-camera"=>"video-camera","photo"=>"photo","image"=>"image",
		"picture-o"=>"picture-o",
		"pencil"=>"pencil","map-marker"=>"map-marker",
		"adjust"=>"adjust","tint"=>"tint","edit"=>"edit",
		"pencil-square-o"=>"pencil-square-o",
		"share-square-o"=>"share-square-o","check-square-o"=>"check-square-o",
		
		"arrows"=>"arrows","step-backward"=>"step-backward",
		"fast-backward"=>"fast-backward",
		"backward"=>"backward","play"=>"play","pause"=>"pause",
		
		"stop"=>"stop","forward"=>"forward","fast-forward"=>"fast-forward",
		
		"step-forward"=>"step-forward","eject"=>"eject",
		"chevron-left"=>"chevron-left","chevron-right"=>"chevron-right",
		"plus-circle"=>"plus-circle",
		"minus-circle"=>"minus-circle","times-circle"=>"times-circle",
		"check-circle"=>"check-circle","question-circle"=>"question-circle",
		"info-circle"=>"info-circle",
		"crosshairs"=>"crosshairs","times-circle-o"=>"times-circle-o",
		
		"check-circle-o"=>"check-circle-o","ban"=>"ban",
		"arrow-left"=>"arrow-left",
		"arrow-right"=>"arrow-right","arrow-up"=>"arrow-up",
		
		"arrow-down"=>"arrow-down","mail-forward"=>"mail-forward","share"=>"share",
		"expand"=>"expand","compress"=>"compress",
		"plus"=>"plus","minus"=>"minus","asterisk"=>"asterisk",
		"exclamation-circle"=>"exclamation-circle",
		"gift"=>"gift","leaf"=>"leaf","fire"=>"fire",
		"eye"=>"eye","eye-slash"=>"eye-slash","warning"=>"warning",
		
		"exclamation-triangle"=>"exclamation-triangle",
		"plane"=>"plane","calendar"=>"calendar",
		"random"=>"random","comment"=>"comment",
		"magnet"=>"magnet","chevron-up"=>"chevron-up",
		"chevron-down"=>"chevron-down","retweet"=>"retweet",
		"shopping-cart"=>"shopping-cart","folder"=>"folder",
		"folder-open"=>"folder-open","arrows-v"=>"arrows-v",
		"arrows-h"=>"arrows-h","bar-chart-o"=>"bar-chart-o","bar-chart"=>"bar-chart"
		
		,"twitter-square"=>"twitter-square","facebook-square"=>"facebook-square",
		"camera-retro"=>"camera-retro","key"=>"key",
		"gears"=>"gears","cogs"=>"cogs",
		"comments"=>"comments","thumbs-o-up"=>"thumbs-o-up",
		"thumbs-o-down"=>"thumbs-o-down","star-half"=>"star-half",
		"heart-o"=>"heart-o","sign-out"=>"sign-out",
		"linkedin-square"=>"linkedin-square","thumb-tack"=>"thumb-tack",
		"external-link"=>"external-link","sign-in"=>"sign-in","trophy"=>"trophy",
		
		"github-square"=>"github-square","upload"=>"upload",
		"lemon-o"=>"lemon-o","phone"=>"phone","square-o"=>"square-o",
		"bookmark-o"=>"bookmark-o",
		"phone-square"=>"phone-square","twitter"=>"twitter",
		"facebook-f"=>"facebook-f","facebook"=>"facebook",
		"github"=>"github","unlock"=>"unlock",
		
		"credit-card"=>"credit-card","feed"=>"feed","rss"=>"rss",
		"hdd-o"=>"hdd-o","bullhorn"=>"bullhorn","bell"=>"bell",
		"certificate"=>"certificate",
		"hand-o-right"=>"hand-o-right","hand-o-left"=>"hand-o-left",
		
		"hand-o-up"=>"hand-o-up","hand-o-down"=>"hand-o-down","arrow-circle-left"=>"arrow-circle-left",
		"arrow-circle-right"=>"arrow-circle-right","arrow-circle-up"=>"arrow-circle-up",
		"arrow-circle-down"=>"arrow-circle-down","globe"=>"globe","wrench"=>"wrench",
		"tasks"=>"tasks","filter"=>"filter","briefcase"=>"briefcase","arrows-alt"=>"arrows-alt",
		"group"=>"group","users"=>"users","chain"=>"chain",
		"link"=>"link","cloud"=>"cloud","flask"=>"flask",
		"cut"=>"cut","scissors"=>"scissors","copy"=>"copy","files-o"=>"files-o",
		"paperclip"=>"paperclip","save"=>"save",
		"floppy-o"=>"floppy-o","square"=>"square",
		"navicon"=>"navicon","reorder"=>"reorder","bars"=>"bars",
		"list-ul"=>"list-ul","list-ol"=>"list-ol",
		"strikethrough"=>"strikethrough","underline"=>"underline",
		"table"=>"table","magic"=>"magic","truck"=>"truck",
		"pinterest"=>"pinterest","pinterest-square"=>"pinterest-square",
		"google-plus-square"=>"google-plus-square","google-plus"=>"google-plus",
		"money"=>"money",
		"caret-down"=>"caret-down","caret-up"=>"caret-up",
		"caret-left"=>"caret-left","caret-right"=>"caret-right",
		"columns"=>"columns","unsorted"=>"unsorted",
		"sort"=>"sort","sort-down"=>"sort-down",
		"sort-desc"=>"sort-desc","sort-up"=>"sort-up",
		"sort-asc"=>"sort-asc","envelope"=>"envelope","linkedin"=>"linkedin",
		
		"rotate-left"=>"rotate-left","undo"=>"undo",
		"legal"=>"legal","gavel"=>"gavel",
		"dashboard"=>"dashboard","tachometer"=>"tachometer","comment-o"=>"comment-o",
		"comments-o"=>"comments-o","flash"=>"flash",
		"bolt"=>"bolt","sitemap"=>"sitemap",
		"umbrella"=>"umbrella","paste"=>"paste","clipboard"=>"clipboard",
		"lightbulb-o"=>"lightbulb-o","exchange"=>"exchange",
		
		"cloud-download"=>"cloud-download","cloud-upload"=>"cloud-upload",
		"user-md"=>"user-md","stethoscope"=>"stethoscope",
		
		"suitcase"=>"suitcase","bell-o"=>"bell-o","coffee"=>"coffee",
		"cutlery"=>"cutlery","file-text-o"=>"file-text-o",
		"building-o"=>"building-o",
		"hospital-o"=>"hospital-o","ambulance"=>"ambulance",
		
		"medkit"=>"medkit","fighter-jet"=>"fighter-jet",
		"beer"=>"beer","h-square"=>"h-square",
		"plus-square"=>"plus-square","angle-double-left"=>"angle-double-left",
		"angle-double-right"=>"angle-double-right","angle-double-up"=>"angle-double-up",
		
		"angle-double-down"=>"angle-double-down","angle-left"=>"angle-left",
		"angle-right"=>"angle-right","angle-up"=>"angle-up",
		"angle-down"=>"angle-down",
		"desktop"=>"desktop","laptop"=>"laptop","tablet"=>"tablet",
		"mobile-phone"=>"mobile-phone","mobile"=>"mobile","circle-o"=>"circle-o",
		
		"quote-left"=>"quote-left","quote-right"=>"quote-right",
		
		"spinner"=>"spinner","circle"=>"circle","mail-reply"=>"mail-reply",
		"reply"=>"reply",
		"github-alt"=>"github-alt","folder-o"=>"folder-o",
		"folder-open-o"=>"folder-open-o","smile-o"=>"smile-o",
		"frown-o"=>"frown-o","meh-o"=>"meh-o",
		"gamepad"=>"gamepad","keyboard-o"=>"keyboard-o","flag-o"=>"flag-o",
		"flag-checkered"=>"flag-checkered","terminal"=>"terminal","code"=>"code",
		
		"mail-reply-all"=>"mail-reply-all","reply-all"=>"reply-all",
		"star-half-empty"=>"star-half-empty",
		"star-half-full"=>"star-half-full","star-half-o"=>"star-half-o",
		"location-arrow"=>"location-arrow",
		
		"crop"=>"crop","code-fork"=>"code-fork","unlink"=>"unlink",
		"chain-broken"=>"chain-broken","question"=>"question",
		"info"=>"info","exclamation"=>"exclamation",
		
		"superscript"=>"superscript","subscript"=>"subscript",
		"eraser"=>"eraser","puzzle-piece"=>"puzzle-piece",
		
		"microphone"=>"microphone","microphone-slash"=>"microphone-slash",
		"shield"=>"shield","calendar-o"=>"calendar-o",
		"fire-extinguisher"=>"fire-extinguisher",
		"rocket"=>"rocket","maxcdn"=>"maxcdn",
		
		"chevron-circle-left"=>"chevron-circle-left",
		"chevron-circle-right"=>"chevron-circle-right","chevron-circle-up"=>"chevron-circle-up",
		
		"chevron-circle-down"=>"chevron-circle-down","html5"=>"html5",
		"css3"=>"css3","anchor"=>"anchor","unlock-alt"=>"unlock-alt",
		"bullseye"=>"bullseye","ellipsis-h"=>"ellipsis-h",
		
		"ellipsis-v"=>"ellipsis-v","rss-square"=>"rss-square",
		"play-circle"=>"play-circle","ticket"=>"ticket","minus-square"=>"minus-square",
		"minus-square-o"=>"minus-square-o","level-up"=>"level-up",
		"level-down"=>"level-down","check-square"=>"check-square",
		"pencil-square"=>"pencil-square",
		
		"external-link-square"=>"external-link-square",
		"share-square"=>"share-square","compass"=>"compass","toggle-down"=>"toggle-down","caret-square-o-down"=>"caret-square-o-down","toggle-up"=>"toggle-up",
		"caret-square-o-up"=>"caret-square-o-up","toggle-right"=>"toggle-right","caret-square-o-right"=>"caret-square-o-right",
		"euro"=>"euro","eur"=>"eur","gbp"=>"gbp","dollar"=>"dollar","usd"=>"usd",
		"rupee"=>"rupee","inr"=>"inr","cny"=>"cny",
		"rmb"=>"rmb","yen"=>"yen","jpy"=>"jpy","ruble"=>"ruble","rouble"=>"rouble","rub"=>"rub","won"=>"won","krw"=>"krw","bitcoin"=>"bitcoin","btc"=>"btc",
		"file"=>"file","file-text"=>"file-text","sort-alpha-asc"=>"sort-alpha-asc",
		"sort-alpha-desc"=>"sort-alpha-desc","sort-amount-asc"=>"sort-amount-asc","sort-amount-desc"=>"sort-amount-desc",
		"sort-numeric-asc"=>"sort-numeric-asc","sort-numeric-desc"=>"sort-numeric-desc","thumbs-up"=>"thumbs-up",
		"thumbs-down"=>"thumbs-down","youtube-square"=>"youtube-square",
		"youtube"=>"youtube","xing"=>"xing","xing-square"=>"xing-square",
		"youtube-play"=>"youtube-play","dropbox"=>"dropbox","stack-overflow"=>"stack-overflow","instagram"=>"instagram","flickr"=>"flickr","adn"=>"adn","bitbucket"=>"bitbucket",
		"bitbucket-square"=>"bitbucket-square","tumblr"=>"tumblr","tumblr-square"=>"tumblr-square",
		
		"apple"=>"apple","windows"=>"windows","android"=>"android",
		"linux"=>"linux","dribbble"=>"dribbble","skype"=>"skype","foursquare"=>"foursquare","trello"=>"trello","female"=>"female","male"=>"male","gittip"=>"gittip","gratipay"=>"gratipay","sun-o"=>"sun-o","moon-o"=>"moon-o","archive"=>"archive","bug"=>"bug","vk"=>"vk","weibo"=>"weibo","renren"=>"renren",
		"pagelines"=>"pagelines","stack-exchange"=>"stack-exchange",
		"arrow-circle-o-right"=>"arrow-circle-o-right",
		"arrow-circle-o-left"=>"arrow-circle-o-left",
		
		"toggle-left"=>"toggle-left","caret-square-o-left"=>"caret-square-o-left",
		"dot-circle-o"=>"dot-circle-o","wheelchair"=>"wheelchair","vimeo-square"=>"vimeo-square",
		"turkish-lira"=>"turkish-lira","try"=>"try","plus-square-o"=>"plus-square-o",
		"space-shuttle"=>"space-shuttle","slack"=>"slack",
		"envelope-square"=>"envelope-square","wordpress"=>"wordpress",
		"openid"=>"openid","institution"=>"institution","bank"=>"bank",
		
		"university"=>"university","mortar-board"=>"mortar-board",
		"graduation-cap"=>"graduation-cap","yahoo"=>"yahoo","google"=>"google",
		
		"reddit"=>"reddit","reddit-square"=>"reddit-square",
		"stumbleupon-circle"=>"stumbleupon-circle","stumbleupon"=>"stumbleupon",
		"delicious"=>"delicious",
		"digg"=>"digg","pied-piper-pp"=>"pied-piper-pp",
		"pied-piper-alt"=>"pied-piper-alt","drupal"=>"drupal","joomla"=>"joomla",
		
		"language"=>"language","fax"=>"fax",
		"building"=>"building","child"=>"child","paw"=>"paw","spoon"=>"spoon",
		
		
		"cube"=>"cube","cubes"=>"cubes","behance"=>"behance",
		"behance-square"=>"behance-square","steam"=>"steam","steam-square"=>"steam-square",
		
		"recycle"=>"recycle","automobile"=>"automobile",
		"car"=>"car","cab"=>"cab",
		
		"taxi"=>"taxi","tree"=>"tree","spotify"=>"spotify",
		
		"deviantart"=>"deviantart","soundcloud"=>"soundcloud",
		"database"=>"database","file-pdf-o"=>"file-pdf-o","file-word-o"=>"file-word-o",
		
		"file-excel-o"=>"file-excel-o","file-powerpoint-o"=>"file-powerpoint-o",
		"file-photo-o"=>"file-photo-o","file-picture-o"=>"file-picture-o",
		
		"file-image-o"=>"file-image-o","file-zip-o"=>"file-zip-o",
		"file-archive-o"=>"file-archive-o","file-sound-o"=>"file-sound-o",
		"file-audio-o"=>"file-audio-o",
		"file-movie-o"=>"file-movie-o",
		"file-video-o"=>"file-video-o",
		"file-code-o"=>"file-code-o","vine"=>"vine","codepen"=>"codepen",
		
		"paper-plane"=>"paper-plane",
		"send-o"=>"send-o","paper-plane-o"=>"paper-plane-o",
		
		"history"=>"history","circle-thin"=>"circle-thin",
		"header"=>"header","paragraph"=>"paragraph",
		"sliders"=>"sliders","share-alt"=>"share-alt",
		"share-alt-square"=>"share-alt-square","bomb"=>"bomb",
		"soccer-ball-o"=>"soccer-ball-o",
		"futbol-o"=>"futbol-o","tty"=>"tty",
		
		"jsfiddle"=>"jsfiddle","life-bouy"=>"life-bouy",
		"life-buoy"=>"life-buoy","life-saver"=>"life-saver",
		"support"=>"support","life-ring"=>"life-ring",
		
		"circle-o-notch"=>"circle-o-notch","ra"=>"ra",
		"resistance"=>"resistance","rebel"=>"rebel","ge"=>"ge",
		"empire"=>"empire",
		"git-square"=>"git-square","git"=>"git",
		"y-combinator-square"=>"y-combinator-square","yc-square"=>"yc-square",
		"hacker-news"=>"hacker-news",
		"tencent-weibo"=>"tencent-weibo","qq"=>"qq",
		"wechat"=>"wechat","weixin"=>"weixin","send"=>"send",
	
		
		"binoculars"=>"binoculars","plug"=>"plug",
		"slideshare"=>"slideshare","twitch"=>"twitch",
		
		"yelp"=>"yelp","newspaper-o"=>"newspaper-o",
		
		"wifi"=>"wifi","calculator"=>"calculator","paypal"=>"paypal",
		"google-wallet"=>"google-wallet",
		"cc-visa"=>"cc-visa","cc-mastercard"=>"cc-mastercard",
		
		"cc-discover"=>"cc-discover","cc-amex"=>"cc-amex","cc-paypal"=>"cc-paypal",
		
		"cc-stripe"=>"cc-stripe","bell-slash"=>"bell-slash",
		"bell-slash-o"=>"bell-slash-o","trash"=>"trash","copyright"=>"copyright",
		
		"at"=>"at","eyedropper"=>"eyedropper",
		"paint-brush"=>"paint-brush","birthday-cake"=>"birthday-cake",
		"area-chart"=>"area-chart",
		"pie-chart"=>"pie-chart","line-chart"=>"line-chart",
		"lastfm"=>"lastfm","lastfm-square"=>"lastfm-square","toggle-off"=>"toggle-off",
		
		
		"toggle-on"=>"toggle-on","bicycle"=>"bicycle",
		"bus"=>"bus","ioxhost"=>"ioxhost","angellist"=>"angellist",
		"cc"=>"cc","shekel"=>"shekel",
		"sheqel"=>"sheqel","ils"=>"ils","meanpath"=>"meanpath",
		
		"buysellads"=>"buysellads","connectdevelop"=>"connectdevelop","dashcube"=>"dashcube",
		
		"forumbee"=>"forumbee","leanpub"=>"leanpub",
		"sellsy"=>"sellsy","shirtsinbulk"=>"shirtsinbulk",
		"simplybuilt"=>"simplybuilt","skyatlas"=>"skyatlas",
		"cart-plus"=>"cart-plus","cart-arrow-down"=>"cart-arrow-down",
		"diamond"=>"diamond","ship"=>"ship","user-secret"=>"user-secret",
		"motorcycle"=>"motorcycle",
		"street-view"=>"street-view","heartbeat"=>"heartbeat",
		"venus"=>"venus","mars"=>"mars","mercury"=>"mercury",
		"intersex"=>"intersex",
		"transgender"=>"transgender",
		"transgender-alt"=>"transgender-alt","venus-double"=>"venus-double",
		"mars-double"=>"mars-double","venus-mars"=>"venus-mars",
		
		
		"mars-stroke"=>"mars-stroke","mars-stroke-v"=>"mars-stroke-v",
		"mars-stroke-h"=>"mars-stroke-h","neuter"=>"neuter","genderless"=>"genderless",
		
		"facebook-official"=>"facebook-official",
		"pinterest-p"=>"pinterest-p","whatsapp"=>"whatsapp",
		"server"=>"server","user-plus"=>"user-plus",
		
				
		"battery-three-quarters"=>"battery-three-quarters",
		"battery-2"=>"battery-2","battery-half"=>"battery-half",
		
		"battery-1"=>"battery-1","battery-quarter"=>"battery-quarter",
		"battery-0"=>"battery-0","battery-empty"=>"battery-empty",
		"mouse-pointer"=>"mouse-pointer",
		"i-cursor"=>"i-cursor","object-group"=>"object-group",
		"object-ungroup"=>"object-ungroup","sticky-note"=>"sticky-note",
		"sticky-note-o"=>"sticky-note-o",
		"cc-jcb"=>"cc-jcb","cc-diners-club"=>"cc-diners-club",
		"clone"=>"clone","balance-scale"=>"balance-scale","hourglass-o"=>"hourglass-o",
		
		"user-times"=>"user-times","hotel"=>"hotel",
		"bed"=>"bed","viacoin"=>"viacoin","train"=>"train",
		"subway"=>"subway","medium"=>"medium",
		
		"yc"=>"yc","y-combinator"=>"y-combinator",
		"optin-monster"=>"optin-monster","opencart"=>"opencart",
		"expeditedssl"=>"expeditedssl","battery-4"=>"battery-4",
		"battery-full"=>"battery-full","battery-3"=>"battery-3",

		"hourglass-1"=>"hourglass-1","hourglass-start"=>"hourglass-start",
		"hourglass-2"=>"hourglass-2","hourglass-half"=>"hourglass-half",
		"hourglass-3"=>"hourglass-3",
		"hourglass-end"=>"hourglass-end","hourglass"=>"hourglass",
		"hand-grab-o"=>"hand-grab-o","hand-rock-o"=>"hand-rock-o","hand-stop-o"=>"hand-stop-o",
		"hand-paper-o"=>"hand-paper-o","hand-scissors-o"=>"hand-scissors-o",
		"hand-lizard-o"=>"hand-lizard-o","hand-spock-o"=>"hand-spock-o",
		"hand-pointer-o"=>"hand-pointer-o",
		"hand-peace-o"=>"hand-peace-o","trademark"=>"trademark",
		"registered"=>"registered","creative-commons"=>"creative-commons","gg"=>"gg",
		
		"gg-circle"=>"gg-circle","tripadvisor"=>"tripadvisor",
		"odnoklassniki"=>"odnoklassniki","odnoklassniki-square"=>"odnoklassniki-square",
		"get-pocket"=>"get-pocket",
		"wikipedia-w"=>"wikipedia-w","safari"=>"safari",
		"chrome"=>"chrome","firefox"=>"firefox",
		"opera"=>"opera","internet-explorer"=>"internet-explorer",
		
		"tv"=>"tv","television"=>"television",
		"contao"=>"contao","500px"=>"500px","amazon"=>"amazon",
		"calendar-plus-o"=>"calendar-plus-o",
		"calendar-minus-o"=>"calendar-minus-o","calendar-times-o"=>"calendar-times-o",
		"calendar-check-o"=>"calendar-check-o","industry"=>"industry",
		
		"map-pin"=>"map-pin","map-signs"=>"map-signs","map-o"=>"map-o",
		"map"=>"map","commenting"=>"commenting","commenting-o"=>"commenting-o",
		
		"houzz"=>"houzz","vimeo"=>"vimeo","black-tie"=>"black-tie",
		"fonticons"=>"fonticons","reddit-alien"=>"reddit-alien","edge"=>"edge",
		
		"credit-card-alt"=>"credit-card-alt","codiepie"=>"codiepie",
		"modx"=>"modx","fort-awesome"=>"fort-awesome","usb"=>"usb",
		"product-hunt"=>"product-hunt",
		"mixcloud"=>"mixcloud","scribd"=>"scribd","pause-circle"=>"pause-circle",
		"pause-circle-o"=>"pause-circle-o","stop-circle"=>"stop-circle",
		
		"stop-circle-o"=>"stop-circle-o","shopping-bag"=>"shopping-bag",
		"shopping-basket"=>"shopping-basket","hashtag"=>"hashtag","bluetooth"=>"bluetooth",
		
		"bluetooth-b"=>"bluetooth-b","percent"=>"percent",
		"gitlab"=>"gitlab","wpbeginner"=>"wpbeginner","wpforms"=>"wpforms",
		"envira"=>"envira",
		"universal-access"=>"universal-access","wheelchair-alt"=>"wheelchair-alt",
		"question-circle-o"=>"question-circle-o","blind"=>"blind",
		"audio-description"=>"audio-description",
		"volume-control-phone"=>"volume-control-phone","braille"=>"braille",
		"assistive-listening-systems"=>"assistive-listening-systems","asl-interpreting"=>"asl-interpreting",
		
		"american-sign-language-interpreting"=>"american-sign-language-interpreting",
		"deafness"=>"deafness","hard-of-hearing"=>"hard-of-hearing",
		"deaf"=>"deaf","glide"=>"glide",
		"glide-g"=>"glide-g","signing"=>"signing",
		"sign-language"=>"sign-language","low-vision"=>"low-vision",
		"viadeo"=>"viadeo","viadeo-square"=>"viadeo-square",
		"snapchat"=>"snapchat","snapchat-ghost"=>"snapchat-ghost",
		"snapchat-square"=>"snapchat-square","pied-piper"=>"pied-piper",
		"first-order"=>"first-order",
		"yoast"=>"yoast","themeisle"=>"themeisle",
		"google-plus-circle"=>"google-plus-circle","google-plus-official"=>"google-plus-official",
		"fa"=>"fa",
		"font-awesome"=>"font-awesome");
	}


function million_shades_comment_navigation() {
	if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
	?>
	<nav class="navigation comment-navigation" role="navigation">
		<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'million-shades' ); ?></h2>
		<div class="nav-links">
			<?php
				if ( $prev_link = get_previous_comments_link( __( 'Older Comments', 'million-shades' ) ) ) :
					printf( '<div class="nav-previous">%s</div>', esc_html($prev_link ));
				endif;
				if ( $next_link = get_next_comments_link( __( 'Newer Comments', 'million-shades' ) ) ) :
					printf( '<div class="nav-next">%s</div>', esc_html($next_link ));
				endif;
			?>
		</div><!-- .nav-links -->
	</nav><!-- .comment-navigation -->
	<?php
	endif;
}



 
 function million_shades_page_select($selected_page) { 
         
		if ($selected_page == '0'){
			return;
		}
		
			global $post;
			$post = get_post( $selected_page );
				setup_postdata($post);
			
					$slider_title = get_the_title();
					$slider_description = get_the_excerpt();
					$slider_image = get_the_post_thumbnail_url();
					
					$social_url=array();
					$social_icon =array();
					for ( $i = 1; $i < 5; $i ++ ) {
					
					$social_url[] = get_post_meta( get_the_ID(), 'post_social_url'.$i, true );
					$social_icon[] = get_post_meta( get_the_ID(), 'post_social_icon'.$i, true );
							
						
					} 

			// Reset Post Data
			wp_reset_postdata(); 
		 
		 
   return $slider_content = array($slider_title,$slider_description,$slider_image,$social_url,$social_icon);
      
 }
 
 function million_shades_post_select() { 
         
		$slider_titles = array();
		$slider_descriptions = array();
		$slider_images = array();
		
		$paged = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
		
			    $loop = new WP_Query(
				array(
					'post_type' => 'post',
					'cat' =>get_theme_mod('shades_category_control',''),
					'posts_per_page' => 6,
					
					'post_status' => 'publish',
					//'ignore_sticky_posts' => 1
				)
			);
	
	
		$slide1_image_url = '';
		$slide1_title = '';
		$slide1_subtitle = '';
		$container_styles = '';
		$overlay_position_styles = '';
		$overlay_styles ='';
	
		$slideshow_speed = '3000';
		$animation_speed = '500';
		$pause_on_hover = 'false';
		$control1_nav = 'false'; 
		$direction_nav = 'true'; 
		
		$overlay_bg_rgba = million_shades_hex2rgba('#000', 0.2);
		$overlay_styles .=  "background-color:".$overlay_bg_rgba.";";
		
		$overlay_styles .= "height: 100%;";
		$overlay_styles .= "padding: 0 10%;";
		
		$types = 'full';
		
		
		
		
			?>

<?php

		$id = million_shades_html_id('slide-ovl2');
		$class = '.';
		$class .= $id;

	$slider_type = get_theme_mod('slider_type','slide');
	if ($slider_type == 'slide'){
	$slide = million_shades_carousel_style($class,'.flexsliders','fade',$slideshow_speed,$animation_speed,$pause_on_hover,$control1_nav,$direction_nav);
	}
	
	if ($slider_type == 'carousel'){
	 $slide = million_shades_slide_carousel_style($class,'.flexsliders',$slideshow_speed,'600','false',$control1_nav,$direction_nav,'330','15','1','3');
	}
	
?>
<?php echo $slide; ?>
<div class="flexsliders <?php echo esc_attr($id); ?> feature-slider"> 
	<ul class="slides clear" style="<?php echo esc_attr($flex_bg); ?> ">
	<?php
	if( $loop->have_posts() ): while( $loop->have_posts() ): $loop->the_post(); 
			
		
		$slide1_src = get_the_post_thumbnail_url();
		$container_styles = '';
		$container_styles .= 'background-position: center center;';
		$container_styles .= 'background-size: cover;';
		
		$container_styles .= 'height:550px;';
		
			if ($slide1_src != ''){
		$slide1_src = esc_url($slide1_src);
		$container1_styles = 'background-image:url('.$slide1_src.');';
		$container1_styles .= $container_styles;
		
		}
		
		if ($slide1_src == ''){
		$slide1_src = get_template_directory_uri() . "/assets/images/1.jpg"; 
		}
		
	$slide1_button1_text = get_theme_mod('shades_category_control');
	
	 if ($slide1_src){ ?>
    <li>
      
		<div class="vc_slide_text" style="<?php echo esc_attr($container1_styles); ?>">
        
        <div class="slide_border_style <?php echo esc_attr($types); ?> <?php echo esc_attr($style); ?>" style="<?php echo esc_attr($overlay_styles) ?>">
		<div class="slide_cta" >
		<div class="slider-category" ><?php the_category(); ?></div>
		
		
		<a  title="<?php the_title_attribute();?>" href="<?php the_permalink(); ?>" target="_self">
			<h1 class="nl-slide-feature-title"><?php the_title(); ?></h1>
		</a>
		
		
		<?php if (the_excerpt()){ ?>
			<div class="nl-slide-feature-sub-title" ><?php the_excerpt(); ?></div>
		<?php } ?>	
			
			<div class="slider-buttons">

			
				<div class="slide1_button1">	
					<a  title="<?php the_title_attribute();?>" href="<?php the_permalink(); ?>" class="btn-default nlbtn1 slide-btn" style="<?php echo esc_attr($btn_style) ?>"
						target="_self">
	
					<?php
							esc_html_e('Read More', 'million-shades'); ?>
	
					</a>
				</div>
		
			</div>
	
	</div>
	</div>
	   
	</div>
    </li>
	<?php } 
	endwhile;

		endif; 
	?>
  </ul>

</div>
<?php

      wp_reset_postdata(); 
 }
 
 function million_shades_list_post_title_meta() {
	 ?>
		<div class="title-meta">
		 <!-- To display categories on the top of the post title -->
			<?php echo get_the_category_list();?>
		
		<!-- To display titles of blog post -->
		<?php
		if ( is_single() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif; ?>
		
		<?php
		
		// To display meta of blog post -->	
		if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
		    	
	
			<!-- Meta function calling -->
				<?php million_shades_posted_on(); ?>
			</div><!-- .entry-meta -->
			<?php
		endif; ?>
		</div>
		<?php
 }

function million_shades_single_navigation() {
	
	if ( is_singular( 'attachment' ) ) {
				// Blog Post navigation.
				the_post_navigation( array(
					'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'million-shades' ),
				) );
				} elseif ( is_singular( 'post' ) ) {
				//Blog post navigation( Previous/next)
				the_post_navigation( array(
					'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'million-shades' ) . '</span> ' .
						'<span class="screen-reader-text">' . __( 'Next post:', 'million-shades' ) . '</span> ' .
						'<span class="post-title">%title</span>',
					'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'million-shades' ) . '</span> ' .
						'<span class="screen-reader-text">' . __( 'Previous post:', 'million-shades' ) . '</span> ' .
						'<span class="post-title">%title</span>',
				) );
	}
	
}




if(!function_exists('million_shades_is_product_category')) {
	function million_shades_is_product_category() {
		return function_exists('is_product_category') && is_product_category();
	}
}



function million_shades_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'million_shades_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
 
 

function million_shades_pingback_header() {
	
if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
	
}
add_action( 'wp_head', 'million_shades_pingback_header' );


function million_shades_add_search_box( $items, $args ) {
	
$items .= '<li class="search-icon"><i class="fa fa-search"></i></li>';
return $items;

}
add_filter( 'wp_nav_menu_items','million_shades_add_search_box', 10, 2 );
