window.bs = {
	nc: {}
}

window.bs.nc.functions = {};
window.bs.nc.paths = {};

// User nav dropdown
window.bs.nc.functions.userNavDropDown= function()
{
	$('a.leftUserDrop').click(function () {
		$('.leftUser').slideToggle(200);
	});
	$(document).bind('click', function(e) {
		var $clicked = $(e.target);
		if (! $clicked.parents().hasClass("leftUserDrop"))
		$(".leftUser").slideUp(200);
	});	
}

window.bs.nc.functions.submitAjaxForm = function(btnSelector, formSelector, path, callbacks)
{
	btnSelector.on("click", function(e) {

		var route = null;
		
		if(path === null){
			route = $(this).attr("action");
		} else {
			route = path;
		}
	    

		debugger;
	    $.ajax({
	        type: "POST",
	        url: route,
	        data: formSelector.serialize(),
	        dataType: "html",
	        success: function(data){
				var resp = $.parseJSON(data);
				switch (resp.responseCode){
					case 200:
						callbacks["200"](resp);
					break;
					case 404:
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
	        // error: function(data){
	        // 	callbacks.error(data);
	        // },
	      //   statusCode: {
			    // 200: function(data){
			    // 	callbacks.f200(data);
			    // },
			    // 404: function(data){
			    // 	callbacks.f404(data);
			    // },
	      //   }
	    });

	    return false;

	});
}
	

$(function() {
	window.bs.nc.functions.userNavDropDown();
});

	
