/*---------------------------------------------------------
 * JavaScript for Project Search
---------------------------------------------------------*/
(function( $ ) {
	'use strict';
	 $(function() {
	 	// Autocomplete
	 	$('#ppw__project-search-field').keyup( function() {
	 		var project_autocomplete = $(this).val();
	 		$('.ppw__project_ac_results').show();
	 		// show thw AJAX animation while working
		 	$('.ppw__ajax').show();
	 		$.ajax({
	 			type: 'POST',
	 			dataType: 'json',
	 			url: ppw_project_vars.ajaxurl,
	 			data: {
		 			action: 'ppw_project_autocomplete',
		 			project_title: project_autocomplete,
		 			ppw_ac_nonce: ppw_project_vars.ppw_project_ac_nonce
		 		},
	 			success: function(autocomplete_response) {
	 				// clear the field
	 				$('#ppw__project_ac_results').html('');
	 				// hide the AJAX animation whwn done working
	 				$('.ppw__ajax').hide();
	 				// Check the ac_id value
					if(autocomplete_response.ac_id === 'found') {
						$(autocomplete_response.ac_results).appendTo('#ppw__project_ac_results');
					} else if(autocomplete_response.ac_id === 'fail' ) {
						$('#ppw__project_ac_results').text(autocomplete_response.ac_msg);
					}
	 			},
	 			error: function(XMLHttpRequest, textStatus, errorThrown) { 
			        console.log("Status: " + textStatus); 
			        console.log("Error: " + errorThrown); 
			    }
	 		});
	 	});
	 	// add clicked result to the field and clear the results
	 	$('body').on('click.ppwSelectProject', '#ppw__project_ac_results a', function(e) {
	 		e.preventDefault();
	 		var project = $(this).data('project');
	 		$('#ppw__project-search-field').val(project);
	 		$('#ppw__project_ac_results').html('');
	 		$('.ppw__project_ac_results').hide();
	 	});
	 	// search
	 	$('#ppw__project-search-submit').click( function(e) {
	 		e.preventDefault();
	 		// clear the field
	 		$('#ppw__project_ac_results').html('');
	 		var search_value = $('#ppw__project-search-field').val();
	 		$.ajax({
	 			type: 'POST',
	 			dataType: 'json',
	 			url: ppw_project_vars.ajaxurl,
	 			data: {
		 			action: 'ppw_project_search',
		 			search_string: search_value,
		 			ppw_search_nonce: ppw_project_vars.ppw_project_search_nonce
		 		},
	 			success: function(search_response) {
	 				$('#ppw__project-display-results').html('');
					if(search_response.search_id === 'found') {
						$(search_response.search_results).appendTo('#ppw__project-display-results');
					} else if(search_response.search_id === 'fail' ) {
						$('#ppw__project-display-results').text(search_response.search_msg);
					}
	 			},
	 			error: function(XMLHttpRequest, textStatus, errorThrown) { 
			        console.log("Status: " + textStatus); 
			        console.log("Error: " + errorThrown); 
			    }
	 		});
	 		
	 	});
	 });
})( jQuery );