


$(document).ready(function() {



    $(document).ready(function() {
        
       
        $("#butLogin").click(function(e) {
            e.preventDefault();
            
            var myData = 'usuario='+$("#usuario").val()
                    + '&password='+$("#password").val()
                    ;


            jQuery.ajax({
                type: "POST", // metodo post o get 
                url: $("#formLogin").attr("action"),
                dataType: "text", // tipo datos text o json etc 
                data: myData,
                success: function(response) {


                    var respuesta = response;
                    
                    console.log(respuesta);


                    if (respuesta == 200) {


                        $('#respuesta').empty();
                        
                       

                         window.location = "principal";


                    } else {
                        respuesta = '\
\n\
\n\
Ingrese un usuario valido';

                        $('#respuesta').empty();

                        $("#respuesta").append(respuesta);


                    }



                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(thrownError);



                },
            });
        });
    });


});
