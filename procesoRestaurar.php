<?php
	session_start();
	error_reporting(0);
	include_once 'libreria.php';
	$db = conectarBD();
	$Documento=$_GET["Documento"];
	$Email = $_GET["Email"];	
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
<title>procesorestauar</title>
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
			   <li><a href="../vista/trayecto.php">Nuestra trayectoria</a></li>
			   <li><a href="../vista/galeria.php">Rutinas</a></li>
			   <li><a href="../vista/progreso.php">Progreso semanal</a></li>
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
						<form action="../controller/procesoRestaurar.php" method="get"> 
								<div class="register-top-grid">
										<h3>Recuperar cuenta</h3>
                                        <div>
										<?php
	
$consulta = consultar('usuario','Email="'. $Email .'"');

$verificar = consultar('cliente','Documento='.$Documento);

if(($verificar -> num_rows)>0 and ($consulta -> num_rows)>0)
{
	$Contrasena = $_GET['Contrasena'];
	
	$row = $verificar -> fetch_assoc();
	$rows = $consulta -> fetch_assoc();
	
	$idUsuario = $rows['idCliente'];
	$idCliente = $row['idUsuario'];
	
	if($idUsuario == $idCliente)
	{
		if ($_GET['actualizar'] == "Modificar")
		
		{
					
			$sql = "UPDATE usuario SET Contrasena='$Contrasena' WHERE idCliente=$idCliente";
			
			if(!$result = $db->query($sql))
			{
			  die('Hay un error corriendo en la consulta!!! [' . $db->error . ']');
			}
			
			echo "El cliente con codigo <b>$idCliente</b> ha sido actualizado con éxito <a href='../index.php'>Regresar</a>";
		}
		
		else
		
		{
			
			
		
			echo '<form action="'. $_SERVER["PHP_SELF"].'" method="get">
			
			Nombre: <input type="hidden" value="'.$row['Nombre'].'" name="nombre" />'.$row['Nombre'].'<br>
			
			Apellido: <input type="hidden" value="'.$row['Apellido'].'" name="apellido" />'.$row['Apellido'].'<br>
			
			Tipo Documento: <input type="hidden" value="'.$row['TipoDocumento'].'" name="TD" />'.$row['TipoDocumento'].'<br>
			
			Numero Documento:<input type="hidden" name="Documento" value="'. $row['Documento'] .'" />'. $row['Documento'] .'<br>
			
			Email:<input type="hidden" name="Email" value="'. $rows['email'] .'" />'. $rows['email'] .'<br>
			
			Digite la nueva Contraseña:<input type="text" name="Contrasena" value="" /><br>
			
			<input type="submit" value="Modificar" name="actualizar" />
			
			</form>';
		
		}
	}
	else
	{
		echo 'El email y documento no coinciden';
	}
}
else
{
	$_SESSION['error_login'] = "Usuario con este documento no existe";
}
?>
</div>
								</div>	
								<div class="clear"> </div>
								
					
         
</body>
</html>