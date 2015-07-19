<?php
$options = get_option( PPW_PREFIX . '_options' );
$display = $options[PPW_PREFIX . '_options_project_display'];
$display_amount = $options[PPW_PREFIX . '_options_project_display_amount'];
?>
<div class="ppw__project-display default-<?php echo $display; ?>">
	<form id="ppw__project-search" class="ppw__project-search" method="get" action="">
		<div class="ppw__th">
			<label for="ppw__project-search-submit"><?php echo _e( 'Project Search', PPW_TEXTDOMAIN ); ?></label>
		</div>
		<div class="ppw__td">
			<div class="ppw_searchfrom__input">
		    	<input type="search" value="" class="ppw__project-search-field" name="ppw__project-search" id="ppw__project-search-field" />
		    	<div id="ppw__project_ac_results" class="ppw__project_ac_results"></div>
		    </div>
		    <img class="ppw__ajax waiting" src="<?php echo admin_url('images/wpspin_light.gif'); ?>" style="display:none"/>
		    <input type="submit" id="ppw__project-search-submit" class="ppw__project-search-submit" value="<?php echo _e( 'Submit', PPW_TEXTDOMAIN ); ?>" />
	    </div>
	</form>
	<div id="ppw__project-display-results" class="ppw__project-display-results">
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
				// Include project block template
				ppw_get_plugin_part( 'includes/views/template-ppw-project-block' ); 
			endwhile; 
			echo ppw_pagination();
		endif; wp_reset_postdata(); 
		?>
	</div>
</div>