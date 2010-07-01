function animateLoginAction(action)
{
	//Recebe a ação para o cotainer de login
	//open,close,auto
	
	if (typeof(inActionAnimateLogin) == "undefined") {
		inActionAnimateLogin = false;
	}
		
	if (!inActionAnimateLogin) {
		loginObject = $('#login');
		
		var actualState = '';
		
		inActionAnimateLogin = true;
		if ($.cookie('loginMenuState') != null) {
			actualState = $.cookie('loginMenuState');
		} else {
			if (loginObject.display == 'block') {
				actualState = 'open';
			} else {
				actualState = 'close';
			}
		}	
		
		
		switch (actualState) {
		case 'open':
			actualWidth = loginObject.width();
			break;
		case 'close':
			if (typeof(actualWidth) == "undefined") {actualWidth = loginObject.width();};
			break;
		}

		switch (action) {
			case 'auto':
				if (actualState == 'open') {
					animateLoginClose(loginObject);
					$.cookie('loginMenuState', 'close');
				} else if (actualState == 'close') {
					$.cookie('loginMenuState', 'open');
					animateLoginOpen(loginObject,actualWidth);
				}
				break;
			case 'open':
				animateLoginOpen(loginObject,actualWidth);
				$.cookie('loginMenuState', 'close');
				break;
			case 'close':
				animateLoginClose(loginObject);
				$.cookie('loginMenuState', 'open');
				break;
		}
	}

}

function animateLoginOpen(loginObj,widthObj)
{
	loginObj.css('width','0');
	loginObj.animate({width:widthObj}, 1500, function() {
		loginObj.css('display','block');
		inActionAnimateLogin = false;
		
	  });
}

function animateLoginClose(loginObj)
{
	loginObj.animate({width:0}, 1500, function() {
		loginObj.css('display','none');
		inActionAnimateLogin = false;
		$.cookie('loginMenuState', 'close');
	  });
}