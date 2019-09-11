<?php
/**
 * The header for theme million-shades
 * Author: Kudrat E Khuda
 * 
 * @package million-shades
 * 
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>


<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'million-shades' ); ?></a>
	
	
	
		
  <header id="nl-header" class="nl-header" role="banner">	
	
	<!--  Standard Header start from here. First topbar, top of the site header  -->
		
	<div id="main-header" class="main-header">	 
		<div class="topbar">
		    <div class="inner-topbar">
				<div class="topbar-text">
				<!-- contact or text section of topbar -->
					<?php
					million_shades_topbar_text_template();
					?>
				</div> 
				<div class="topbar-social">
				<!-- social media section of topbar -->
					<?php million_shades_topbar_social_template(); ?>
				</div> <!-- end .container -->
		
			</div> <!-- end inner-top-bar -->
		</div> <!-- end top-bar -->
		
		<?php 
		
			$media_position = get_theme_mod('header_media_position','bottom');
			$top_styles ='';
			$bottom_styles ='';
			if ($media_position == 'bottom'){
				$top_styles = "display:none;";
			}
			
			if ($media_position == 'top'){
				$bottom_styles = "display:none;";
			}
			
			
		?>
		
		<div id="header-media-top" class="header-media-container" style="<?php echo esc_attr($top_styles); ?>">
		<?php 
	 if (is_front_page() || is_home()){
		if ( get_header_image() && get_theme_mod('header-media-type','image')=='image') {  ?>
		<?php million_shades_header_media_image_overlay();?>
		<?php 
		} 
		if ( get_theme_mod('header-media-type','image')=='video') {  ?>
			<div class="header-media">
		<?php	the_custom_header_markup();  ?>
			</div>
		<?php 
		}
		if ( get_theme_mod('header-media-type','image')=='slide') {  ?>
			
		<?php	million_shades_header_media_slide_overlay();  ?>
			
		<?php 
		}
	}
	
	?>
	</div>
	
		<div  class="header-margin">	
			<div id="site-header" class="site-header">		
				<div  class="inner-header">	
		
			
					
	
	<!-- Main site-header starts from here -->
	
			<div class="branding">
		
				<div class="nl-logo-title">
				
					<?php  
				$title_type = get_theme_mod('site-title-type','one');
				$title_styles = '';
				?>
				
				<?php if ($title_type == 'one') {
					$title_styles = 'display:block;';
					$logo_styles = 'display:none;';
				} 
				if ($title_type == 'two') {
					$title_styles = 'display:none;';
					$logo_styles = 'display:block;';
				}
				if ($title_type == 'three') {
					$title_styles = 'display:none;';
					$logo_styles = 'display:none;';
				}
				
				
	?>
	<div  class="site-logo" style="<?php echo esc_attr($logo_styles);?>">             

	<?php the_custom_logo();?>
	
    </div>
	<?php 
	
	if ( is_front_page() && is_home() ) : ?>
				<div  class="site-title" style="<?php echo esc_attr($title_styles);?>"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></div>
			<?php else : ?>
				<div class="site-title" id="site-title" style="<?php echo esc_attr($title_styles);?>">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<?php bloginfo( 'name' ); ?></a></div>
			<?php
	endif; 

					?>
				 
				 </div>
			
	<!-- To display site description -->				
		
				<?php	million_shades_get_site_description();?>	
	
				</div>


				<!-- Main Navigation/Main Menu Container starts form here -->
		<div class="site-navigation-container">

				<!-- search on header starts from here  -->
			
			<!-- Main Navigation/Main Menu starts form here -->
			<div class="menu-btn"></div>
					<nav id="main-navigation" class="main-menu" role="navigation">
							
							<div class="hide-mob-menu">			
								<span class="lines">&times;</span>
							</div>
				
					
							<?php if (has_nav_menu('primary')) {
								$args = array(
								'theme_location' => 'primary',
								'container'      => '',
								'items_wrap'     => '<ul id="primary-menu" class="menu main-navi">%3$s</ul>',
								); ?>
							
								
								<!-- To display Main Navigation/Main Menu on desktop -->
								<?php wp_nav_menu($args);
					} else { ?>
								
								<?php	wp_page_menu(array('menu_class' => 'menu', 'items_wrap'     => '<ul id="primary-menu" class="menu nav-menu">%3$s</ul>'));
					} ?>
					
					<div class="search-container">
				
						<!-- To display search box -->
						<div class="nl-search-box">
						<div class="search-wrap">
							<?php get_search_form(); ?>
						</div>
						</div>
					</div> <!-- end search container  -->
					
					</nav> <!-- end #site-navigation -->
					
					
					</div> <!-- end site navigation container -->
		
				</div>  <!-- end inner header -->
				
		
			
			</div><!-- site header  -->
		</div> <!-- header margin  -->
	</div><!-- main header  -->
	
	<div id="header-media-bottom" class="header-media-container" style="<?php echo esc_attr($bottom_styles); ?>">
		<?php 
	 if (is_front_page() || is_home()){
		if ( get_header_image() && get_theme_mod('header-media-type','image')=='image') {  ?>
		<?php million_shades_header_media_image_overlay();?>
		<?php 
		} 
		if ( get_theme_mod('header-media-type','image')=='video') {  ?>
			<div class="header-media">
		<?php	the_custom_header_markup();  ?>
			</div>
		<?php 
		}
		if ( get_theme_mod('header-media-type','image')=='slide') {  ?>
			
		<?php	million_shades_header_media_slide_overlay();  ?>
			
		<?php 
		}
	}
	
	?>
	</div>
	
</header>

<div id="content" class="site-content">
    
