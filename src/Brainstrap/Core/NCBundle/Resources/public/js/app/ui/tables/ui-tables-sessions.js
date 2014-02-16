window.bs.nc.core.ui.tables.sessions = {
    init: function() {
        var oTable = $('[nc-interface-unit="data-table-sessions"]').dataTable({
            "bJQueryUI": false,
            "bAutoWidth": false,
            "sDom": '<"row" <"col-xs-12"<"tablePars" <"H"fl>>t<"F"i> <"col-xs-12"p>>>',
            // <'row'<'col-xs-6'T><'col-xs-6'f>r>t<'row'<'col-xs-6'i><'col-xs-6'p>>"
            "sAjaxSource": window.bs.nc.core.paths.path_session_personalsession,
            "oLanguage": {
                "sLengthMenu": "Display _MENU_ records per page",
                "sZeroRecords": "Ничего не найдено",
                "sInfo": "Показано с _START_ по _END_ из _TOTAL_ записей",
                "sInfoEmpty": "Показано 0 записей",
                "sInfoFiltered": "( Всего в таблице _MAX_ записей)",
                "sSearch": "Поиск"
            },
            "aoColumns": [{
                    "mData": "cartCode"
                }, {
                    "mData": "cartType"
                }, {
                    "mData": "clientFullName"
                }, {
                    "mData": "startDate"
                }, {
                    "mData": null
                }, {
                    "mData": null
                },
                // { "mData": "platform" },
                // { "mData": "version", "sClass": "center" },
                // { "mData": "grade", "sClass": "center" }
            ],
            "aoColumnDefs": [{
                "bVisible": false,
                "aTargets": [5]
            }, {
                // "sTitle": ""
                "aTargets": [4],
                "fnCreatedCell": function(nTd, sData, oData, iRow, iCol) {
                    var b = $('<button class="btn btn-xs btn-danger" bs-nc-type="trigger" bs-nc-sessionId="' + oData.sessionId + '">Завершить сессию</button>');
                    b.button();
                    b.on('click', function() {
                        window.bs.nc.core.controllers.sessionController.click.showRemoveSessionAction($(this).attr('bs-nc-sessionId'));
                        return false;
                    });
                    $(nTd).empty();
                    $(nTd).prepend(b);
                }
            }, ]
        });
        oTable.fnSort([
            [3, 'desc']
        ]);
        //===== Dynamic table toolbars =====//		
        $('.tOptions').click(function() {
            $('.tablePars').slideToggle(200);
        });
        $('.tOptions').click(function() {
            $(this).toggleClass("act");
        });
    },
    destroy: function() {
        $('[nc-interface-unit="data-table-sessions"]').dataTable().fnDestroy();
    },
    reinit: function() {
        this.destroy();
        this.init();
    }
}