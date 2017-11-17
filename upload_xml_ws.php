<?php
if(isset($_POST) && count($_POST)>0){

	if(isset($_POST['id_institucion'],$_POST['email'],$_POST['pass']) && !empty($_POST['email']) && !empty($_POST['id_institucion']) && !empty($_POST['pass'])){
		
		$correoElectronico 		= strip_tags(trim($_POST['email']));
		$idInstitucion      	= strip_tags(trim($_POST['id_institucion']));
		$contrasenaCorreo       = strip_tags(trim($_POST['pass']));
		$estado = 0;
		$msg 	= '';

		if (!filter_var($correoElectronico, FILTER_VALIDATE_EMAIL)) {
		  			  	
			$msg 	= 'El email es inválido';			
			header("Location: error-message.php?e=".$msg);
			die();
		}
		else if(strlen($contrasenaCorreo) < 8){			
			
			$msg 	= 'La contraseña debe tener al menos 8 caracteres';	
			header("Location: error-message.php?e=".$msg);
			die();
		}
		else if(count($_FILES)==0 || !isset($_FILES)) {			
			
			$msg 	= 'No proporcionó ningún archivo para procesar';	
			header("Location: error-message.php?e=".$msg);
			die();
		}
		else{

			if(isset($_FILES["file"]['name'],$_FILES["file"]['type'],$_FILES["file"]['tmp_name'],$_FILES["file"]['size']) && (!empty($_FILES["file"]['name']) && !empty($_FILES["file"]['type']) && !empty($_FILES["file"]['tmp_name']) && !empty($_FILES["file"]['size'])) && $_FILES["file"]['error'] == 0){

					$FileType = pathinfo($_FILES["file"]['name'],PATHINFO_EXTENSION);					
					if($_FILES["file"]['type'] == 'text/xml' && $FileType == "xml"){
						
						$target_dir 			= "/xml_files/";						
						$file_base64_encoded 	= __DIR__.$target_dir.$idInstitucion.'-'.date('Y-m-d').'.xml';						
						$data64 				= base64_encode(file_get_contents($_FILES["file"]['tmp_name']));						
						$fp = fopen($file_base64_encoded, "w+") or die("Error, no se pudo crear y/o leer el archivo");
						fwrite($fp, $data64);
						fclose($fp);

						if (file_exists($file_base64_encoded)) {
					        					        
							$msg 	= 'El archivo fue cargado correctamente';
							header("Location: successful-message.php?e=".$msg);
							die();

					    }else{
					        					       
							$msg 	= 'Error, el archivo no pudo ser cargado correctamente';
							header("Location: error-message.php?e=".$msg);
							die();

					    }
					}else{
						
						$msg 	= 'El archivo debe ser de tipo .xml';
						header("Location: error-message.php?e=".$msg);
						die();
					}	
					
					/*
					require_once('WebService.php');
					$iq_ws = new WebService('11','usr_bus_iq','12121212');	

					$params = array('idInstitucion'=>$idInstitucion,'correoElectronico' => $correoElectronico);

					$result_recuperar_pwd = $iq_ws->Metodo('RecuperacionContrasena',$params);			

					if($result_recuperar_pwd->RecuperacionContrasenaResult->estado ==0){

						$estado = 1;
						$msg 	= 'Su solicitud ha sido procesada correctamente';
						
					}else{
						
						$estado = 0;
						$msg 	= $result_recuperar_pwd->RecuperacionContrasenaResult->descripcion;
					}
					*/
			}else{
								
				$msg 	= 'El archivo está dañado';
				header("Location: error-message.php?e=".$msg);
				die();				
			}				
		}
		
	}else{		
		
		$msg 	= 'Los parámetros son incorrectos';		
		header("Location: error-message.php?e=".$msg);
		die();
	}
	
}else{
	
	$msg 	= 'Los parámetros son incorrectos';
	header("Location: error-message.php?e=".$msg);
	die();
}
