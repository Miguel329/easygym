<?php
	session_start();
	error_reporting(0);
	include_once('../controller/libreria.php');
	include '../controller/script.php';
	require '../controller/controlar.php';
	$db = conectarBD();
	$id=$_SESSION['id_usuario'];
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
<title>usuario</title>
<link rel="shortcut icon" href="../images/Ima.png"/>
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
			<a href="../index.php"><img src="../images/DFSF.png" width="302" height="146" alt="LOGO_inicio" title="LOGO_inicio"> </a>
		 </div>
		 <div class="h_menu4">
		   <a class="toggleMenu" href="">Menu</a>
			 <ul class="nav">
               <li><a href="../index.php">Inicio</a></li>
			   <li><a href="trayecto.php">Quienes somos</a></li>
			   <li><a href="galeria.php">Rutinas</a></li>	
			   <li><a href="progreso.php">Progreso semanal</a></li>
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
            	<?php
					$consulta = consultar('cliente','idCliente ='.$id);
					$row = $consulta -> fetch_assoc();
				?>
 <form name="form1" method="post" action="../controller/modificar.php">
 
 <p>&nbsp;</p>
        <table width="394" height="418" border="0">
               
  <tr>
    <td width="171"><h4 align="right">Nombre:</h4></td>
    <td width="28">&nbsp;</td>
    <td width="181"><?php echo $row['Nombre']?></td>
  </tr>
  <tr>
    <td><h4 align="right">Apellido:</h4></td>
    <td>&nbsp;</td>
    <td><?php echo $row['Apellido']?></td>
  </tr>
  <tr>
    <td><h4 align="right">Tipo documento:</h4></td>
    <td>&nbsp;</td>
    <td><?php echo $row['TipoDocumento']?></td>
  </tr>
  <tr>
    <td><h4 align="right">Numero documento:</h4></td>
    <td>&nbsp;</td>
    <td><?php echo $row['Documento']?></td>
  </tr>
  <tr>
    <td><h4 align="right">Fecha Nacimiento:</h4></td>
    <td>&nbsp;</td>
    <td><?php echo $row['FechaNacimiento']?></td>
  </tr>
  <tr>
    <td><h4 align="right">Edad:</h4></td>
    <td>&nbsp;</td>
    <td><?php echo $row['Edad']?></td>
  </tr>
  <tr>
    <td height="42"><h4 align="right">Genero:</h4></td>
    <td>&nbsp;</td>
    <td><?php echo $row['Genero']?></td>
  </tr>
  <tr>
    <td height="42" colspan="3"><div align="center">
      <input name="Enviar" type="submit" value="Enviar">
    </div></td>
    </tr>
    
  </table>
                
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