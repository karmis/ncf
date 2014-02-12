window.bs.nc.core.controllers.cartController = {
	// Search cart by cart code
	searchByCodeAction: {
		click: function(e, el){
			var form = el.attr("bs-nc-trigger-form");

			// Send request
			window.bs.nc.core.commons.submit.form.ajax(	
														$(form), // form
														el, // btn element
														window.bs.nc.core.paths.path_cart_search, // path
														{
															200: function(){
																alert("success");
															}
														}
													)
		}
	}
}