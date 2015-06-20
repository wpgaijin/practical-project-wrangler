/*---------------------------------------------------------
 * JavaScript for Clients meta boxes
---------------------------------------------------------*/
(function( $ ) {
	'use strict';

	 $(function() {
	 	var checkbox = $('#ppw_clients_billing_different');
	 	if(checkbox.is(':checked')) {
	        $('.ppw-hide').addClass('ppw-show');
	    }
	 	checkbox.click(function() {
		    if($(this).is(':checked')) {
		        $('.ppw-hide').addClass('ppw-show');
		    } else {
		        $('.ppw-hide').removeClass('ppw-show').val('');
		    }
		});
	 });

})( jQuery );