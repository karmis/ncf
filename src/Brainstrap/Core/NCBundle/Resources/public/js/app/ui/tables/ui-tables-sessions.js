window.bs.nc.core.ui.tables.sessions = {
	init: function(){
	    $('[nc-interface-unit="data-table-sessions"]').dataTable( {
	        "sDom": "<'row'<'col-xs-6'T><'col-xs-6'f>r>t<'row'<'col-xs-6'i><'col-xs-6'p>>",
	        "bProcessing": true,
	        "sAjaxSource": window.bs.nc.core.paths.path_session_personalsession,
			"oLanguage": {
				"sLengthMenu": "Display _MENU_ records per page",
				"sZeroRecords": "Ничего не найдено",
				"sInfo": "Показано с _START_ по _END_ из _TOTAL_ записей",
				"sInfoEmpty": "Показано 0 записей",
				"sInfoFiltered": "( Всего в таблице _MAX_ записей)",
				"sSearch": "Поиск"
			},
	        "aoColumns": [
	            { "mData": "cartCode" },
	            { "mData": "cartType" },
	            { "mData": "clientFullName" },
	            { "mData": "startDate" }
	            // { "mData": "platform" },
	            // { "mData": "version", "sClass": "center" },
	            // { "mData": "grade", "sClass": "center" }
	        ],
	        // "oTableTools": {
	        //     "sRowSelect": "multi",
	        // }
	    } );
	},
	destroy: function(){
		$('[nc-interface-unit="data-table-sessions"]').dataTable().fnDestroy();
	},
	reinit: function(){
		this.destroy();
		this.init();
	}
}