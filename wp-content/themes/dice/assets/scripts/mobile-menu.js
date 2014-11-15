jQuery(document).ready(function($) {
	$( "#mobile-menu-action" ).click(function() {
		$('#mobile-menu-action').toggleClass('on');
		$('nav.navigation').toggle();
	});
	$(window).on('resize', function(){
		var $containerHeight = $(window).width();
		if ($containerHeight >= 720) {
			$('#mobile-menu-action').removeClass('on');
			$('nav.navigation').show();
		} else {
			$('#mobile-menu-action').addClass('on');
			$('nav.navigation').hide();
		}
	});
});