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
	
});