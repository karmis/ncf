window.bs.nc.core.listeners.listenerTriggers = function(e)
{
	// Click
	$('[bs-nc-type="trigger"]').on("click", function(){
		var controller = $(this).attr("bs-nc-trigger-controller");
		var method = $(this).attr("bs-nc-trigger-method");
		var name = controller + "_" + method + "_" + "click_action";
		var button = $(this);
		debugger;
		window.bs.nc.core.controllers[controller + "Controller"]["click"][method + "Action"](e, $(this));
	})
}