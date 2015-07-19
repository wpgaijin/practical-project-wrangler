<?php
global $post, $curr_letter;
$options                    = get_option( PPW_PREFIX . '_options' );
$excerpt_length             = $options[PPW_PREFIX . '_options_project_excertp_length'];
$project_description        = get_post_meta( get_the_ID(), PPW_PREFIX . '_projects_desc', true );
$project_category           = get_post_meta( get_the_id(), PPW_PREFIX . '_projects_category', true );
$project_clients            = get_post_meta( get_the_id(), PPW_PREFIX . '_projects_client', true );
$project_assigned           = get_post_meta( get_the_id(), PPW_PREFIX . '_assigned', true );
$this_letter                = strtoupper( substr( $post->post_title, 0, 1) );
$projects_group_title       = apply_filters( 'ppw_projects_group_title', 'ppw__Listing-group--title' );
$projects_block             = apply_filters( 'ppw_projects_block', 'ppw__projects-block' );
$projects_block_title       = apply_filters( 'ppw_projects_block_title', 'ppw__project-block--title' );
$projects_block_categories  = apply_filters( 'ppw_projects_block_categories', 'ppw__projects-block--categories' );
$projects_block_description = apply_filters( 'ppw_projects_block_description', 'ppw__projects-block--description' );
$projects_block_avatars     = apply_filters( 'ppw_projects_block_avatars', 'ppw__projects-block--avatars' );
$projects_block_link        = apply_filters( 'ppw_projects_block_link', 'ppw__projects-block--link' );
if( $this_letter != $curr_letter ) {
  $curr_letter = $this_letter;
  echo '<div ' . ppw_get_attribute( 'class', $projects_group_title ) . '><h2>'.$this_letter.'</h2></div>';
}
?>
<div <?php echo ppw_get_attribute( 'class', $projects_block ); ?>>
  <h2 <?php echo ppw_get_attribute( 'class', $projects_block_title ); ?>>
    <?php the_title(); ?>
  </h2>
  <div <?php echo ppw_get_attribute( 'class', $projects_block_categories ); ?>>
    <?php echo ppw_get_product_categories( $post->ID ); ?>
  </div>
  <div <?php echo ppw_get_attribute( 'class', $projects_block_description ); ?>>
    <?php echo wp_trim_words( $project_description, $excerpt_length ); ?>
  </div>
  <div <?php echo ppw_get_attribute( 'class', $projects_block_avatars ); ?>>
    <?php echo ppw_get_project_user_avatar( $project_clients, $project_assigned ) ?>
  </div>
  <a href="<?php echo the_permalink(); ?>" <?php echo ppw_get_attribute( 'class', $projects_block_link ); ?>></a>
</div>