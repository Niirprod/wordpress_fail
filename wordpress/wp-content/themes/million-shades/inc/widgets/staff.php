<?php

/**
 * Staff Carousel Widget
 *
 * @package Million Shades
 */
 
class Million_Shades_Staff extends WP_Widget {
	
	/**
	 * Register widget
	**/
	
	public function __construct() {
		
		$widget_ops = array('classname' => 'staff-carousel-widget', 'description' => __( 'Staff Carousel', 'million-shades') );
        parent::__construct(false, $name = __('MS Staff Carousel', 'million-shades'), $widget_ops);
		$this->alt_option_name = 'staff-carousel-widget';
		
		
    }

	/**
	 * Front-end display of widget
	**/
	function widget( $args, $instance ) {
				
		extract( $args );

		
		$no_of_post   	= isset( $instance['no_of_post'] ) ? esc_attr( $instance['no_of_post'] ) : '';
		$categories   	= isset( $instance['categories'] ) ? esc_attr( $instance['categories'] ) : '';
		$order_by   	= isset( $instance['title_tag'] ) ? esc_attr( $instance['order_by'] ) : '';
		$orders   	= isset( $instance['orders'] ) ? esc_attr( $instance['orders'] ) : '';
		$slideshow_speed   	= isset( $instance['slideshow_speed'] ) ? esc_attr( $instance['slideshow_speed'] ) : '';
		$control1_nav   	= isset( $instance['control1_nav'] ) ? esc_attr( $instance['control1_nav'] ) : '';
	
		
		$direction_nav   	= isset( $instance['direction_nav'] ) ? esc_attr( $instance['direction_nav'] ) : '';
		
		$item_width   	= isset( $instance['item_width'] ) ? esc_attr( $instance['item_width'] ) : '300';
		
		$item_margin   	= isset( $instance['item_margin'] ) ? esc_attr( $instance['item_margin'] ) : '100';
		$maximum_item   	= isset( $instance['maximum_item'] ) ? esc_attr( $instance['maximum_item'] ) : '';
		
		$style   	= isset( $instance['style'] ) ? esc_attr( $instance['style'] ) : '';
		$border_style   	= isset( $instance['border_style'] ) ? esc_attr( $instance['border_style'] ) : '';
		
	
		echo $before_widget;
		
		if ($item_margin == ''){
			$item_margin = '100';
		}
		if ($item_width == ''){
			$item_width = '300';
		}
		
			
        
	$id = million_shades_html_id('staff-carousel');
	$class = '.';
	$class .= $id;
	
	
	$img_styles = "width:100%;";
	
	

	 $staff_carousels = million_shades_slide_carousel_style($class,'.staff-carousel-widget',$slideshow_speed,'600','false',$control1_nav,$direction_nav,$item_width,$item_margin,'1',$maximum_item);

?>




<div class="staff-carousel-widget flexsliders <?php echo esc_attr($id); ?>">
 
		<?php
  
  $args = array(
					'post_type' => 'staffs',
					'staff-category' => $categories,
					'posts_per_page' => $no_of_post,
					
					'orderby' =>$order_by,
					'order' =>$orders,
					
				
			
					'post_status' => 'publish'
				);
		
		$loop = new WP_Query( $args );
  
  
  

  ?>

	<ul class="slides" >
   
		<?php while ($loop->have_posts()) : $loop->the_post(); ?> 
		<li class="vc-staff-content <?php echo esc_attr($border_style); ?>">
   
			<div class="vc-staff-media-style">
		
				<div class="avatar1">
                    <?php $src = get_the_post_thumbnail_url();
					if ($src == ''){
			
						$src = get_template_directory_uri() . "/assets/images/placeholder.jpg"; 
		
						} else {
		
						$src = esc_url($src);
		
					}  ?>
					
					 <img  alt="Staff Photo" height="300"
					 src="<?php echo esc_url($src) ?>" style="<?php echo esc_attr($img_styles) ?>" />
		
				</div>
			</div>
			<div class="vc-staff-text">
			
				<div class="staff-designation">
					<?php 
						
					$staff_designation = get_post_meta( get_the_ID(), 'staff_designation', true );
					$title =  get_the_title(); ?>
							
					<span class="name"><?php  echo esc_html($title);?> </span>
				
					<span class="<?php echo esc_attr($style); ?>"><?php echo esc_html($staff_designation); ?></span>
							
						
				</div>
			
      
				<div class="vc-staff-social">
					<?php   for ( $i = 1; $i <= 4; $i ++ ) {
					$social_url='';
					$social_icon ='';
					$social_url = get_post_meta( get_the_ID(), 'staff_social_url'.$i, true );
					$social_icon = get_post_meta( get_the_ID(), 'staff_social_icon'.$i, true );
							
							
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
			
	   
	
		</div>
								
    </li>	

	<?php
	endwhile;
	
	?> 	
	</ul>
	
	
  
</div>
<?php echo $staff_carousels;
wp_reset_postdata();  ?>
<?php
		
		echo $after_widget;
		
	}

	/**
	 * Sanitize widget form values as they are saved
	**/
	
	function update( $new_instance, $old_instance ) {
		
		$instance = $old_instance;

		$instance['no_of_post'] = absint( $new_instance['no_of_post'] );
		$instance['categories'] = sanitize_text_field( $new_instance['categories'] );
		$instance['orders'] = million_shades_sanitize_order( $new_instance['orders'] );
		$instance['order_by'] = million_shades_sanitize_order_by( $new_instance['order_by'] );
		$instance['slideshow_speed'] = million_shades_sanitize_slide_speeds( $new_instance['slideshow_speed'] );
		
		$instance['control1_nav'] = million_shades_sanitize_false_true( $new_instance['control1_nav'] );
	
		$instance['direction_nav'] = million_shades_sanitize_false_true( $new_instance['direction_nav'] );
		$instance['maximum_item'] = absint( $new_instance['maximum_item'] );

		
		$instance['item_margin'] = absint( $new_instance['item_margin'] );
		
		$instance['item_width'] = absint( $new_instance['item_width'] );
		$instance['style'] = million_shades_sanitize_display_style( $new_instance['style'] );
		$instance['border_style'] = million_shades_sanitize_widget_style( $new_instance['border_style'] );

		return $instance;
		
	}

	/**
	 * Back-end widget form
	**/
	function form( $instance ) {
		
	
	
	$widget_style = array('position-inline'=>__('position-inline','million-shades'),'position-block'=>__('position-block','million-shades'));
	
	$border_styles = array('none'=>__('None','million-shades'),'style1'=>__('Style1','million-shades'),'style2'=>__('Style2','million-shades'),'style3'=>__('Style3','million-shades'),'style4'=>__('Style4','million-shades'));
	
	
	$post_orders = array('ASC'=>__('ASC','million-shades'),'DESC'=>__('DESC','million-shades'));
	
	$post_order_by = array('title'=>__('Title','million-shades'),'date'=>__('Date','million-shades'));
	
	$directions_nav = array('true'=>__('True','million-shades'),'false'=>__('False','million-shades'));
	$controls_nav = array('true'=>__('True','million-shades'),'false'=>__('False','million-shades'));
	
	$slide_speeds = array('5000'=>__('5000','million-shades'),'4000'=>__('4000','million-shades'),
	'3500'=>__('3500','million-shades'),'3000'=>__('3000','million-shades'),'2000'=>__('2000','million-shades'));

	$max_items = array('3'=>__('3','million-shades'),'4'=>__('4','million-shades'),
	'5'=>__('5','million-shades'),'2'=>__('2','million-shades'));

	
	
		$no_of_post   	= isset( $instance['no_of_post'] ) ? esc_attr( $instance['no_of_post'] ) : '';
		$categories   	= isset( $instance['categories'] ) ? esc_attr( $instance['categories'] ) : '';
		$order_by   	= isset( $instance['title_tag'] ) ? esc_attr( $instance['order_by'] ) : '';
		$orders   	= isset( $instance['orders'] ) ? esc_attr( $instance['orders'] ) : '';
		$slideshow_speed   	= isset( $instance['slideshow_speed'] ) ? esc_attr( $instance['slideshow_speed'] ) : '';
		$control1_nav   	= isset( $instance['control1_nav'] ) ? esc_attr( $instance['control1_nav'] ) : '';
	
		
		$direction_nav   	= isset( $instance['direction_nav'] ) ? esc_attr( $instance['direction_nav'] ) : '';
		
		$item_width   	= isset( $instance['item_width'] ) ? esc_attr( $instance['item_width'] ) : '';
		
		$item_margin   	= isset( $instance['item_margin'] ) ? esc_attr( $instance['item_margin'] ) : '';
		$maximum_item   	= isset( $instance['maximum_item'] ) ? esc_attr( $instance['maximum_item'] ) : '';
		
		$style   	= isset( $instance['style'] ) ? esc_attr( $instance['style'] ) : '';
		$border_style   	= isset( $instance['border_style'] ) ? esc_attr( $instance['border_style'] ) : '';
		
	?>
	
	

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'no_of_post' ) ); ?>">
			<?php esc_html_e('No of Post:', 'million-shades'); ?></label>
			<input type="text" id="<?php echo esc_attr( $this->get_field_id( 'no_of_post' ) ); ?>" 
			name="<?php echo esc_attr( $this->get_field_name( 'no_of_post' ) ); ?>" value="<?php echo esc_attr( $no_of_post ); ?>" 
			class="widefat" />
		</p>
		
