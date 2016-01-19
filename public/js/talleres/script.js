$(document).on("ready", inicio);
function inicio(){      

    /*
    *   BUSQUEDA DE TALLER scopeSearchAlmacen()
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