(function($) {
	jQuery.initInput = {
		defaultValue: '',
		errorMessage: '',
		wdmClassName: 'with-default-message'
	}

	jQuery.fn.initInput = function(arg1,arg2) {

		return this.each(function(){
			var elem = $(this);
			var form = elem.parents('form');
			var wdm = $.initInput.wdmClassName;
			
			if(elem.attr('placeholder')){
				var msg = elem.attr('placeholder');
				var emsg = arg1 || $.initInput.errorMessage;
			}else{
				var msg = arg1 || $.initInput.defaultValue;
				var emsg = arg2 || $.initInput.errorMessage;
			}

			//init
			var init = function(){
				if(elem.val() == '' || elem.val() == msg){
					elem.val(msg).addClass(wdm);
				}
			}

			//set event
			var setEvent = function(){
				elem.focus(function(){
					elem.removeClass(wdm);
					if(elem.val() == msg){
						elem.val('');
					}
				}).blur(init);

				form.submit(function(){
					if(emsg == ''){
						//Allaw empty
						if(elem.val() == msg){
							elem.val('');
						}
					}else{
						//Disallow empty
						if(elem.val() == '' || elem.val() == msg){
							alert(emsg);
							elem.notify('alert');
							return false;
						}
					}
					return true;
				});
			}

			//fire function
			init();
			setEvent();

		});
	};
})(jQuery);