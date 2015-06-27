<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$projects_query = new WP_Query(array(
	'post_type'       => PPW_PREFIX . '_projects',
	'posts_per_page'  => $display_amount,
	'orderby'         => 'title',
	'order'           => 'ASC',
	'paged'           => $paged
));
if( $projects_query->have_posts() ) : 
	$curr_letter = '';
	while( $projects_query->have_posts() ) : 
		$projects_query->the_post();
		global $post;
		$project_description = get_post_meta( get_the_ID(), PPW_PREFIX . '_projects_desc', true );
		$project_category = get_post_meta( get_the_id(), PPW_PREFIX . '_projects_category', true );
		$this_letter = strtoupper( substr( $post->post_title, 0, 1) );
		?>
			<?php
			if( $this_letter != $curr_letter ) {
		   		$curr_letter = $this_letter;
		   		echo '<div class="ppw__Listing-group--title"><h2>'.$this_letter.'</h2></div>';
		    }
			?>
			<div class="ppw__project-display--entry">
				<h2 class="ppw__project-name">
					<?php the_title(); ?>
				</h2>
				<div class="ppw__categories">
					<?php echo PPW_Helper_Get_Product_Categories::init(); ?>
				</div>
				<div class="ppw__project-description">
					<?php echo wp_trim_words( $project_description, $excerpt_length ); ?>
				</div>
				<a href="<?php echo the_permalink(); ?>" class="ppw__products--link"></a>
			</div>
	<?php 
	endwhile; 
	new FCWP_Pagination( 'numbers' );
endif; wp_reset_postdata(); 