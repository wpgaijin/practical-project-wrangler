/*---------------------------------------------------------
 * JavaScript for Projects meta boxes
---------------------------------------------------------*/
(function( $ ) {
	'use strict';

	 $(function() {
		$('#ppw_projects_category').change(function() {
	        if($(this).val() !== '') {
	            $('.ppw-hide').addClass('ppw-show');
		    } else {
		        $('.ppw-hide').removeClass('ppw-show').val('');
		    }
    	});
	 });

})( jQuery );