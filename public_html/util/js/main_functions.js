function containerLogin()
{
	containerObj = $('#login');
	
	if(containerObj.css('display') == 'none') {
		containerObj.animate({width:containerObjOldWidth}, 2000, function() {
			containerObj.css('display','block');
		  });
		
	} else {
		containerObjOldWidth = containerObj.css('width');
		containerObj.animate({width:0}, 2000, function() {
			containerObj.css('display','none');
		  });
	}
}