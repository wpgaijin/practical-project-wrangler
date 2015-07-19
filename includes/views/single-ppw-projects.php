<?php
// Filters
$main_classes = apply_filters( 'ppw_single_template_main_classes', 'projects__single' );
$main_role = apply_filters( 'ppw_single_template_main_role', 'main' );
$project_wrapper = apply_filters( 'ppw_single_template_wrapper', 'projects__single--wrapper' );
$project_title_classes = apply_filters( 'ppw_single_template_project_title_classes', 'projects__single--title' );
$category_classes = apply_filters( 'ppw_single_template_project_title_classes', 'projects__single--meta' );
?>
<?php
do_action( 'ppw_before_header_output' ); // Action before the header output
get_header(); // Get the header
?>
	<?php do_action( 'ppw_before_single_template' ); // Action before the main element ?>
	<main <?php echo ppw_get_attribute( 'class', $main_classes ); echo ppw_get_attribute( 'role', $main_role );?>>
		<?php 
		do_action( 'before_single_template_loop' ); // Action before the single template loop
		while ( have_posts() ) : the_post(); // begin the loop
			do_action( 'before_single_template_project_wrapper' ); // Action before the single template project wrapper
		?>
			<div <?php echo ppw_get_attribute( 'class', $project_wrapper ); ?>>
				<h1 <?php echo ppw_get_attribute( 'class', $project_title_classes ); ?>>
					<?php the_title(); ?>
				</h1>
				<div <?php echo ppw_get_attribute( 'class', $category_classes ); ?>>
					<?php echo ppw_get_product_categories( $post->ID ); ?>
				</div>
			</div>
		<?php 
		endwhile; ?>
		<?php do_action( 'after_single_loop' ); // Action after the loop?>
	</main>
<?php 
do_action( 'ppw_before_footer' ); // Action before the footer 
get_footer(); // Get the footer
?>