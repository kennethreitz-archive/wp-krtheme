// javascript method: "pxToEm"
eval(function(p,a,c,k,e,r){e=function(c){return c.toString(a)};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('(4($){k.9.7=5.9.7=4(a){3 b=p;2(b.j==5)b=d(b);2(!a)3 a=$(\'g\');2($(a).6()>0){3 c=b*(1/(d($(a).r("n-6"))))+\'m\';8 c}l 8\'i: o h q f s a e t\'}})(u);',31,31,'||if|var|function|String|size|pxToEm|return|prototype||||parseInt|DOM|is|body|scope|Error|constructor|Number|else|em|font|Provided|this|argument|css|not|element|jQuery'.split('|'),0,{}));

if(typeof jQuery != 'undefined') {
	jQuery(function($) {
		$.fn.extend({
			cheatCode: function(options) {
				var $$	= $(this),
					s	= $.extend({}, $.fn.cheatCode.defaults, options),
					o 	= $.metadata ? $.extend({}, s, $$.metadata()) : s,
					k	= [];
				
				return this.each(
					function() {
						$$.bind('keydown.cheatCode' + o.code.toString(), function(e){
							k.push(e.keyCode);
							if(k.toString().indexOf(o.code) >= 0){
								k = [];
								o.activated.call(this, o);
								unbind.call(this, o);
							}
						});
					}
				);
			}
		});
		
		complete = function(o){
			var $overlay = $('<div class="overlay"></div>')
				$message = $('<div class="modal"></div>');
			
			$message.text(o.message).appendTo('body');
			$overlay.appendTo('body');
			setTimeout(function(){
				$message.fadeOut(500, function(){
					$(this).remove();
					$overlay.fadeOut(500, function(){
						$(this).remove();
					});
				});
			}, 1000);
		};
		
		unbind = function(o){
			if(o.unbind===true) {
				$(this).unbind('keydown.cheatCode' + o.code.toString());
			}
		};
		
		$.fn.cheatCode.defaults = {
			'code' 		: '38,38,40,40,37,39,37,39,66,65',
			'unbind'	: true,
			'activated'	: complete,
			'message'	: 'Cheat Code Activated'
		};
	});
}


$(document).cheatCode({
	activated : function(){
		alert('My secret…')
	}
});
