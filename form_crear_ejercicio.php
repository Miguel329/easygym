<?php
	session_start();
	error_reporting(0);
	require '../controller/libreria.php';
	include'../controller/script.php';
	require '../controller/controlar.php';
	
	if($_SESSION['permisos'] != 11)
	{
		$url_relativa="../index.php";
		header("Location: http://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . "/" . $url_relativa);
	}
	
	$db = conectarBD();
	
	$idrutina = $_GET['idrutina'];
	$op1 = $_GET['op'];
	$num = (consultar('cliente','idCliente > 0') -> num_rows);
	
	
	$cont = $num;
	
	while(($cont % 5)!= 0)
	{
		$cont = $cont + 1;
	}
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
<title>Reporte</title>
<link rel="shortcut icon" href="../images/Ima.png"/>
<link href="../css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="../css/style.css" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700' rel='stylesheet' type='text/css'>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="../js/jquery.min.js"></script>
<!-- grid-slider -->
<script type="text/javascript" src="../js/jquery.mousewheel.js"></script>
<script type="text/javascript" src="../js/jquery.contentcarousel.js"></script>
<script type="text/javascript" src="../js/jquery.easing.1.3.js"></script>
<!-- //grid-slider -->
<!-- Add fancyBox main JS and CSS files -->
		<script src="../js/jquery.magnific-popup.js" type="text/javascript"></script>
		<link href="../css/magnific-popup.css" rel="stylesheet" type="text/css">
		<link href="css/menustyle.css" rel="stylesheet" type="text/css">
		<style type="text/css">
		.main .container table tr td table tr td {
	font-weight: bold;
}
        </style>
		<script>
			$(document).ready(function() {
				$('.popup-with-zoom-anim').magnificPopup({
					type: 'inline',
					fixedContentPos: false,
					fixedBgPos: true,
					overflowY: 'auto',
					closeBtnInside: true,
					preloader: false,
					midClick: true,
					removalDelay: 300,
					mainClass: 'my-mfp-zoom-in'
			});
		});
		</script>

</head>
<body>
     <div class="header-bottom">
		 <div class="container">
			<div class="header-bottom_left">
				<i class="phone"> </i><div class="banner_btn">
            <span><a href="" title="link para contactarnos para el enlace en gmail ">Easygym@easygym.com</a></span>
			</div>
			</div>
			<div class="social">	
			   <ul>	
				  <li class="facebook" title="link para direccionar a la pagina de enlace de facebook "><a href="https://es-la.facebook.com/"><span> </span></a></li>
				  <li class="twitter" title="link para direccionar a la pagina de enlace de twitter "><a href="https://twitter.com/?lang=es"><span> </span></a></li>
				  <li class="pinterest" title="link para direccionar a la pagina de enlace de pinterest "><a href="https://es.pinterest.com/"><span> </span></a></li>	
				  <li class="google" title="link para direccionar a la pagina de enlace de google "><a href="https://www.google.es/"><span> </span></a></li>
				  <li class="tumblr" title="link para direccionar a la pagina de enlace de tumblr "><a href="https://www.tumblr.com/"><span> </span></a></li>
				  <li class="instagram" title="link para direccionar a la pagina de enlace de instagram "><a href="https://www.instagram.com/"><span> </span></a></li>	
				  <li class="rss" title="link para direccionar a la pagina de enlace de rss "><a href="https://www.rss.com/"><span> </span></a></li>							
			   </ul>
		   </div>
		   <div class="clear"></div>
		</div>
</div>
    <div class="menu">
	  <div class="container">
		 <div class="logo">
			<a href="../index.php"><img src="../images/DFSF.png" width="302" height="146" alt="LOGO_inicio" title="LOGO_inicio" class="img-responsive"></a>
		 </div>
		<div class="h_menu4">
		  <a class="toggleMenu" href="">Menu</a>
			 <ul class="nav">
                <li><a href="../index.php" title="link para direccionar a la pagina de inicio">Inicio</a></li>
			   <li><a href="trayecto.php" title="link para direccionar a la pagina de quienes somos ">Quienes somos</a></li>
			   <li><a href="galeria.php" title="link para direccionar a la pagina de rutinas">Rutinas</a></li>			   
               <li><a href="progreso.php" title="link para direccionar a la pagina de Progreso semanal ">Progreso semanal</a></li>
               <?php
				if(substr($_SESSION['permisos'], 1, 1) == '1')
				{
				?>
				<li><a href="reporteAdm.php"title="link para direccionar a la pagina del administrador">Administrador</a></li>
				<?php
				}
				?>
			 </ul>
			  <script type="text/javascript" src="../js/nav.js"></script>
	    </div>
		 <div class="clear"></div>
	  </div>
	</div>
	<!-- end menu -->
    
    <div class="main">
    <div class="container">
		
   	  <!-- Tabla principal -->
   	  <p><!-- Fin Tabla principal --></p>
   	  <p>&nbsp;</p>
      
   	  
   	  <table width="1058" height="326" border="0">
   	    <tr>
   	      <td width="206">
                <br>          
          <a href="reporteAdm.php?recordID=1" class="header-text1">Usuarios inscritos</a>
		  <br>
		  <br>          
          <a href="reporteAdm.php?recordID=2" class="header-text1">Lista de usuarios</a>
          <br>
		  <br>
          <a href="lista_rutina.php" class="header-text1">Lista de Rutinas</a>
          
          </td>
   	      <td width="836">
          
           <?php echo (isset($_SESSION['video']))?"<font color='#CC0000'>".$_SESSION['video']."</font>":"Digite los siguientes datos"; ?>
          
          <form method="post" action="../controller/registrar_ejercicio.php">
          <input type="text" name="idrutina" hidden="" value="<?php echo $idrutina; ?>">
          	<table width="384" border="0">
              <tr>
                <td width="176" height="34"><div align="right">Nombre</div></td>
                <td width="35">&nbsp;</td>
                <td width="159"><input type="text" name="nombre" id="textfield" placeholder="Digite nombre del ejercicio"></td>
              </tr>
              <tr>
                <td width="176" height="34"><div align="right">Video</div></td>
                <td width="35">&nbsp;</td>
                <td width="159"><input type="text" name="video" id="textfield" placeholder="https://www.youtube.com"></td>
              </tr>
              <tr>
                <td width="176" height="34"><div align="right">Video para</div></td>
                <td width="35">&nbsp;</td>
                <td width="159">
                <select name="permiso">
                  <option value="">Seleccione</option>
                  <option value="Femenino">Mujeres</option>
                  <option value="Masculino">Hombres</option>
                  <option value="Mixto">Todos</option>
                </select>
                </td>
              </tr>
              <tr>
                <td height="43" colspan="3"><div align="center">
                  <input type="submit" name="button" id="button" value="Enviar" >
                </div></td>
              </tr>
            </table>
			</form>
          
          </td>
        </tr>
      </table>
   	  <p>&nbsp; </p>
   	  <p>&nbsp;</p>
</div>
</div>
    
    	<div class="row price_plans"></div>
            </div>
		 		
</body>
</html>