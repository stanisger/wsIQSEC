<!--∆∆  js   -->
<script src="js/jquery.js"></script>
<script src="js/foundation.min.js"></script>
<script src="js/app.js"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>
<script src="js/jquery.validate.js"></script>
<script type="text/javascript" src="js/jquery.validate.js"></script>
<script type="text/javascript" src="js/additional-methods.min.js"></script>
<script type="text/javascript">
        $(document).ready(function(){

            $("#Informacion").click(function(){
                if($("#rfc").val()!=''){
                    validacion_larga();
                    $("#frm-solicitud").append("<input type='hidden' name='factura' id='factura' value='1'>");
                }else{
                    validacion_corta();
                }
            });

            jQuery.validator.addMethod("valida_rfc", function(value, element) {
              // allow any non-whitespace characters as the host part
              return this.optional( element ) || /^([A-ZÑ&]{3,4}) ?(?:- ?)?(\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])) ?(?:- ?)?([A-Z\d]{2})([A\d])$/.test( value );
            }, 'RFC inválido.');

            jQuery.validator.addMethod("valida_curp", function(value, element) {
              // allow any non-whitespace characters as the host part
              return this.optional( element ) || /^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/.test( value );
            }, 'CURP inválido.');
            
            function validacion_larga(){
                
                $("#frm-solicitud").validate({
                        rules: {
                          nombre: {
                              required: true,
                              minlength: 3,
                              maxlength: 80
                          },
                          apellidop: {
                              required: true,
                              minlength: 3,
                              maxlength: 80
                          },
                          apellidom: {
                              required: true,
                              minlength: 3,
                              maxlength: 80
                          },
                          mail: {
                              required: true,
                              email: true
                          },
                          password:{
                            required:true,
                            minlength:8
                          },
                          cpassword:{
                            required:true,
                            equalTo:'#password'
                          },
                          tel:{
                            required:true,
                            minlength:10,
                            maxlength:10,
                            digits:true
                          },
                          institucion:{
                            required:true,
                            minlength:3
                          },
                          id_institucion:{
                            required:true                   
                          },
                          vigencia:{
                            required:true
                          },                  
                          curp_1:{
                            required:true,
                            valida_curp:true    
                          },
                          curp_2:{                  
                            valida_curp:true    
                          },
                          curp_3:{                  
                            valida_curp:true    
                          },
                          curp_4:{                  
                            valida_curp:true    
                          },
                          curp_5:{                  
                            valida_curp:true    
                          },
                          rfc:{
                            required:true,
                            valida_rfc:true
                          },
                          razon_social:{
                            required:true,
                            minlength:5
                          },
                          numero_ext:{
                            required:true,
                            maxlength:5,
                            digits:true
                          },
                          numero_ext:{                                                      
                            maxlength:6                         
                          },
                          colonia:{
                            required:true,
                            minlength:3,
                            maxlength:80
                          },
                          cp:{
                            required:true,
                            digits:true,
                            minlength:5,
                            maxlength:5
                          },
                          localidad:{
                            maxlength:80
                          },
                          del_mun:{
                            required:true,
                            minlength:5,
                            maxlength:80
                          },
                          entidad:{
                            required:true
                          }                                
                        },
                    messages: {
                          nombre: {
                              required: 'Campo requerido',
                              minlength: 'Mínimo 3 caracteres',
                              maxlength: 'Mánximo 80 caracteres'
                          },
                          apellidop: {
                              required: 'Campo requerido',
                              minlength: 'Mínimo 3 caracteres',
                              maxlength: 'Mánximo 80 caracteres'
                          },
                          apellidom: {
                              required: 'Campo requerido',
                              minlength: 'Mínimo 3 caracteres',
                              maxlength: 'Mánximo 80 caracteres'
                          },
                          mail: {
                              required: 'Campo requerido',
                              email: 'email inválido'
                          },
                          password:{
                            required: 'Campo requerido',
                            minlength: 'Mínimo 8 caracteres'
                          },
                          cpassword:{
                            required: 'Campo requerido',
                            equalTo: 'Las contraseñas no coinciden'
                          },
                          tel:{
                            required: 'Campo requerido',
                            minlength: '10 dígitos',
                            maxlength: '10 dígitos',
                            digits:'Sólo números'
                          },
                          institucion:{
                            required: 'Campo requerido',
                            minlength: 'Mínimo 3 caracteres'
                          },
                          id_institucion:{
                            required: 'Campo requerido'                 
                          },
                          vigencia:{
                            required: 'Campo requerido',
                          },                  
                          curp_1:{
                            required: 'Campo requerido'                 
                          },
                          rfc:{
                            required: 'Campo requerido'                         
                          },
                          razon_social:{
                            required: 'Campo requerido',
                            minlength: 'Mínimo 5 caracteres'
                          },
                          numero_ext:{
                            required: 'Campo requerido',
                            maxlength: 'Máximo 5 dígitos',
                            digits: 'Sólo dígitos'
                          },
                          numero_int:{                                                      
                            maxlength: 'Máximo 6 caracteres'                            
                          },
                          colonia:{
                            required: 'Campo requerido',
                            minlength: 'Mínimo 3 caracteres',
                            maxlength: 'Máximo 80 caracteres'
                          },
                          cp:{
                            required: 'Campo requerido',
                            digits: 'Sólo dígitos',
                            minlength: '5 dígitos',
                            maxlength: '5 dígitos'
                          },
                          localidad:{
                            maxlength: 'Máximo 80 caracteres'
                          },
                          del_mun:{
                            required: 'Campo requerido',
                            minlength: 'Mínimo 5 caracteres',
                            maxlength: 'Máximo 80 caracteres'
                          },
                          entidad:{
                            required: 'Campo requerido'
                          }
                    },
                    submitHandler: function (form) {                          
                          $.ajax({
                                 type: "POST",
                                 url: "solicitud_ws.php",
                                 dataType:'json',
                                 data: $("#frm-solicitud").serialize(),
                                 success: function(data){
                                    if(data.estado ==1){
                                      $('#exampleModal2').foundation('open');
                                      $('#frm-solicitud')[0].reset();
                                    }else{
                                      alert(data.msg);
                                    }
                                  }                
                          });
                    }
                    

                });

            }


            function validacion_corta(){

                $("#frm-solicitud").validate({
                        rules: {
                          nombre: {
                              required: true,
                              minlength: 3,
                              maxlength: 80
                          },
                          apellidop: {
                              required: true,
                              minlength: 3,
                              maxlength: 80
                          },
                          apellidom: {
                              required: true,
                              minlength: 3,
                              maxlength: 80
                          },
                          mail: {
                              required: true,
                              email: true
                          },
                          password:{
                            required:true,
                            minlength:8
                          },
                          cpassword:{
                            required:true,
                            equalTo:'#password'
                          },
                          tel:{
                            required:true,
                            minlength:10,
                            maxlength:10,
                            digits:true
                          },
                          institucion:{
                            required:true,
                            minlength:3
                          },
                          id_institucion:{
                            required:true                   
                          },
                          vigencia:{
                            required:true
                          },                  
                          curp_1:{
                            required:true,
                            valida_curp:true    
                          },
                          curp_2:{                  
                            valida_curp:true    
                          },
                          curp_3:{                  
                            valida_curp:true    
                          },
                          curp_4:{                  
                            valida_curp:true    
                          },
                          curp_5:{                  
                            valida_curp:true    
                          }                                
                        },
                        messages: {
                          nombre: {
                              required: 'Campo requerido',
                              minlength: 'Mínimo 3 caracteres',
                              maxlength: 'Mánximo 80 caracteres'
                          },
                          apellidop: {
                              required: 'Campo requerido',
                              minlength: 'Mínimo 3 caracteres',
                              maxlength: 'Mánximo 80 caracteres'
                          },
                          apellidom: {
                              required: 'Campo requerido',
                              minlength: 'Mínimo 3 caracteres',
                              maxlength: 'Mánximo 80 caracteres'
                          },
                          mail: {
                              required: 'Campo requerido',
                              email: 'email inválido'
                          },
                          password:{
                            required: 'Campo requerido',
                            minlength: 'Mínimo 8 caracteres'
                          },
                          cpassword:{
                            required: 'Campo requerido',
                            equalTo: 'Las contraseñas no coinciden'
                          },
                          tel:{
                            required: 'Campo requerido',
                            minlength: '10 dígitos',
                            maxlength: '10 dígitos',
                            digits:'Sólo números'
                          },
                          institucion:{
                            required: 'Campo requerido',
                            minlength: 'Mínimo 3 caracteres'
                          },
                          id_institucion:{
                            required: 'Campo requerido'                 
                          },
                          vigencia:{
                            required: 'Campo requerido'
                          },                  
                          curp_1:{
                            required: 'Campo requerido'                 
                          },
                      },
                      submitHandler: function (form) {  
                      
                          $.ajax({
                             type: "POST",
                             url: "solicitud_ws.php",
                             dataType:'json',
                             data: $("#frm-solicitud").serialize(),
                             success: function(data){
                                if(data.estado ==1){
                                  $('#exampleModal2').foundation('open');
                                  $('#frm-solicitud')[0].reset();
                                }else{
                                  alert(data.msg);
                                }
                              }                
                          });
                     }
                    

                });
            }
            
        });     
    </script>