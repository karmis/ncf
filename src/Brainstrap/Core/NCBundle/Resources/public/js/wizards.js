{
    cart_wizard: {
        functions: {
            // поиск карты по кодуы
            search_by_code_func: {
                exciter: "[bs-nc-action='search-req-cart']",// возбудитель событияы
                type: "submit", // тип 
                submit: {
                    // поля необходимые для данного типа обработки
                    path: "path_cart_search", 
                    serialize: "form#form-request-cart",
                    data: null
                    callbacks: {
                        before_func: {
                            type: "static",
                        }
                        200_func: window.bs.nc.core.functions.wizards.wizardExistCartByCode,
                        404_func: window.bs.nc.core.functions.wizards.wizardNotExistCartByCode,
                        500_func: window.bs.nc.core.functions.wizards.wizard500Error
                    }
                }
                
                
                
                rules: {
                    before: {
                        type: "static",

                    }
                    
                }
            }

        }
    },
    sessions: {
        create: {
            
        }
    }
}
            // Request for search by number cart
            window.bs.nc.functions.submitAjaxForm(
                $("[bs-nc-action='search-req-cart']"),
                $("form#form-request-cart"),
                "{{ path('cart_search') }}", 
                {
                    before: function(){
                        debugger;
                        $("#modal-request-cart-for-search-by-code").modal('hide');
                        // $("#modal-request-wait").modal("toggle");
                    },
                    // Add Session
                    200: function(json){
                        debugger;
                        var entityCart      = $.parseJSON(json.entityCart);
                        var entityClient    = $.parseJSON(json.entityClient);
                        
                        $("#modal-add-session").modal('show');
                        $("#brainstrap_core_ncbundle_session_personalsession_cart_id").val(entityCart.id);
                        $("#brainstrap_core_ncbundle_session_personalsession_client_id").val(entityClient.id);
                        
                        window.bs.nc.functions.submitAjaxForm(
                            $("[bs-nc-action='btn-modal-add-personal-session']"),
                            $("form#form-modal-add-personal-session"),
                            "{{ path('session_personalsession_create') }}",
                            {
                                // Create session
                                200: function(json){
                                    var entity = $.parseJSON(json.entity);
                                    // Show info about cart
                                    debugger;
                                    alert("user with name" + entity.name + "successfully created");
                                },
                                after: function(){
                                    alert('Success');
                                }
                            }
                        );

                    },
                    404: function(json){
                        debugger;

                        // Создаем нового клиента вместе с картой
                        $('#modal-add-cart-with-client').modal('show');
                        $('#brainstrap_core_ncbundle_cart_cart_code').val(json.entity.code);
                        // $("#modal-request-wait").modal("toggle");
                        // alert(json.msg);
                    },
                    500: function(json){
                        alert(json.msg);
                    }

                }
            );

            // Create cart and user and session
            // create cart
            window.bs.nc.functions.submitAjaxForm(
                $("[bs-nc-action='add-cart-with-client']"),
                $("form#form-add-cart-with-client-cart"),
                "{{ path('cart_create') }}", 
                {
                    // Create user
                    200: function(json){
                        if(json.responseCode == 200)
                        {

                            $('#brainstrap_core_ncbundle_client_client_cart_id').val(json.id)
                            window.bs.nc.functions.submitAjaxForm(
                                null,
                                $("form#form-add-cart-with-client-client"),
                                "{{ path('client_create') }}",
                                {
                                    // Create session
                                    200: function(json){
                                        var entity = $.parseJSON(json.entity);
                                        // Show info about cart
                                        $('#modal-add-cart-with-client').modal('hide');
                                        window.bs.nc.functions.fillHtmlFromEntity($('#modal-client-info'), entity);
                                        
                                        // Create session for created user
                                        $('#modal-client-info').modal('show');
                                        $('[bs-nc-action="btn-modal-call-window-for-create-personal-session"]').on('click', function(){
                                            $("#brainstrap_core_ncbundle_session_personalsession_cart_id").val(entity.cartId);
                                            $("#brainstrap_core_ncbundle_session_personalsession_client_id").val(entity.clientId);

                                            $('#modal-client-info').modal('hide');
                                            $("#modal-add-session").modal('show');


                                            window.bs.nc.functions.submitAjaxForm(
                                                $("[bs-nc-action='btn-modal-add-personal-session']"),
                                                $("form#form-modal-add-personal-session"),
                                                "{{ path('session_personalsession_create') }}",
                                                {
                                                    // Create session
                                                    200: function(json){
                                                        var entity = $.parseJSON(json.entity);
                                                        // Show info about cart
                                                        debugger;
                                                        alert("user with name" + entity.name + "successfully created");
                                                    },
                                                    after: function(){
                                                        alert('Success');
                                                    }
                                                }
                                            );
                                        })


                                        

                                    },
                                    after: function(){
                                        // alert("user with name" + entity.name + "successfully created");
                                    }
                                }
                            );
                        }
                        else
                        {
                            alert('Непонятная ошибка');
                        }
                    },
                    404: function(json){
                        debugger;

                        // Создаем нового клиента вместе с картой
                        $('#modal-add-cart-with-client').modal('show');
                        $('#brainstrap_core_ncbundle_cart_cart_code').val(json.entity.code);
                        // $("#modal-request-wait").modal("toggle");
                        // alert(json.msg);
                    },
                    500: function(json){
                        alert(json.msg);
                    }

                }
            );


            // Add personal session
            // window.bs.nc.functions.submitAjaxForm(
            //     $("[bs-nc-action='btn-modal-add-personal-session']"),
            //     $("form#form-modal-add-personal-session"),
            //     "{{ path('session_personalsession_create') }}", 
            //     {
            //         // before: function(){
            //         //     debugger;
            //         //     $("#modal-request-cart-for-search-by-code").modal('hide');
            //         //     // $("#modal-request-wait").modal("toggle");
            //         // },
            //         // Add Session
            //         200: function(json){
            //             debugger;

            //             // $("#modal-add-session").modal('show');

                        
            //             // window.bs.nc.functions.submitAjaxForm(
            //             //     "null",
            //             //     $("form#form-modal-add-session"),
            //             //     "{{ path('session_personalsession_create') }}",
            //             //     {
            //             //         // Create session
            //             //         200: function(json){
            //             //             var entity = $.parseJSON(json.entity);
            //             //             // Show info about cart
            //             //             debugger;
            //             //             alert("user with name" + entity.name + "successfully created");
            //             //         },
            //             //         after: function(){
            //             //             alert('Success');
            //             //         }
            //             //     }
            //             // );

            //         },
            //         404: function(json){
            //             debugger;

            //             // Создаем нового клиента вместе с картой
            //             // $('#modal-add-cart-with-client').modal('show');
            //             // $('#brainstrap_core_ncbundle_cart_cart_code').val(json.entity.code);
            //             // $("#modal-request-wait").modal("toggle");
            //             // alert(json.msg);
            //         },
            //         500: function(json){
            //             alert(json.msg);
            //         }

            //     }
            // );            
            