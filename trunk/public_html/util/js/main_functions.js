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
		
		if (loginObject.css('display') == 'block') {
			actualState = 'open';
			actualWidth = loginObject.width();
		} else if (loginObject.css('display') == 'none') {
			actualState = 'close';

			if (typeof(actualWidth) == "undefined") {actualWidth = loginObject.width()};
			//actualWidth = (actualWidth != '0')? 'loginObject.width()' : '0';
		}
		
		switch (action) {
			case 'auto':
				if (actualState == 'open') {
					animateLoginClose(loginObject);
				} else if (actualState == 'close') {
					animateLoginOpen(loginObject,actualWidth);
				}
				break;
			case 'open':
				animateLoginOpen(loginObject,actualWidth);
				break;
			case 'close':
				animateLoginClose(loginObject);
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