$(document).on("ready", inicio);
function inicio(){      
    /*
<<<<<<< HEAD
    *   VALIDANDO CREACION DE USUARIOS DE TALLER Y ALMACEN
=======
    *VALIDANDO CREACION DE USUARIOS DE TALLER Y ALMACEN
>>>>>>> origin/master
     */
    $('#type').on('change',function(e){
        var type = $(this).val();
        if(type =='almacenista'){
            $('#almacen_select_user').css({'display':'block'});
            $('#taller_select_user').css({'display':'none'});
        }else if(type =='taller'){
            $('#taller_select_user').css({'display':'block'});
            $('#almacen_select_user').css({'display':'none'});            
        }else{
            $('#taller_select_user').css({'display':'none'});
            $('#almacen_select_user').css({'display':'none'});
        }
    });

    $("#crear_user").on('click',function(e) {
        var type = $('type').val();
        var taller = $('taller_id').val();
        var almacen = $('almacen_id').val();

        if(type =='almacenista' && almacen ==''){
            alert('Debe seleccionar un almacen para el usuario');
            e.preventDefault();                
        }else if(type =='taller' && taller ==''){
            alert('Debe seleccionar un taller para el usuario');        
            e.preventDefault();    
        }
    });


    /*
    *   BUSQUEDA DE USUARIO scopeSearchUser()
     */
    
    $("#name_search").on('keyup',function(e) {
        var ruta = $('#form_name_search').attr("action");
        $.ajax({
            type: "GET",
            url: ruta,
            data: $('#form_name_search').serialize(),
            dataType: "HTML",
            beforeSend: function(){
                //imagen de carga
                $("#result_search_name").empty();
                $("#result_search_name").html('<div style="text-align:center;"><img src="../img/loader.gif" /></div>');
            },
            error: function(){
                alert("error petición ajax " + name);
            },
            success: function(data){  
                $("#result_search_name").empty();//para limpiar
                $("#result_search_name").html(data);         
                
            }
        });
    });
}