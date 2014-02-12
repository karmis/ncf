// Submit ajax form
window.bs.nc.core.commons.submit = {
	form:{},
	data:{},
};
// form element, button element, type request, dataType ajax, object with callbacks
window.bs.nc.core.commons.submit.form.ajax = function(fEl, bEl, path, callbacks, type, dataType)
{

		if(!type){
			var type = "POST";
		}

		if(!dataType){
			var dataType = "html";
		}
	    
	    $.ajax({
	        type: type,
	        url: path,
	        data: fEl.serialize(),
	        dataType: dataType,
	        beforeSend: function(){
	        	if(bEl){
	        		bEl.button('loading');
	        	}
	        	if(callbacks.before){
	        		callbacks["before"]();
	        	}
	        },
	        success: function(data){

	        	if(bEl){
	        		bEl.button('reset');
	        	}
	        	if(callbacks.after){
	        		callbacks["after"]();
	        	}

				var resp = $.parseJSON(data);
				switch (resp.responseCode){
					case 200:
						callbacks["200"](resp);
					break;
					case 404:
						debugger;
						callbacks["404"](resp);
					break;
					case 500:
						callbacks["500"](resp);
					break;
					default:
						return;
					break;
				}
	        },
	        error: function(){
	        	if(bEl){
	        		bEl.button('reset');
	        	}
	        }
	    });
}