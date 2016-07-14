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
	
	$op = $_GET['recordID'];
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
          <a href="reporteAdm.php?recordID=1" class="header-text1" title="Enlace para direccionar a la página de usuarios inscritos">Usuarios inscritos</a>
		  <br>
		  <br>          
          <a href="reporteAdm.php?recordID=2" class="header-text1" title="Enlace para direccionar a la página de lista usuario">Lista de usuarios</a>
          <br>
		  <br>
          <a href="lista_rutina.php" class="header-text1" title="Enlace para direccionar a la página de lista rutinas">Lista de Rutinas</a>
          
          </td>
   	      <td width="836">          
          <?php
		  	switch($op)
			{
				case 1:
				?>
                	<table width="227" height="72" border="0" summary="Tabla_Principal">
                      <tr>
                          <td width="37" height="68" VALIGN=bottom ><!-- Tabla mostrar numeros -->
                            <table width="31" height="67" border="0"><!-- SubTabla mostrar numeros -->
                              
                              <?php
                            for($i = $cont; $i >0; $i = $i - 5)
                            {
                                echo "<tr><td height='50' background='../images/vertical.png' VALIGN='baseline'> ".($i)." </td></tr>";
                            }
                          ?>
                              
                              <tr>
                                <td height="25" background="../images/esquina.png">&nbsp;</td>
                              </tr>
                            </table><!-- Fin SubTabla mostrar numeros -->
                            <!-- Fin Tabla mostrar numeros --></td>
                          <td width="274" VALIGN=bottom><!-- Tabla mostrar graficos -->
                            <table width="178" height="67" border="0" summary="TablaGraphics1">
                              <tr align="center">
                                <td width="12" height="25">&nbsp;</td>
                                <td width="56">
                                
                                <?php
								if($op1 != 11)
								{
								?>
                                    <a href="reporteAdm.php?recordID=1&op=11" title="Enlace para direccionar a la página de estadisticas">
									100%
                                      <table height="<?php echo ($num * 10); ?>" width="30" border="0"><!-- Tabla barra usuarios -->
                                        <tr>
                                          <td bgcolor="#990000">&nbsp;</td>
                                        </tr>
                                      </table><!-- Fin Tabla barra usuarios-->
                                    </a>
								<?php
								}
								else
								{
									$numMuj = (consultar('cliente','idCliente > 0 AND Genero = "Femenino"') -> num_rows);
									$numHom = (consultar('cliente','idCliente > 0 AND Genero = "Masculino"') -> num_rows);
									
								?>
								<?php echo substr((($numMuj * 100) / $num),0,4)."%"; ?>
                                <a href="reporteAdm.php?recordID=2&op=21" title="Enlace para direccionar a la página de estadisticas">
									
                                	<table height="<?php echo ($numMuj * 10); ?>" <?php echo ($numMuj == 0)?"hidden=''":""; ?>width="30" border="0"><!-- Tabla barra mujeres -->
                                        <tr>
                                          <td bgcolor="#990000">&nbsp;</td>
                                        </tr>
                                      </table><!-- Fin Tabla barra mujeres-->
                                      </a>
                                <?php
									
								}
								?>
                                  
                                  </td>
                                <td width="10">&nbsp;</td>
                                <td width="72" VALIGN=bottom>
								<?php echo ($op1 != 11)?"":"".substr((($numHom * 100) / $num),0,4)."%"; ?>
                                <a href="reporteAdm.php?recordID=2&op=22">
								
                                <table height="<?php echo ($numHom * 10); ?>" width="30" border="0" <?php echo ($op1 != 11)?"hidden=''":""; ?>><!-- Tabla barra Hombres -->
                                        <tr>
                                          <td bgcolor="#000066">&nbsp;</td>
                                        </tr>
                                      </table><!-- Fin Tabla barra hombres-->
                                </a>
                                </td>
                              </tr>
                              <tr>
                                <td height="25" background="../images/horizontal.png">&nbsp;</td>
                                <td background="../images/horizontal.png"><?php echo ($op1 != 11)?"Usuarios":"Mujeres"; ?></td>
                                <td background="../images/horizontal.png">&nbsp;</td>
                                <td background="../images/horizontal.png" <?php echo ($op1 != 11)?"hidden=''":""; ?>>Hombres</td>
                              </tr>
                            </table>
                            <!-- Fin Tabla mostrar graficos --></td>
                        </tr>
                      </table>
				<?php
				break;
				case 2:
				
					$condicion = (($op1 == 21)?'idCliente > 0 AND Genero = "Femenino"':(($op1 == 22)?'idCliente > 0 AND Genero = "Masculino"':'idCliente > 0'));
					
					$sql = consultar('cliente',$condicion);
					?>
                    <table width="712" border="1">
                      <tr>
                        <td width="136">Nombre</td>
                        <td width="133">Apellido</td>
                        <td width="135">Tipo Documento</td>
                        <td width="118">N° Documento</td>
                        <td width="67">Edad</td>
                        <td width="83">Genero</td>
                      </tr>
                      <?php
					while($row = $sql -> fetch_assoc())
					{
						echo 
						"
							<tr>
								<td>".$row['Nombre']."</td>
								<td>".$row['Apellido']."</td>
								<td>".$row['TipoDocumento']."</td>
								<td>".$row['Documento']."</td>
								<td>".$row['Edad']."</td>
								<td>".$row['Genero']."</td>
							  </tr>
                    
						";
					}
					?>
                    </table>
                   <?php 
                    
				break;
			}
		  ?>
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