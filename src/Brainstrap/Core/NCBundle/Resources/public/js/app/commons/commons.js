// User nav dropdown
// TODO  Вынести отсюда
window.bs.nc.core.commons.userNavDropDown = function()
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