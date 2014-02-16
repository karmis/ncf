window.bs.nc.core.controllers.cartClientController = {
		click: 
		{
			showCreateCartClientAction: function(json)
			{
				window.bs.nc.core.commons.fillDataForm($("#form-add-cart-with-client-cart"), json.entity);
				$("#modal-add-cart-with-client").modal('show');
			},
			// addCartClientAction: function(e, el)
			// {
			// 	//window.bs.nc.core.commons.fillDataForm($("#form-add-cart-with-client-cart"), json.entity);
				

			// 	var form = el.attr("bs-nc-trigger-form");

			// 	debugger;
			// 	// Send request
			// 	window.bs.nc.core.commons.submit.form.ajax(
			// 												$(form), // form
			// 												el, // btn element
			// 												window.bs.nc.core.paths.path_cart_create, // path
			// 												{
			// 													// Show cart/info client
			// 													200: function(json)
			// 													{
			// 														$("#modal-add-cart-with-client").modal('hide');
			// 														window.bs.nc.core.controllers.cartController.click.createCartAfterClientAction(json, el);
			// 													},
			// 												}
			// 											);

			// },
		}
}