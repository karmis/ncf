window.bs.nc.core.functions.init = function(paths)
{
	window.bs.nc.core.paths = paths;
	window.bs.nc.core.listeners.listenerTriggers();
	window.bs.nc.core.functions.ready();
	// window.bs.nc.core.wizards
}

window.bs.nc.core.functions.ready = function()
{



	// TODO Избавиться от него
	window.bs.nc.core.commons.userNavDropDown();
}