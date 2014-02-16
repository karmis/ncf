window.bs.nc.core.functions.init = function(paths)
{
	window.bs.nc.core.paths = paths;
	window.bs.nc.core.listeners.listenerTriggers();
	window.bs.nc.core.functions.ready();

	window.bs.nc.core.ui.tables.sessions.init();
}

window.bs.nc.core.functions.ready = function()
{

    window.bs.nc.core.controllers.infoController.auto.getTotalInfo();
    $('input[nc-field="requestCartCode"]').inputmask({
      mask: '999-999-999'
    });


    //===== Dynamic table toolbars =====//      
    $('.tOptions').click(function() {
        $('.tablePars').slideToggle(200);
    });
    $('.tOptions').click(function() {
        $(this).toggleClass("act");
    });
    // editor = new $.fn.dataTable.Editor( {
    //     "ajaxUrl": "php/browsers.php",
    //     "domTable": "#example",
    //     "fields": [ {
    //             "label": "Browser:",
    //             "name": "browser"
    //         }, {
    //             "label": "Rendering engine:",
    //             "name": "engine"
    //         }, {
    //             "label": "Platform:",
    //             "name": "platform"
    //         }, {
    //             "label": "Version:",
    //             "name": "version"
    //         }, {
    //             "label": "CSS grade:",
    //             "name": "grade"
    //         }
    //     ]
    // } );

	// .dataTable();


	// TODO Избавиться от него
	window.bs.nc.core.commons.userNavDropDown();
}