<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#frm-login").submit(function(e){
				e.preventDefault();
				 $.ajax({
	               type: "POST",
	               url: "acceso.php",
	               dataType:'json',
	               data: $("#frm-login").serialize(),
	               success: function(data){
	                     if(data.estatus == 1){
	                     	  window.location.href = 'dashboard.php';	                        
	                     }else{
	                        alert(data.msg);                     	
	                     }
	                }
	            });
			});
		});
	</script>
</head>
<body>
<!--
$_POST['email'] 		='jiizz182@hotmail.com';
$_POST['no_referencia'] ='123HHGFG';
$_POST['pass'] 			='&%/&GJHVBNM';
-->
	<form name="frm-login" id="frm-login">
		<input type="text" name="no_referencia" id="no_referencia" placeholder="no referencia" required>	
		<input type="email" name="email" id='email' placeholder="email" required>
		<input type="password" name="pass" id='pass' placeholder="password" required>	
		<input type="submit" value="Aceptar">
	</form>	
</body>
</html>