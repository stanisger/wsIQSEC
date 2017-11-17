<?php
/*
$_POST['id_institucion'] 	= '000001';
$_POST['email'] 			= 'ber_ale00@hotmail.com';
$_POST['pass_tmp'] 			= '5527982';
$_POST['pass_new'] 			= '12121212';
*/

if(isset($_POST) && count($_POST)>0){

	if(isset($_POST['id_institucion'],$_POST['email'],$_POST['pass_tmp'],$_POST['pass_new']) && !empty($_POST['email']) && !empty($_POST['id_institucion']) && !empty($_POST['pass_tmp']) && !empty($_POST['pass_new'])){
		
		$correoElectronico 		= strip_tags(trim($_POST['email']));
		$idInstitucion      	= strip_tags(trim($_POST['id_institucion']));
		$contrasenaTemporal     = strip_tags(trim($_POST['pass_tmp']));
		$contrasenaNueva      	= strip_tags(trim($_POST['pass_new']));
		$estado = 0;
		$msg 	= '';

		if (!filter_var($correoElectronico, FILTER_VALIDATE_EMAIL)) {
		  	
		  	$estado = 0;
			$msg 	= 'El email es inválido';

		}
		else if(strlen($contrasenaTemporal) < 8){

			$estado = 0;
			$msg 	= 'La contraseña temporal debe tener al menos 8 caracteres';			
		}
		else if(strlen($contrasenaNueva) < 8){
			$estado = 0;
			$msg 	= 'La nueva contraseña debe tener al menos 8 caracteres';	
		}
		else{
			
			require_once('WebService.php');
			$iq_ws = new WebService('11','usr_bus_iq','12121212');	

			$params = array('idInstitucion'=>$idInstitucion,'correoElectronico'=>$correoElectronico,'contrasenaTemporal'=>$contrasenaTemporal,'contrasenaNueva'=>$contrasenaNueva);

			$result_reactivar_pwd = $iq_ws->Metodo('ReactivacionContrasena',$params);						
			
			if($result_reactivar_pwd->ReactivacionContrasenaResult->estado ==0){

				$estado = 1;
				$msg 	= 'Su solicitud ha sido procesada correctamente, en breve recibirá un email con la información correspondiente';
				
			}else{
				
				$estado = 0;
				$msg 	= $result_reactivar_pwd->ReactivacionContrasenaResult->descripcion;
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