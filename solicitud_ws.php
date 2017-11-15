<?php

if(isset($_POST) && count($_POST)>0){

	require_once('WebService.php');
	$iq_ws = new WebService('11','usr_bus_iq','12121212');
	$patron 				= '/^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/';
	
	$error 					= 0; 
	$requiereFactura 	    = 0;	
 	$nombreSolicitante 		= strip_tags(trim($_POST['nombre']));
	$apellidoPaterno 		= strip_tags(trim($_POST['apellidop']));
	$apellidoMaterno 		= strip_tags(trim($_POST['apellidom']));
	$correoElectronico 		= strip_tags(trim($_POST['mail']));
	$contrasenaCorreo 		= strip_tags(trim($_POST['password']));
	$numeroTelefonico 		= strip_tags(trim($_POST['tel']));
	$idInstitucion 			= strip_tags(trim($_POST['id_institucion']));
	$nombreInstitucion 		= strip_tags(trim($_POST['institucion']));
	$vigencia 				= strip_tags(trim($_POST['vigencia']));
	$curps 					= array();
	$paramatetrosFactura 	= array();

	foreach ($_POST as $key => $curp) {
		
		if (strpos($key, 'curp_') !== false && !empty($curp)) {
			$curps[]	= $curp;		    
		}	
	}

	if(count($curps)>0){
		foreach ($curps as $curp) {	
			$valida_curp = preg_match($patron,$curp);					
			if($valida_curp == 0){
				
				$estado = 0;
				$msg 	= 'Uno de los CURP proporcionados es inválido'; 		
				$error  = 1;
				break;
			}	
		}

		if(isset($_POST['factura']) && is_numeric(strip_tags($_POST['factura'])) &&  intval(strip_tags($_POST['factura']))==1){

			$patronRFC					 = "/^([A-ZÑ&]{3,4}) ?(?:- ?)?(\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])) ?(?:- ?)?([A-Z\d]{2})([A\d])$/";
			$requiereFactura 			 = intval(strip_tags($_POST['factura']));
			$rfc 			 			 = strip_tags(trim($_POST['rfc']));
			$razonSocial 	 			 = strip_tags(trim($_POST['razon_social']));
			//$calle 			 			 = strip_tags(strip_tags($_POST['calle']));
			$calle 			 			 = 'cove';
			$numeroExterior  			 = intval(strip_tags(trim($_POST['numero_ext'])));
			$numeroInterior  			 = strip_tags(trim($_POST['numero_int']));
			$colonia 		 			 = strip_tags(trim($_POST['colonia']));
			$codigoPostal				 = intval(strip_tags(trim($_POST['cp'])));
			$localidad 		 			 = strip_tags(trim($_POST['localidad']));	
			$delegacionMunicipio 		 = strip_tags(trim($_POST['del_mun']));
			$entidadFederativa 		 	 = strip_tags(trim($_POST['entidad']));

			$valida_rfc 				 = preg_match($patronRFC,$rfc);
			if($valida_rfc == 0 || $valida_rfc == false){
				
				$estado = 0;
				$msg 	= 'El RFC proporcionado es inválido'; 		
				$error  = 1;							
			}

		}

		if($error==0){

			if($requiereFactura ==1){

				$params = array(
						'nombreSolicitante' 	=> $nombreSolicitante,
						'apellidoPaterno' 		=> $apellidoPaterno,
						'apellidoMaterno' 		=> $apellidoMaterno,
						'correoElectronico' 	=> $correoElectronico,
						'contrasenaCorreo' 		=> $contrasenaCorreo,
						'numeroTelefonico' 		=> $numeroTelefonico,
						'idInstitucion' 		=> $idInstitucion,
						'nombreInstitucion' 	=> $nombreInstitucion,
						'vigencia' 				=> $vigencia,
						'curps'					=> $curps,
						'requiereFactura' 		=> $requiereFactura,	
						'rfc' 					=> $rfc,
						'razonSocial' 			=> $razonSocial,
						'calle' 				=> $calle,
						'numeroExterior'		=> $numeroExterior,
						'numeroInterior'		=> $numeroInterior,
						'colonia'				=> $colonia,
						'codigoPostal'			=> $codigoPostal,
						'localidad'				=> $localidad,
						'delegacionMunicipio'	=> $delegacionMunicipio,
						'entidadFederativa'		=> $entidadFederativa
					);
			}else{

				$params = array(
					'nombreSolicitante' 	=> $nombreSolicitante,
					'apellidoPaterno' 		=> $apellidoPaterno,
					'apellidoMaterno' 		=> $apellidoMaterno,
					'correoElectronico' 	=> $correoElectronico,
					'contrasenaCorreo' 		=> $contrasenaCorreo,
					'numeroTelefonico' 		=> $numeroTelefonico,
					'idInstitucion' 		=> $idInstitucion,
					'nombreInstitucion' 	=> $nombreInstitucion,
					'vigencia' 				=> $vigencia,
					'curps'					=> $curps,
					'requiereFactura' 		=> $requiereFactura					
				 );	
			}
			
			
			var_dump($params);die;
			$result_solicitud = $iq_ws->Metodo('SolicitudLicencia',$params); 
			var_dump($result_solicitud);die;
			if($result_solicitud->SolicitudLicenciaResult->estado==0){
				$estado = 1;
				$msg 	= 'Su solicitud ha sido procesada correctamente, en breve recibirá un email con la información correspondiente';
			}else{
				$estado = 0;
				$msg 	= $result_solicitud->SolicitudLicenciaResult->descripcion;
			}
		}		
				
	}else{
		$estado = 0;
		$msg 	= 'Ingrese al menos un CURP';		
	}
	
}else{
	$estado = 0;
	$msg 	= 'Los parámetros son incorrectos'; 
}

echo json_encode(array('estado'=>$estado, 'msg'=>$msg));

      
/*
$params = array(
			'nombreSolicitante' 	=> 'Pablo Jahir',
			'apellidoPaterno' 		=> 'Maya',
			'apellidoMaterno' 		=> 'Jimenez',
			'correoElectronico' 	=> 'themstudio@hotmail.com',
			'contrasenaCorreo' 		=> '123456789',
			'numeroTelefonico' 		=> '5570739347',
			'idInstitucion' 		=> '1',
			'nombreInstitucion' 	=> 'UVM',
			'vigencia' 				=> 2020,
			'curps'					=> array('MAJP900906HMNYMB07'),
			'requiereFactura' 		=> true,
			'rfc' 					=> 'MAJP900906IK5',
			'razonSocial' 			=> '',
			'calle' 				=> '',
			'numeroExterior'		=> '',
			'numeroInterior'		=> '',
			'colonia'				=> '',
			'codigoPostal'			=> '',
			'localidad'				=> '',
			'delegacionMunicipio'	=> '',
			'entidadFederativa'		=> ''					
		 );

try{
  $result = $soap->__soapCall('SolicitudLicencia',array($params));

  echo $result->SolicitudLicenciaResult->estado;
}
catch (SoapFault  $exception)
{
echo $exception->faultstring;
}


*/
/*
  $client = new SoapClient("http://validmobile.iqsec.mx/WSLicencias/WSLicencia.asmx?WSDL",);
  $result = $client->SolicitudLicencia();
  $xml = $result->SolicitudLicenciaRespuesta;
var_dump($xml);die;
  // procesar xml
  $xml = simplexml_load_string($xml);
  foreach($xml->Table as $table) 
  {
    $output .= "<p>$table->Name</p>";
  }
  print_r($output);
*/