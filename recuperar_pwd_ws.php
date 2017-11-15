<?php

//$_POST['id_institucion'] 	= '000000';
//$_POST['email'] 			= 'ber_ale00@hotmail.com';

if(isset($_POST) && count($_POST)>0){

	if(isset($_POST['id_institucion'],$_POST['email']) && !empty($_POST['email']) && !empty($_POST['id_institucion'])){
		
		$correoElectronico 	= strip_tags(trim($_POST['email']));
		$idInstitucion      = strip_tags(trim($_POST['id_institucion']));
		$estado = 0;
		$msg 	= '';

		if (!filter_var($correoElectronico, FILTER_VALIDATE_EMAIL)) {
		  	
		  	$estado = 0;
			$msg 	= 'El email es inválido';

		}else{
			
			require_once('WebService.php');
			$iq_ws = new WebService('11','usr_bus_iq','12121212');	

			$params = array('idInstitucion'=>$idInstitucion,'correoElectronico' => $correoElectronico);

			$result_recuperar_pwd = $iq_ws->Metodo('RecuperacionContrasena',$params);

			//var_dump($result_recuperar_pwd);die;

			if($result_recuperar_pwd->RecuperacionContrasenaResult->estado ==0){

				$estado = 1;
				$msg 	= 'Su solicitud ha sido procesada correctamente, en breve recibirá un email con la información correspondiente';
				
			}else{
				
				$estado = 0;
				$msg 	= $result_recuperar_pwd->RecuperacionContrasenaResult->descripcion;
			}	
		}
		
	}else{
		$estado = 0;
		$msg 	= 'Los parámetros son incorrectos';		
	}
	
}else{
	$estado = 0;
	$msg 	= 'Los parámetros son incorrectos'; 
}

echo json_encode(array('estado'=>$estado, 'msg'=>$msg));