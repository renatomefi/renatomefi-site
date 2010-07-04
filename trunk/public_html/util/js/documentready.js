$(document).ready(function() {
	
	loginMenuState = $.cookie('loginMenuState');
	
	if (loginMenuState != null) {
		
		switch (loginMenuState) {
		case 'open':
			$('#login').css('display','block');
			break;
		case 'close':
			$('#login').css('display','none');
			break;
		}
	} else {
		$.cookie('loginMenuState', 'close', { path: '/' });
	}
	
	infoHeight = $("#info").height();

	if (infoHeight > 780) {
		
		$(':range').attr('max',infoHeight);
		
	    var scroll = $("#info");
	    
	    $(":range").rangeinput({
	        onSlide: function(ev, step)  {
	            scroll.css({top: -step});
	        },
	        progress: true,
	        value: 100,
	        vertical: true,
	        change: function(e, i) {
	            scroll.animate({top: -i}, "fast");
	        },
	        speed: 0
	    });
	    $('.handle').css('top', '477px');
	    $('.progress').css('height', '7px');
	} else {
		$(":range").css('display','none');
	}
});