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

// Set value for form
window.bs.nc.core.commons.fillDataForm = function(fEl, entity)
{
	if(!entity){
		return;
	}
	
	$.each(entity, function(key, val){
		var elArr= fEl.find("[nc-field='"+ key +"']");
		if(elArr.length){
			var el = $(elArr[0]);
			if(el.prop("tagName") == "INPUT"){
				el.val(val);
			} else {
				el.text(val);
			}
		}
	});

}

window.bs.nc.core.commons.clearForm = function(fEl)
{
	var elArr= fEl.find("[nc-field]");
	if(elArr.length){
		for (var i = 0; i < elArr.length; i++) {
			var el = $(elArr[0]);
			if(el.prop("tagName") == "INPUT"){
				el.val("");
			} else {
				el.text("");
			}
		};
	}
}

window.bs.nc.core.commons.getDataForm = function(fEl)
{
	return fEl.serialize();
}