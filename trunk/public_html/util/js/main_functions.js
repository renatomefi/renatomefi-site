function animateLoginAction(action)
{
	//Recebe a ação para o cotainer de login
	//open,close,auto
	
	if (typeof(inActionAnimateLogin) == "undefined") {
		inActionAnimateLogin = false;
	}
		
	if (!inActionAnimateLogin) {
		
		loginObject = $('#login');
		inActionAnimateLogin = true;
		var actualState = $.cookie('loginMenuState');

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
					$.cookie('loginMenuState', 'close', { path: '/', expires: 7 });
				} else if (actualState == 'close') {
					$.cookie('loginMenuState', 'open', { path: '/', expires: 7 });
					animateLoginOpen(loginObject,actualWidth);
				}
				break;
			case 'open': 
				if (actualState == 'close') {
					animateLoginOpen(loginObject,actualWidth);
					$.cookie('loginMenuState', 'open', { path: '/', expires: 7 });
				}
				break;
			case 'close' && actualState == 'open':
				if (actualState == 'open') {
					animateLoginClose(loginObject);
					$.cookie('loginMenuState', 'close', { path: '/', expires: 7 });
				}
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
	  });
}