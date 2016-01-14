$(document).on("ready", inicio);
function inicio(){      
    /*
    *VALIDANDO CREACION DE USUARIOS DE TALLER Y ALMACEN
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
}