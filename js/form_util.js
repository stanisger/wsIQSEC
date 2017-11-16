$(document).ready(function() {
	
  /*Form solicititud*/
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
                      $("#Informacion").hide();
                      $("#loading").show();                       
                    $.ajax({
                         type: "POST",
                         url: "solicitud_ws.php",
                         dataType:'json',
                         data: $("#frm-solicitud").serialize(),
                         success: function(data){
                          $("#Informacion").show();
                              $("#loading").hide();
                            if(data.estado ==1){
                              $('#exampleModal1').foundation('open');
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
                      $("#Informacion").hide();
                      $("#loading").show(); 
                    $.ajax({
                       type: "POST",
                       url: "solicitud_ws.php",
                       dataType:'json',
                       data: $("#frm-solicitud").serialize(),
                       success: function(data){
                        $("#Informacion").show();
                          $("#loading").hide();
                          if(data.estado ==1){
                            $('#exampleModal1').foundation('open');
                            $('#frm-solicitud')[0].reset();
                          }else{
                            alert(data.msg);
                          }
                        }                
                    });
           }
          
        });
      }


  /*Form recuperar pwd*/
  $("#frm-pass").validate({
            rules: {                    
                    email: {
                        required: true,
                        email: true
                    },                    
                    id_institucion:{
                      required:true                 
                    }                                                
                  },
                  messages: {                   
                    email: {
                        required: 'Campo requerido',
                        email: 'email inválido'
                    },                    
                    id_institucion:{
                      required: 'Campo requerido'                 
                    }
                },
                submitHandler: function (form) {  
                    $("#btn_password").hide();
                    $("#loading").show();
                    $.ajax({
                       type: "POST",
                       url: "recuperar_pwd_ws.php",
                       dataType:'json',
                       data: $("#frm-pass").serialize(),
                       success: function(data){
                          $("#btn_password").show();
                          $("#loading").hide();
                          if(data.estado ==1){
                            alert(data.msg);
                            $('#exampleModal1').foundation('open');
                            $("#frm-pass")[0].reset();
                          }else{
                            alert(data.msg);
                          }
                        }                
                    });
               }
          
        });


  /*Form reactivar pwd*/
    $("#frm-reactivar-pass").validate({
            rules: {                    
                    email: {
                        required: true,
                        email: true
                    },                    
                    id_institucion:{
                      required:true                 
                    },
                    pass_tmp:{
                      required: true,
                      minlength: 8,
                      maxlength: 50
                    },
                    pass_new:{
                      required: true,
                      minlength: 8,
                      maxlength: 50
                    }                                                
                  },
                  messages: {                   
                    email: {
                        required: 'Campo requerido',
                        email: 'email inválido'
                    },                    
                    id_institucion:{
                      required: 'Campo requerido'                 
                    },
                    pass_tmp:{
                      required: 'Campo requerido',
                      minlength: 'Mínimo 8 caracteres',
                      maxlength: 'Máximo 50 caracteres'
                    },
                    pass_new:{
                      required: 'Campo requerido',
                      minlength: 'Mínimo 8 caracteres',
                      maxlength: 'Máximo 50 caracteres'
                    }
                },
                submitHandler: function (form) {  
                    $("#btn_reactivar_pwd").hide();
                    $("#loading").show();
                    $.ajax({
                       type: "POST",
                       url: "reactivar_pwd_ws.php",
                       dataType:'json',
                       data: $("#frm-reactivar-pass").serialize(),
                       success: function(data){
                          $("#btn_reactivar_pwd").show();
                          $("#loading").hide();
                          if(data.estado ==1){
                            alert(data.msg);
                            $('#exampleModal1').foundation('open');
                            $("#frm-reactivar-pass")[0].reset();
                          }else{
                            alert(data.msg);
                          }
                        }                
                    });
               }
          
        });


    $("#frm-activacion").validate({
        rules: {                    
            email: {
                required: true,
                email: true
            },                    
            id_institucion:{
              required:true                 
            },
            pass:{
              required: true,
              minlength: 8,
              maxlength: 50
            },
            file: {
              required: true,
              extension: "xml"
            }
                                                            
          },
        messages: {                   
            email: {
                required: 'Campo requerido',
                email: 'email inválido'
            },                    
            id_institucion:{
              required: 'Campo requerido'                 
            },
            pass:{
              required: 'Campo requerido',
              minlength: 'Mínimo 8 caracteres',
              maxlength: 'Máximo 50 caracteres'
            },
            file: {
              required: 'Campo requerido',
              extension: "Sólo archivos con extensión .xml"
            }
        }
    });


});	