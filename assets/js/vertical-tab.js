
( function( $ ) {
	// Variables
	const $tabLink = $( '#cns-tabs-section .cns-tab-link' );
	const $tabBody = $( '#cns-tabs-section .cns-tab-body' );
	let timerOpacity;

	// Toggle Class
	const init = () => {
		// Menu Click
		$tabLink.off( 'click' ).on( 'click', function( e ) {
			// Prevent Default
			e.preventDefault();
			e.stopPropagation();

			// Clear Timers
			window.clearTimeout( timerOpacity );

			// Toggle Class Logic
			// Remove Active Classes
			$tabLink.removeClass( 'active ' );
			$tabBody.removeClass( 'active ' );
			$tabBody.removeClass( 'active-content' );

			// Add Active Classes
			$( this ).addClass( 'active' );
			$( $( this ).attr( 'href' ) ).addClass( 'active' );

			// Opacity Transition Class
			timerOpacity = setTimeout( () => {
				$( $( this ).attr( 'href' ) ).addClass( 'active-content' );
			}, 50 );
		} );
	};

	// Document Ready
	$( function() {
		init();
	} );
}( jQuery ) );