		<p>
			<label for = "<?php echo esc_attr( $this->get_field_id( 'categories' ) ); ?>"><?php esc_html_e('Enter categories separated with comma or leave empty for all.:', 'million-shades'); ?>
			</label>
			<input type="text" id="<?php echo esc_attr( $this->get_field_id( 'categories' ) ); ?>" 
			name="<?php echo esc_attr( $this->get_field_name( 'categories' ) ); ?>" value="<?php echo esc_attr( $categories ); ?>" 
			class="widefat" />
		</p>
		
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('orders')); ?>"><?php esc_html_e('Order:', 'million-shades'); ?></label>
    
			<select class="widefat"  name="<?php echo esc_attr($this->get_field_name('orders')) ?>" id="<?php echo esc_attr($this->get_field_id('orders')) ?> ">
             <?php foreach ($post_orders as $key => $value) { ?>
	
					<option <?php echo ($orders == $key ) ? ' selected="selected"' : ''; ?> 
				value="<?php echo esc_attr( $key ); ?>"><?php 
				echo esc_attr( $value ); ?></option>

				
                <?php } ?>
			</select>
  
		</p>
		
		
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('order_by')); ?>"><?php esc_html_e('Order By:', 'million-shades'); ?></label>
    
			<select class="widefat"  name="<?php echo esc_attr($this->get_field_name('order_by')) ?>" id="<?php echo esc_attr($this->get_field_id('order_by')) ?> ">
             <?php foreach ($post_order_by as $key => $value) { ?>
	
					<option <?php echo ($order_by == $key ) ? ' selected="selected"' : ''; ?> 
				value="<?php echo esc_attr( $key ); ?>"><?php 
				echo esc_attr( $value ); ?></option>

				
                <?php } ?>
			</select>
  
		</p>
		
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('slideshow_speed')); ?>"><?php esc_html_e('Slideshow Speed:', 'million-shades'); ?></label>
    
			<select class="widefat"  name="<?php echo esc_attr($this->get_field_name('slideshow_speed')) ?>" id="<?php echo esc_attr($this->get_field_id('slideshow_speed')) ?> ">
             <?php foreach ($slide_speeds as $key => $value) { ?>
	
					<option <?php echo ($slideshow_speed == $key ) ? ' selected="selected"' : ''; ?> 
				value="<?php echo esc_attr( $key ); ?>"><?php 
				echo esc_attr( $value ); ?></option>

				
                <?php } ?>
			</select>
  
		</p>
		
		
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('maximum_item')); ?>"><?php esc_html_e('Maximum Staffs Per Slide:', 'million-shades'); ?></label>
    
			<select class="widefat"  name="<?php echo esc_attr($this->get_field_name('maximum_item')) ?>" id="<?php echo esc_attr($this->get_field_id('maximum_item')) ?> ">
             <?php foreach ($max_items as $key => $value) { ?>
	
					<option <?php echo ($maximum_item == $key ) ? ' selected="selected"' : ''; ?> 
				value="<?php echo esc_attr( $key ); ?>"><?php 
				echo esc_attr( $value ); ?></option>

				
                <?php } ?>
			</select>
  
		</p>
		
		
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'item_width' ) ); ?>">
			<?php esc_html_e('Staff Width:', 'million-shades'); ?></label>
			<input type="text" id="<?php echo esc_attr( $this->get_field_id( 'item_width' ) ); ?>" 
			name="<?php echo esc_attr( $this->get_field_name( 'item_width' ) ); ?>" value="<?php echo esc_attr( $item_width ); ?>" 
			class="widefat" />
		</p>
		
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'item_margin' ) ); ?>">
			<?php esc_html_e('Staff Gap:', 'million-shades'); ?></label>
			<input type="text" id="<?php echo esc_attr( $this->get_field_id( 'item_margin' ) ); ?>" 
			name="<?php echo esc_attr( $this->get_field_name( 'item_margin' ) ); ?>" value="<?php echo esc_attr( $item_margin ); ?>" 
			class="widefat" />
		</p>
		
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('control1_nav')); ?>"><?php esc_html_e('Control Navigation:', 'million-shades'); ?></label>
    
			<select class="widefat"  name="<?php echo esc_attr($this->get_field_name('control1_nav')) ?>" id="<?php echo esc_attr($this->get_field_id('control1_nav')) ?> ">
             <?php foreach ($controls_nav as $key => $value) { ?>
	
					<option <?php echo ($control1_nav == $key ) ? ' selected="selected"' : ''; ?> 
				value="<?php echo esc_attr( $key ); ?>"><?php 
				echo esc_attr( $value ); ?></option>

				
                <?php } ?>
			</select>
  
		</p>
		
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('direction_nav')); ?>"><?php esc_html_e('Direction Navigation:', 'million-shades'); ?></label>
    
			<select class="widefat"  name="<?php echo esc_attr($this->get_field_name('direction_nav')) ?>" id="<?php echo esc_attr($this->get_field_id('direction_nav')) ?> ">
             <?php foreach ($directions_nav as $key => $value) { ?>
	
					<option <?php echo ($direction_nav == $key ) ? ' selected="selected"' : ''; ?> 
				value="<?php echo esc_attr( $key ); ?>"><?php 
				echo esc_attr( $value ); ?></option>

				
                <?php } ?>
			</select>
  
		</p>
		
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('style')); ?>"><?php esc_html_e('Widget Style:', 'million-shades'); ?></label>
    
			<select class="widefat"  name="<?php echo esc_attr($this->get_field_name('style')) ?>" id="<?php echo esc_attr($this->get_field_id('style')) ?> ">
             <?php foreach ($widget_style as $key => $value) { ?>
	
					<option <?php echo ($style == $key ) ? ' selected="selected"' : ''; ?> 
				value="<?php echo esc_attr( $key ); ?>"><?php 
				echo esc_attr( $value ); ?></option>

				
                <?php } ?>
			</select>
  
		</p>
		
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('border_style')); ?>"><?php esc_html_e('Border Style:', 'million-shades'); ?></label>
    
			<select class="widefat"  name="<?php echo esc_attr($this->get_field_name('border_style')) ?>" id="<?php echo esc_attr($this->get_field_id('border_style')) ?> ">
             <?php foreach ($border_styles as $key => $value) { ?>
	
					<option <?php echo ($border_style == $key ) ? ' selected="selected"' : ''; ?> 
				value="<?php echo esc_attr( $key ); ?>"><?php 
				echo esc_attr( $value ); ?></option>

				
                <?php } ?>
			</select>
  
		</p>
		
		
		
	<?php
	}
	
	
	

}



?>