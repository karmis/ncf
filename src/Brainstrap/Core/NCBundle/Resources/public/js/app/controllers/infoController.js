window.bs.nc.core.controllers.infoController = {
    auto: {
        getTotalInfo: function() {
            // Send request
            window.bs.nc.core.commons.submit.data.ajax(null, window.bs.nc.core.paths.path_info_total, // path
                {
                    // Success
                    200: function(json) {
                    	window.bs.nc.core.commons.fillDataForm($('#totalCountInfoBlock'), json.results);
                    }
                });
    },
    getTotalClientInfo: function() {
            // Send request
            window.bs.nc.core.commons.submit.data.ajax(null, window.bs.nc.core.paths.path_info_client_total, // path
                {
                    // Success
                    200: function(json) {
                    	window.bs.nc.core.commons.fillDataForm($('#totalCountInfoBlock'), json.results);
                    }
                });
    },
    getTotalSessionInfo: function() {
            // Send request
            window.bs.nc.core.commons.submit.data.ajax(null, window.bs.nc.core.paths.path_info_session_total, // path
                {
                    // Success
                    200: function(json) {
                        window.bs.nc.core.commons.fillDataForm($('#totalCountInfoBlock'), json.results);
                    }
                });
    },
    getTotalMoneyInfo: function() {
            // Send request
            window.bs.nc.core.commons.submit.data.ajax(null, window.bs.nc.core.paths.path_info_money_total, // path
                {
                    // Success
                    200: function(json) {
                        window.bs.nc.core.commons.fillDataForm($('#totalCountInfoBlock'), json.results);
                    }
                });
    },
    // unused
    getClientDetail: function() {
            // window.bs.nc.core.commons.submit.data.ajax(null, window.bs.nc.core.paths.path_info_money_total, // path
            //     {
            //         // Success
            //         200: function(json) {
            //             window.bs.nc.core.commons.fillDataForm($('#totalCountInfoBlock'), json.results);
            //         }
            //     });	
    }
}
}