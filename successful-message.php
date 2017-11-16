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
                          <a href="#" class="accordion-title bold text-center ">Todo salio bien </a>

                          <!-- Accordion tab content: it would start in the open state due to using the `is-active` state class. -->
                          <div class="accordion-content" data-tab-content>
                          <form  id="frm-reactivar-pass" name="frm-reactivar-pass" novalidate="novalidate">


                         <div class="floated-label-wrapper  text-center">

                          <i class="material-icons colorAqua mError">thumb_up</i>
                          </div>
       
                              <div class="floated-label-wrapper text-center">
                                <a href="index.php"><span>Recibimos con exito tus datos, descarga este .xml e ingresalo en la  aplicación de Cerifiel ST para activarla.</span>
                                <i class="material-icons colorOrange">file_download</i></a>
                            
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