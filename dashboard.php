<?php
session_start();
var_dump($_SESSION['usuario']);
if(isset($_SESSION['usuario']) && $_SESSION['usuario']==1){
	echo 'Usted esta listo para subir el archivo xml';	
}else{

	header('Location: login.php');

}
