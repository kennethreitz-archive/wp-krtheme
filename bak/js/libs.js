/*@cc_on _d=document;eval('var document=_d')

var e = "abbr,article,aside,audio,bb,canvas,datagrid,datalist,details,dialog,eventsource,figure,footer,header,hgroup,mark,menu,meter,nav,output,progress,section,time,video".split(','),
i = e.length;
while (i--) {
	document.createElement(e[i])
}

@*/

$.fn.markCurrentLocation = function() {
	var path = window.location.href
	return this.each(function(){
		var self = $(this);
		var href = self.attr('href');
		if(path == href){
			var linkLabel = self.text();
			self
				.before('<em><span class="emcontent">'+linkLabel+'</span></em>')
				.remove()
		}else if(RegExp(href).test(path)){
			self
				.wrap('<em></em>')
		}
	})
};

$.fn.orderedFigure = function() {
	return this.each(function(){
		var self = $(this);
		var cont = self.html();
		var cont2 = cont.replace(/(\d)(st|nd|rd|th)/g,'$1<sup>$2</sup>')
		self.html(cont2);
	})
};

$.fn.notify = function(type) {
	var to = {backgroundColor: "white"};
	var duration = 1000;
	switch(type){
		case 'alert':
			var from = {backgroundColor:'#ff9797'};
			break;
		default:
			var from = {backgroundColor:'#fef794'};
			break;
	}
	return this.each(function(){
		$(this).css(from).stop().animate(to,duration,function(){$(this).removeAttr('style')});
	});
};

/**
 * @param query {RegExp}
 * @wrapElement wrapElement {jQuery}
 **/
$.fn.highlightText = function(query,wrapElement){
	var REtag = '<\\/?[^>]+?\\/?>';
	var REtagDivider = new RegExp(REtag+'|[^<>]*','gi');
	return this.each(function(){
		var elem = $(this);

		var srcs = elem.html().match(REtagDivider);
		for(var i=0,l=srcs.length;i<l;i++){
			var obj = srcs[i];
			if(!RegExp(REtag).test(obj)){
				srcs[i] = obj.replace(query,function(matched){
					return $('<div />').append(wrapElement.html(matched)).html();
				})
			}
		}
		elem.html(srcs.join(''));
	})
}

/**
 * @example $('em.highlight').removeOuterTag()
 * @description will turn 'text1 <em class="highlight">text2</em> text3' into 'text1 text2 text3'
 **/
$.fn.removeOuterTag = function(){
	return this.each(function(){
		$(this).replaceWith($(this).html())
	})
}

var iaMobileNavInit = function(){
	$('<div id="shield" />')
		.appendTo('body')
		.css('height',$(document).height()+6)
		.click(function(){
			$(this).toggle();
			$('header nav').hide();
			$('.forRMB').removeClass('focus')
		})
		.hide();

	$('#iMenu')
		.click(function(){
			$('#shield').toggle();
			$(this).toggleClass('focus')
			$('#iLang').removeClass('focus')
			$('.langSelector').hide()
			$('.mainNav').toggle()
			return false;
		})

	$('#iLang')
		.click(function(){
			$('#shield').toggle();
			$(this).toggleClass('focus')
			$('#iMenu').removeClass('focus')
			$('.mainNav').hide()
			$('.langSelector').toggle()
			return false;
		})
};

