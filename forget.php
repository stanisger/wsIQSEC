    <?php include 'header.php'; ?>    
                <body>
                <main class="content">   
          
                  <div  data-sticky data-margin-top="0" >
                        <ul class="menu menuLogin   row  align-right relative"  >
                            <div class="logo absolute">
                              <a href="index.php">
                                <img src="assets/img/ico_iqsec.png" alt="" >
                                </a>
                            </div>

                        </ul>
                  </div>
    <section class="formForget">
                  <ul class="accordion forget-item  " data-accordion  data-allow-all-closed="true">
                          <li class="accordion-item  is-active" data-accordion-item  >
                          <!-- Accordion tab title -->
                          <a href="#" class="accordion-title bold text-center ">Olvidé mi contraseña</a>

                          <!-- Accordion tab content: it would start in the open state due to using the `is-active` state class. -->
                          <div class="accordion-content" data-tab-content>
                          <form  id="frm-pass" name="frm-pass" novalidate="novalidate">


                          <div class="floated-label-wrapper ">
                          <label for="email" class="text-left  colorNavy">EMAIL</label>
                          <input type="email" id="email" name="email" placeholder="Email*" required>
                          </div>

                          <div class="floated-label-wrapper ">
                          <label for="idReferencia" class="text-left  colorNavy">ID INSTITUCIÓN</label>
                          <input type="text" id="id_institucion" name="id_institucion" placeholder="ID Institución*" required>
                          </div>
             
  
                          <div class="floated-label-wrapper column small-12  ">                            
                          <button class="button expanded bgOrange" id="btn_password" type="submit">Enviar</button>
                          </div>        

                           <div class="floated-label-wrapper text-center">
                            <span class="light ">Enviaremos un correo electrónico a tu cuenta de email registrada,  para recuperar tu contraseña.</span>
                          </div>
                          </form>
                          </div>
                          </li>
                  <!-- ... -->
                  </ul>
                  <!--◊◊◊ Modal 1 respuesta-->
                  <div class="reveal" id="exampleModal1" data-reveal data-close-on-click="true" data-animation-in="fade-in" data-animation-out="fade-out">
                      <div class="content_reveal">
                      <h1>Solicitud procesada correctamente</h1>
                      <p class="lead">Se ha enviado un email a tu cuenta de correo electrónico</p>
                      <button class="close-button" data-close aria-label="Close modal" type="button">
                      <i class="material-icons">&#xE5CD;</i>
                      </button>
                      </div>
                  </div>
                  <div class="twelve columns text-center"><br />
                                  <img src="assets/img/loading.gif" alt="Cargando" id='loading' style="display: none;">
                              </div>
              </section>
<?php include 'footer.php'; ?>

    </body>
</html>            