<?php
	session_start();
	error_reporting(0);
	//require('../controller/Calendario.php');
?>
<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>registro</title>
<link rel="shortcut icon" href="../images/ima.png"/>
<link href="../css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="../css/style.css" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700' rel='stylesheet' type='text/css'>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="../js/jquery.min.js"></script>
</head>
<body>
    <!-- start header_bottom -->
    <div class="header-bottom">
		 <div class="container">
		   <div class="social">	
		      <ul>	
				  <li class="facebook"><a href="#"><span> </span></a></li>
				  <li class="twitter"><a href="#"><span> </span></a></li>
				  <li class="pinterest"><a href="#"><span> </span></a></li>	
				  <li class="google"><a href="#"><span> </span></a></li>
				  <li class="tumblr"><a href="#"><span> </span></a></li>
				  <li class="instagram"><a href="#"><span> </span></a></li>	
				  <li class="rss"><a href="#"><span> </span></a></li>							
			   </ul>
		   </div>
		   <div class="clear"></div>
		</div>
    </div>
    <!-- start menu -->
    <div class="menu">
	  <div class="container">
		 <div class="logo">
			<a href="../index.php"><img src="../images/DFSF.png" width="302" height="146" alt="LOGO"> </a>
		 </div>
		 <div class="h_menu4"><!-- start h_menu4 -->
		   <a class="toggleMenu" href="">Menu</a>
			 <ul class="nav">
			   <li><a href="trayecto.php">Quienes somos</a></li>
			   
			 </ul>
			  <script type="text/javascript" src="../js/nav.js"></script>
		  </div><!-- end h_menu4 -->
		 <div class="clear"></div>
	  </div>
	</div>
	<!-- end menu -->
        <div class="main">
          <div class="register-grids">
          	<div class="container">
						<form action="../controller/procesoRegistro.php" method="post"> 
						  <div class="register-top-grid">
										<h3>INFORMACION PERSONAL</h3>
										<div>
											<span>Nombres<label>*</label></span>
											<input type="text" name="Nombre" required> 
										</div>
										<div>
											<span>Apellidos<label>*</label></span>
											<input type="text" name="Apellido" required> 
										</div>
										<div>
											<span>Tipo de documento<label>*</label></span>
											<select name="TipoDocumento" >
                                              <option selected="selected">---------------------</option>
                                              <option value="C.C.">Cedula de Ciudadania</option>
                                              <option value="T.I.">Tarjeta de Identidad</option>
                                              <option value="R.C.">Registro Civil</option>
                                              <option value="C.E.">Cedula de Extranjeria</option>
                                              <option value="P.">Pasaporte</option>
                                            </select> 
										</div>
                                        <div>
											<span>No documento<label>*</label><?php echo "<br>".$_SESSION['error'];?></span>
											<input type="text" name="Documento" required> 
										</div>
                                        <div>
                                        </div>
                                                                                <div >
                                                                                </div>
                                        <div> <span>Fecha Nacimiento
                                                                                  <label>*</label>
                                                                                </span></div>
                                                                                <div class="clear">
                                                                                  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
<script src="../js/jquery.ui.datepicker-es.js"></script>

<script>
$(function () {
$.datepicker.setDefaults($.datepicker.regional["es"]);
$("#datepicker").datepicker({
	dateFormat: 'yy-mm-dd',
firstDay: 1
 
});
});
</script>

<input type="date" name="fechaNacimiento" required />
                                                                       </div>
                                                                                <div>
                                        </div>
                                                                                <div >
                                                                                </div>
                                        <p>&nbsp;</p>
                                        <div>
                                        </div>
                                                                                <div >
                                        </div>
								</div>
                                
                                <p></p>
								<div class="clear"> </div>
                                
								<div class="register-bottom-grid">
                                
										<h3>INFORMACION DE INGRESO</h3>
										<div>
											<span>CONTRASEÑA<label>*</label></span>
											<input type="password" name="Password" required>
										</div>
										<div>
										  <span>EMAIL<label>*</label></span>
											<input type="text" name="Email" required>
										</div>
								</div>
                                <div class="clear"> </div>
                                <div class="register-bottom-grid">
										<h3>&nbsp;</h3>
										<h3>INFORMACION General</h3>
										<div>
											<span>Edad
										  <label>*</label></span>
											<input type="text" name="edad">
										</div>
										<div>
										<span>Genero
										<label>*</label></span>
										<select name="Genero">
                                              <option selected="selected">---------------------</option>
                                              <option value="Masculino">Masculino</option>
                                              <option value="Femenino">Femenino</option>
                                              
                                              </select>
										</div>
                                        
                                        <div> </div>
                                        
                                        <div>
											<span>Codigo Administrador</span>
											<input type="password" name="codAdm">
										</div>
                                        
								
                                <div class="clear"> </div>
                                
        <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>

                                <div align="right">
									<input type="submit" value="Enviar">
                                </div>
						</form>
					</div>
				</div>
         </div>
         
         <div class="footer-bottom">
		   <div class="container">
		 	 <div class="row section group">
		 	   <div class="clear"></div>
	  		  </div>
		 	</div>
		 </div>
</body>
</html>