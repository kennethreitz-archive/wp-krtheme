(function($) {
	if(typeof ActiveXObject == "function" && typeof XMLHttpRequest == "undefined"){
		XMLHttpRequest = function(){
			try {
				return new ActiveXObject('Msxml2.XMLHTTP');
			} catch (e) {
				return new ActiveXObject('Microsoft.XMLHTTP');
			}
		}
	}
		
	//Setting valiables
	var fileLinkClass = "file";
	var fileTypeClass = "fileType";
	var fileSizeClass = "fileSize";
	var imageLinkClass = "imageLink";
	var originalTextClass = "originalText";
	var notFoundClass = 'notFound';
	var notFoundText = 'Not Found';
	var fileClasses = '(pdf|od[tspdgf]|xlsx?|docx?|pptx?|zip|tar(\.gz)?)';
	var fileExtention = '\\.'+fileClasses+'$';

	//Get path to phpfile
	var helperPHP = $('script[src]:last').attr('src').replace(/\.js/,'.php');

	/**
	 * @sample $('article a').addFileInfo()
	 * @descriptoin If the elements have class or file extention defined as fileClasses and fileExtention, or have fileLinkClass class, it will automatically have fancy file type label before the original text, and the size after. This order is considederd from accessibility perspective.
	 * 
	 * @sample $('a.pdf').addFileInfo()
	 * @desctription 'A' elements which have fileTypeClass will be affected. This class decide displayed file type.
	 * 
	 * @sample $('a.file').addFileInfo()
	 * @desctription 'A' elements which have fileLinkClass will be affected. File type is detected automatically.
	 * 
	 * @returns {jQuery}
	 */
	$.fn.addFileInfo = function(){
		return this.each(function(){

			var elem = $(this);
			var href = elem.get(0).href;
			var fileType = '';
			var fileSize = 0;
			var fileMatch = RegExp(fileExtention).exec(href.replace(/#.+$/,''));
			var classMatch = RegExp(fileClasses).exec(elem.attr('class'));
			if(fileMatch){
				fileType = fileMatch[1];
			}else if(classMatch){
				fileType = classMatch[1];
			}else if(!elem.is('.'+fileLinkClass)){
				return;
			}
			
			var setFileInfo = function(json){
				var contentLength = json['Content-Length'];

				if(!fileType){
					fileType = (/(\/|-)([^-]+)$/.exec(json['Content-Type'])[2]);
				}

				if(String(contentLength-0) != 'NaN'){
					fileSize = Math.round(contentLength / 1024);
					if(fileSize >= 1000){
						fileSize = (Math.round(fileSize / 102.4) / 10) + 'MB';
					}else{
						fileSize = fileSize + 'KB';
					}
				}
					
				elem
					.addClass(fileLinkClass)
					.addClass(fileType)

				if(elem.find('.'+originalTextClass).size() == 0){
					elem.wrapInner('<span class="'+originalTextClass+'" />')
				}

				if(/404/.test(json[0])){
					fileSize = notFoundText;
					elem.find('.'+originalTextClass).addClass(notFoundClass);
				}else{
					elem.prepend('<span class="'+ fileTypeClass +'">'+ fileType.toUpperCase() +'</span> ')
				}


				if(elem.is('*:has(img)')){
					elem.addClass(imageLinkClass)
					$('.'+fileTypeClass,elem).append(' ('+fileSize+')');
				}else{
					elem.append(' <span class="'+fileSizeClass+'">('+fileSize+')</span>');
				}
				
			}
			
			var outset = function(){
				var fte = $('.'+fileTypeClass,elem);
				if(fte.parents('ul').size()){
					var ml = fte.width()
					+ parseInt(fte.css('padding-left').replace(/px/,''))
					+ parseInt(fte.css('padding-right').replace(/px/,''))
					fte.parents('li').css({
						position: 'relative'
					})
					fte.css({
						position: 'absolute',
						marginTop: '.2em',
						marginLeft: -ml -4 + 'px'
					});
				}
			}
			
			var main = function(){
				if(/https?:\/\/(.+?)\//.exec(href)[1] == location.host){
					var req = new XMLHttpRequest();
					req.open('HEAD',href,true);
					req.onreadystatechange = function(){
						if(req.readyState == 4){
							if(req.getResponseHeader("Content-Length")){
								setFileInfo({
									"0": req.getResponseHeader("0"),
									"Content-Type": req.getResponseHeader("Content-Type"),
									"Content-Length": req.getResponseHeader("Content-Length")
								});
							}else{
								$.post(helperPHP,{url:href},setFileInfo,'json')
							}
							req.abort();
						}
					}
					req.send(null);
				}else{
					$.post(helperPHP,{url:href},setFileInfo,'json')
				}
			}

			main();
			outset();

		});
	};
})(jQuery);
