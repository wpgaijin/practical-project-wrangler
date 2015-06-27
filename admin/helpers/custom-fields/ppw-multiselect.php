<?php
/**
 * Render multiselect field
 *
 * @since 0.0.1
 * @param object $field Current CMB2_field object
 * @param string $escaped_value Current escaped value of the field
 * @param int    $object_id Current object id (probably post_id)
 * @param string $object_type Object type (probably post)
 * @param object $field_object_type Instance of CMB2_Types object
 */
function ppw_render_multiselect( $field, $escaped_value, $object_id, $object_type, $field_object_type ) {
	wp_enqueue_script( PPW_PREFIX . '-select2', PPW_PLUGIN_URL . 'admin/helpers/js/select2.min.js', array( 'jquery' ), PPW_VERSION, true );
	wp_enqueue_script( PPW_PREFIX . '-select2-init', PPW_PLUGIN_URL . 'admin/helpers/js/select2-init.js', array( 'jquery', 'ppw-select2' ), PPW_VERSION, true );
	wp_enqueue_style( PPW_PREFIX . '-select2-style', PPW_PLUGIN_URL . 'admin/helpers/css/select2.css', '', PPW_VERSION, 'all');

	$options = $field->options();
	$current_value = $field->value;

	?>
	<select name="<?php echo $field->args['id']; ?>[]" id="<?php echo $field->args['id']; ?>" class="ppw-multiselect" multiple="multiple">
		<option></option>
		<?php foreach( $options as $key => $value ){ ?>
			<?php 
			if( is_array( $current_value) ) {
				$selected = in_array( $key, $current_value ) ? 'selected="selected"' : ''; 
			} else {
				$selected = '';
			}
			?>
			<option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $value; ?></option>
		<?php } ?>
	</select>

	<?php
} // end ppw_render_multiselect
add_filter( 'cmb2_render_multiselect', 'ppw_render_multiselect', 10, 5 );

function ppw_multiselect_sanitize( $override_value, $value ){
	return $value;
} // sfn_chosen_sanitize
add_filter( 'cmb2_sanitize_ppw_multiselect', 'ppw_multiselect_sanitize', 10, 2 );