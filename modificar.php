<?php
	session_start();
	error_reporting(0);
	include_once('libreria.php');
	include 'script.php';
	conectarBD();
	$id=$_SESSION['id_usuario'];
	
	$Peso = $_POST["Peso"];
	$Estaura = $_POST["Estatura"];
	
	$sql = "UPDATE cliente SET Peso='$Peso', Estatura='$Estaura' WHERE idCliente=$id";
	
	$result = mysql_query($sql);
	
	$url_relativa = "../vista/usuario.php";
	
	header ("Location: http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']). "/" .$url_relativa);
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
<title>modificar</title>
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
			<a href="../index.php"><img src="../../easyGym1/images/DFSF..png" width="302" height="146" alt="LOGO"> </a>
		 </div>
		 <div class="h_menu4"><!-- start h_menu4 -->
		   <a class="toggleMenu" href="">Menu</a>
			 <ul class="nav">
			   <li><a href="trayecto.php">Nuestra trayectoria</a></li>
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
					
				?>
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