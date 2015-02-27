/**
 * @file
 * Javascript functionality for the UNHCR Suite Extras administration UI.
 */
(function ($) {
	$( 'document').ready( readyFn );
	function readyFn( jQuery ){
		//$('.description').removeClass('description').addClass( "miami dscColapsed" );
		//$('label').append("<div class='helpbox miamiButton'><img src='../../sites/default/files/humanitarian_icons/help.png' width='17px'></img></div>");
		/*$('div.helpbox').click( function(){
			$('.description').removeClass('description').addClass( "miami dscColapsed" );
			$(this).parent().siblings( ".dscColapsed" ).removeClass('miami dscColapsed').addClass( 'description');
		});
		$('.text-format-wrapper div.helpbox').click( function(){
			$('.description').removeClass('description').addClass( "miami dscColapsed" );
			$(this).parents('.text-format-wrapper').find( ".dscColapsed" ).removeClass('miami dscColapsed').addClass( 'description');
			
		});*/
		// $('.multipage-controls-list').clone().appendTo('.multipage-pane-title');
		//$( ".hello" ).clone().appendTo( ".goodbye" );
		$('.filter-wrapper').remove();
		$('.text-format-wrapper .description').prepend("<p class='click-more'><b>click for more <img src='../../sites/default/files/humanitarian_icons/help.png' width='17px'></img></b></p>");
		$('span .swatch').parent().css('background-color', 'red');
		$('.description').click(function(){
			$('.text-format-wrapper .description').animate({
    height: "136px"
			}, 500);
			var el = $(this),
		    curHeight = el.height(),
		    autoHeight = el.css('height', 'auto').height();
		el.height(curHeight).animate({height: autoHeight}, 1000);
		});
		
		
	}
	
	/*$( '.form-select' ).click(function() {
		  $(this).siblings( ".dscColapsed" ).removeClass('miami dscColapsed');
		});*/
	
})(jQuery);
