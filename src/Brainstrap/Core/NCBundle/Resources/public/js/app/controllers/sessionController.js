window.bs.nc.core.controllers.sessionController = {
	click: {
		addSessionShowModalAction: function(e, el){
			var form = el.attr("bs-nc-trigger-form");
			// if(!window.bs.nc.core.memory.clientId || !window.bs.nc.core.memory.cartId)
			// {
			// 	alert('FATAL!!!!!1111');
			// 	return false;
			// }
			// else
			// {
			// 	$('#brainstrap_core_ncbundle_session_personalsession_cart_id').val(window.bs.nc.core.memory.cartId);
			// 	$('#brainstrap_core_ncbundle_session_personalsession_client_id').val(window.bs.nc.core.memory.clientId);
			// }
			
			$("#modal-client-info").modal('hide');
			$("#modal-add-session").modal('show');

			
		},
		addSessionAction: function(e, el){
			var form = el.attr("bs-nc-trigger-form");

			// Send request
			window.bs.nc.core.commons.submit.form.ajax(
														$(form), // form
														el, // btn element
														window.bs.nc.core.paths.path_session_personalsession_create, // path
														{
															// Success
															200: function(json)
															{
																$("#modal-add-session").modal('hide');
																
																$('.notification').notify({
																	message: { text: 'Сессия успешно создана' },
																	type: "bangTidy"
																}).show();
															}
														}
													)

			
		}

	}
}