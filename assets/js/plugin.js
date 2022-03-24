( function () {
	'use strict';

	jQuery( "#request-a-quote-cta-button,#request-a-quote-hide-form-button" ).click(function() {
		jQuery( "#request-a-quote-form" ).toggle( "fast", function() {
			jQuery( "#request-a-quote").toggleClass("open", "fast");
			jQuery( "#request-a-quote-cta").toggle("fast");
		});
	});

	// Form field for id
	jQuery('#request-a-quote-id').val( jQuery('#hidden-request-a-quote-id').val() );
	// Form field for title
	jQuery('#request-a-quote-title').val( jQuery('#hidden-request-a-quote-title').val() );

} )();
