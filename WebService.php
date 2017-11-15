<?php

Class WebService{

	public  $result;
	private $wsdl;
	private $apiauth;

	public function __construct($entidad,$usuario,$contrasena){

		$this->wsdl 	= "http://validmobile.iqsec.mx/WSLicencias/WSLicencia.asmx?wsdl";
		$this->apiauth  = array('entidad'=>$entidad,'usuario'=>$usuario,'contrasena'=>$contrasena);			
	}

	public function Metodo($method,$params){

		$header = new SoapHeader('http://www.fielnet.com/', 'AuthSoap', $this->apiauth);
		$soap = new SoapClient($this->wsdl); 
		$soap->__setSoapHeaders($header);

		try{

		  $this->result = $soap->__soapCall($method,array($params));		  
		  	//echo $result->SolicitudLicenciaResult->estado;
		}
		catch (SoapFault  $exception)
		{
			$this->result = $exception->faultstring;
		}

		return $this->result;
	}
	
}