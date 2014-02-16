window.bs.nc.core.controllers.sessionController = {
	auto: {
		showAddSessionAction: function(json){
			var entity = $.parseJSON(json.entity);
			var fEl = $("#modal-client-info-with-create-session");
			window.bs.nc.core.commons.fillDataForm(fEl, entity);
			$("#modal-client-info-with-create-session").modal('show');
		}
		
	},
	click: {
		showAddSessionAction: function(e, el){
			var form = el.attr("bs-nc-trigger-form");
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
																window.bs.nc.core.controllers.infoController.auto.getTotalSessionInfo();
																window.bs.nc.core.ui.tables.sessions.reinit();

																$("#modal-client-info-with-create-session").modal('hide');
																
																$('.notification').notify({
																	message: { text: 'Сессия успешно создана' },
																	type: "bangTidy"
																}).show();

															}
														}
													);

			
		},

		itemSessionInfoShowAction: function(code){
			$("#modal-client-info").modal('hide');
		},
		showRemoveSessionAction: function(sessionId){
			debugger;
			window.bs.nc.core.commons.fillDataForm($("#form-remove-session"), {sessionId: sessionId});
			$("#modal-remove-session").modal('show');
		},
		removeSessionAction: function(e, el){
			var form = el.attr("bs-nc-trigger-form");

			// Send request
			window.bs.nc.core.commons.submit.form.ajax(
														$(form), // form
														el, // btn element
														window.bs.nc.core.paths.path_session_personalsession_delete, // path
														{
															// Success
															200: function(json)
															{
																window.bs.nc.core.controllers.infoController.auto.getTotalSessionInfo();
																window.bs.nc.core.ui.tables.sessions.reinit();

																$("#modal-remove-session").modal('hide');
																
																$('.notification').notify({
																	message: { text: 'Сессия успешно удалена' },
																	type: "bangTidy"
																}).show();

															}
														}
													);
		}

	}
}