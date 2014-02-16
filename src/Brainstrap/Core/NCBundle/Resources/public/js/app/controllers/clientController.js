window.bs.nc.core.controllers.clientController = {
	auto: {
		createClient: function(el, json){
        	var entity = $.parseJSON(json.entity);
        	var fElClient = $("#form-add-cart-with-client-client");
        	var fElCart = $("#form-add-cart-with-client-cart");
        	window.bs.nc.core.commons.fillDataForm(fElClient, entity);
			var data = fElClient.serialize();
			window.bs.nc.core.commons.submit.data.ajax(data, window.bs.nc.core.paths.path_client_create,
                {
                    // Success
                    200: function(jsonClientInfo) {
                    	window.bs.nc.core.commons.clearForm(fElClient);
                    	window.bs.nc.core.commons.clearForm(fElCart);

                    	$("#modal-add-cart-with-client").modal('hide');
                    	el.button('reset');
                    	
                    	window.bs.nc.core.controllers.sessionController.auto.showAddSessionAction(jsonClientInfo);
                    }
                }, 'POST');

			// window.bs.nc.core.commons.clearForm(fEl);
		}
	}
}