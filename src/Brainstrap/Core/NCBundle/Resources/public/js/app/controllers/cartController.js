window.bs.nc.core.controllers.cartController = {
	// Search cart by cart code
	click: {
		searchByCodeAction: function(e, el)
		{
			var form = el.attr("bs-nc-trigger-form");

			// Send request
			window.bs.nc.core.commons.submit.form.ajax(
														$(form), // form
														el, // btn element
														window.bs.nc.core.paths.path_cart_search, // path
														{
															before: function()
															{
																$("#modal-request-cart-for-search-by-code").modal('hide');
															},
															// Show cart/info client
															200: function(json)
															{	
																window.bs.nc.core.controllers.sessionController.auto.showAddSessionAction(json);
															},
															404: function(json)
															{
																window.bs.nc.core.commons.fillDataForm($("#form-add-cart-with-client-cart"), json.entity);
																$("#modal-add-cart-with-client").modal('show');
															},
														}
													);
		},
		// createCartAfterClientAction: function(json, el)
		// {
		// 	// var entity = $.parseJSON(json.entity);
		// 	// window.bs.nc.core.commons.fillDataForm($("#form-add-cart-with-client-client"), entity);
			
		// 	// window.bs.nc.core.commons.submit.form.ajax(
		// 	// 											$("#form-add-cart-with-client-client"), // form
		// 	// 											el, // btn element
		// 	// 											window.bs.nc.core.paths.path_client_create, // path
		// 	// 											{
		// 	// 												// Show cart/info client
		// 	// 												200: function(json)
		// 	// 												{
		// 	// 													var entity = $.parseJSON(json.entity);
		// 	// 													window.bs.nc.core.commons.fillDataForm($("#form-modal-add-personal-session"), entity);
		// 	// 													$('.notification').notify({
		// 	// 															message: { text: 'Карта успешно создана' },
		// 	// 															type: "bangTidy"
		// 	// 														}).show();
		// 	// 													$("#modal-add-cart-with-client").modal('hide');
		// 	// 													window.bs.nc.core.controllers.sessionController.click.addSessionShowModalAction(null, $('button#session_addSession'));
		// 	// 												},
		// 	// 											}
		// 	// 										);
		// },
		addCartAction: function(e, el){
			var form = el.attr("bs-nc-trigger-form");
			var fEl = $(form);
			window.bs.nc.core.commons.submit.form.ajax(fEl, null, window.bs.nc.core.paths.path_cart_create,
                {
                    // Success
                    200: function(json) {
                    	window.bs.nc.core.controllers.clientController.auto.createClient(el, json);
                    }
                });
		}
	}
}