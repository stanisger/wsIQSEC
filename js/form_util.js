$(document).ready(function() {
	var modal = document.getElementById('myModal');														
	
	var span = document.getElementsByClassName("close")[0];					
	
	span.onclick = function() {
	    modal.style.display = "none";
	}

	window.onclick = function(event) {
	    if (event.target == modal) {
	        modal.style.display = "none";
	    }
	}

   $("#frm-contacto").validate({
        rules: {
            nombre: {
                required: true,
                minlength: 3,
                maxlength: 80
            },
            asunto: {
                required: true,
                minlength: 5,
                maxlength: 100
            },
            email: {
                required: true,
                email: true
            },
            mensaje:{
                required: true,
                minlength: 10  
            }
        },
        messages: {
            nombre: {
                required: 'Campo requerido',
                minlength: 'Mínimo 3 caracteres',
                maxlength: 'Máximo 80 caracteres'
            },		                    
            asunto: {
                required: 'Campo requerido',
                minlength: 'Mínimo 5 caracteres',
                maxlength: 'Máximo 100 caracteres'
            },
            email: {
                required: 'Campo requerido',
                email: 'Ingrese un email válido'
            },
            mensaje:{
                required: 'Campo requerido',
                minlength: 'Mínimo 10 caracteres'  
            }
        },
        submitHandler: function (form) {                        
            $("#frm-contacto").append("<input type='hidden' name='factura' id='factura' value='1'>");
            $.ajax({
               type: "POST",
               url: "email.php",
               dataType:'json',
               data: $("#frm-contacto").serialize(),
               success: function(data){
                     if(data.res == 1){
                     	$("#myModal h2").text('Éxito');
                     	$("#myModal p").text('El mensaje se envío correctamente, en breve daremos seguimiento a su solicitud.');
                        modal.style.display = "block";
                        $('#frm-contacto')[0].reset();
                     }else{
                        $("#myModal h2").text('Error');
                     	$("#myModal p").text('Error inesperado el mensaje no se envío, inténtelo nuevamente.');
                     	modal.style.display = "block";
                     }
                }
            });
        },
        debug: true,
        errorClass: 'help-inline',
        validClass: 'success',
        errorElement: 'span',
        highlight: function(element, errorClass, validClass) {
          $(element).parents("div.control-group").addClass("error");

        },
        unhighlight: function(element, errorClass, validClass) {
          $(element).parents(".error").removeClass("error");
        }
    });
});	