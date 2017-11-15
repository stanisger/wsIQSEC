<?php
/*
$_POST['email'] 		='jiizz182@hotmail.com';
$_POST['no_referencia'] ='123HHGFG';
$_POST['pass'] 			='&%/&GJHVBNM';
*/
if(isset($_POST) && count($_POST)>0){

	if(isset($_POST['no_referencia'], $_POST['pass'], $_POST['email']) && !empty($_POST['no_referencia']) && !empty($_POST['pass']) &&  !empty($_POST['email'])){

			$estatus 		= 1;
			$msg 	 	    = '';
			$email 			= strip_tags(trim($_POST['email']));
			$no_referencia 	= strip_tags(trim($_POST['no_referencia']));
			$pass 			= strip_tags(trim($_POST['pass']));

			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			    
			    $estatus 	= 0;
			    $msg 		= 'Email inválido';
			}

			if($estatus == 1){				
				require_once('pdo_connect.php');
				if($con ==1){
									
					$stmt = $dbh->prepare('SELECT id FROM registros_activacion WHERE email =:email AND password =:pass');

		            $stmt->execute(array(':email'=> $email,':pass' => $pass));		            
		            $row = $stmt->fetch(); 		            
		            if($row!=false && is_array($row)){

		            	$smt_referecia = $dbh->prepare('SELECT id FROM registros_activacion WHERE email =:email AND password =:pass AND no_referencia =:no_referencia');

			            $smt_referecia->execute(array(':email'=> $email,':pass' => $pass,':no_referencia' =>$no_referencia));		            
			           	$row_referecia = $smt_referecia->fetch();

			           	if($row_referecia!=false && is_array($row_referecia)){
			           		session_start();			           		
			           		$_SESSION['usuario'] = 1;
			           		$msg = 'Acceso correcto';
 			           	}else{
 			           		$estatus 	= 0;
		     				$msg 		= 'No de referencia incorrecto';
			           	} 	

		            }else{
		            	$estatus 	= 0;
		     			$msg 		= 'El email o password incorrecto';       	
		            }
				    				   
				}else{
					$estatus 	= 0;
			    	$msg 		= 'Error en conexión a base de datos';
				}

			}else{
				$estatus 	= 0;
		     	$msg 		= 'El email incorrecto';       	
			}
	}

}else{
	$estatus 	= 0;
	$msg 		= 'Parámetros incorrectos';
}

echo json_encode(array('estatus'=>$estatus,'msg'=>$msg));