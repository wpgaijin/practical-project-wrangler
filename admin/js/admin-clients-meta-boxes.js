/*---------------------------------------------------------
 * JavaScript for Clients meta boxes
---------------------------------------------------------*/
(function( $ ) {
	'use strict';

	 $(function() {
	 	$('#ppw_clients_billing_different').click(function() {
		    if($(this).is(':checked')) {
		        $('.ppw-hide').addClass('ppw-show');
		    } else {
		        $('.ppw-hide').removeClass('ppw-show').val('');
		    }
		});
	 });

})( jQuery );