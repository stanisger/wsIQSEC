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
                          <form  id="frm-reactivar-pass" name="frm-reactivar-pass" novalidate="novalidate">


                          <div class="floated-label-wrapper ">
                          <label for="email" class="text-left  colorNavy">EMAIL</label>
                          <input type="email" id="email" name="email" placeholder="Email*" required>
                          </div>

                          <div class="floated-label-wrapper ">
                          <label for="idReferencia" class="text-left  colorNavy">ID REFERNCIA</label>
                          <input type="text" id="id_institucion" name="id_institucion" placeholder="ID Referencia*" required>
                          </div>
             
  
                          <div class="floated-label-wrapper column small-12  ">                            
                          <button class="button expanded bgOrange" id="#" type="submit">Enviar</button>
                          </div>        

                           <div class="floated-label-wrapper text-center">
                            <span class="light ">Enviaremos un correo electrónico a tu cuenta de email registrada,  para recuperar tu contraseña.</span>
                          </div>
                          </form>
                          </div>
                          </li>
                  <!-- ... -->
                  </ul>
              </section>
<?php include 'footer.php'; ?>

    </body>
</html>            