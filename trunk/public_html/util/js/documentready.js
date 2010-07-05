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
	
	
	var scroll = $("#info");
	infoHeight = scroll.height();
	
	if (infoHeight > 780) {
		$(':range').attr('max',infoHeight);
	    $(":range").rangeinput({
	    	progress: false,
	        onSlide: function(ev, step)  {
	    		var progressbar = $(".progress");
	            scroll.css({top: -step});
	            pgstep = 477*step;
	            max = infoHeight;
	            progressbar.height(477-parseInt(pgstep/max));
	        },
	        
	        change: function(e, i) {
	            scroll.animate({top: -i}, "fast");
	        }
	    });
	    $('.handle').css('top', '477px');
	    $('.progress').css('height', '477px');
	} else {
		$(":range").css('display','none');
	}
});