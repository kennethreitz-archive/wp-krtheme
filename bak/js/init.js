$(function(){
	$('header nav a').markCurrentLocation();
	$('form.sitesearch :text').initInput('Enter some keyword');
	$('#darth_vader').initInput('It\'s empty!')
	$('.contentBody .date, .contentBody cite').orderedFigure();
	$('article a').addFileInfo();


	if($.browser.mobile){
		iaMobileNavInit();
	}

	if($.browser.msie){
		$('.lu:first-child').addClass('first-child')
	}

})