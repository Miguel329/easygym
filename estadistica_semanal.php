<?php
	session_start();
	error_reporting(0);

	require '../controller/libreria.php';
	include'../controller/script.php';
	require '../controller/controlar.php';
	
	$db = conectarBD();
	
	///////////////////////////////////////////Recibo variables////////////////////////////////////////////////////////////////
	//$opcion = $_GET['recordID'];	
	$idCliente = $_SESSION['id_usuario'];
	$doc = $_SESSION['documento'];
	
	$mes = $_GET['mes'];	
	//setType($mes,"integer");
	//die("Este es : ".$mes);
	///////////////////////////////////////////////////////////////////////////////////////////////////////////

	////////////////////Dar nombre del mes o dia segun llamen la funcion////////////
	$dias = array("Lun","Mar","Mie","Jue","Vie","Sáb","Dom");
	$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
///////////////////////////////////////////////////////////////////////

//////////////////////////consultar la tabla reporte para consultar los ID de cada usuario////////////////////////////////////////////
	$consulta_reporte = consultar('reporte', 'idReporte > 0 AND documento ='. $_SESSION["documento"].' ORDER BY fechaReporte ASC');
	$rowCon1 = (($consulta_reporte -> num_rows) + 1);
	///////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	/////////////////////Aqui es donde calculo el tamaño que debe tener la barra de pesos fisicos////////////////////////////////////
		$con1 = consultar('reporte', 'documento ='. $_SESSION["documento"] .' ORDER BY peso DESC');
	$num = $con1 -> fetch_assoc();	
	$pesoM = $num["peso"];
	list($cont) = explode(".",$pesoM);
	while(($cont % 5)!= 0)
	{
		$cont = $cont + 1;
	}
	///////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	////////////////////////////////////consultar la tabla reporte con la ultima fecha de actualizacion//////////////////////////
		$con3 = consultar('reporte', 'documento ='. $_SESSION["documento"] .' ORDER BY fechaReporte DESC');
		$UltimaFecha = $con3 -> fetch_assoc();
	///////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	////////////////////////////////////consultar la tabla reporte con la ultima fecha de actualizacion//////////////////////////
	$consulta = consultar('reporte', 'documento ='. $_SESSION["documento"] .' ORDER BY fechaReporte ASC');	
	//////////////////////////////////////////////////////////////////////////////////////////////////////////
?>
<!DOCTYPE HTML>
<html>

<head>
<title>Progreso</title>
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
		<style type="text/css">
		.main .container table tr td table tr td {
	color: #00C;
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
			<a href="../index.php"><img src="../images/DFSF.png" width="302" height="146" alt="LOGO_inicio" title="LOGO_inicio" class="img-responsive"> </a>
		 </div>
         <!----------Inicio Menu principal---------------------->
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
        <!----------Fin Menu principal---------------------->
        
		 <div class="clear"></div>
	  </div>
	</div>
    
<!----------Procesos principales---------------------->
	<div class="main">
       <div class="about_banner_img"></div>
       <div class="border"></div>       
      	  <div class="container"> 
          
          <p>&nbsp;</p>
                          <p>&nbsp;</p> 
          <table width="100%" height="80%" border="0">
  <tr>
    <td width="215">
	<?php
		$fecha_semanal = date_create($UltimaFecha['fechaReporte']);
		date_add($fecha_semanal, date_interval_create_from_date_string('7 days'));
		$fechaconcertacion=date_format($fecha_semanal, 'Y-m-d');
		list($anioconcertacion, $mesconcertacion, $diaconcertacion) = explode("-",$fechaconcertacion);
		
				
		if($fechaconcertacion <= date("Y-m-d") or $con3 -> num_rows == 0)
		{
			echo '<br><a href="progreso.php?recordID=1" class="header-text1" title="Enlace para direccionar a la página de calcular I.M.C.">Calcular I.M.C.</a><br><br>';
		}			
		echo '<a href="progreso.php?recordID=2" class="header-text1" title="Enlace para direccionar a la página de tabla de datos">Ver tabla de datos</a><br><br>';
		echo '<a href="estadisticaMensual.php" class="header-text1" title="Enlace para direccionar a la página de estadisticas">Ver estadisticas</a><br>';
		echo '<br><br><br><br><a href="progreso.php?recordID=0" class="header-text1" title="Enlace para direccionar a la página del menu">Menu</a><br><br>';
	?>		
    </td>
    <td align="center">
    		  <!---------------------------------- Tabla_Principal Mostrar grafico---------------------------------------------->
					<table width="795" height="72" border="0" summary="Tabla_Principal">
						  <tr>
						  
						  <!---------------------------------- Tabla mostrar numeros ------------------------------>
							  <td width="29" height="68" VALIGN=bottom >
							  
							  
								  <!--------------------------- SubTabla mostrar numeros ---------------------------->
								<table width="31" height="67" border="0">
								  
								  <?php
								for($i = $cont; $i >0; $i = $i - 5)
								{
									echo "<tr><td height='35' background='../images/vertical.png' VALIGN='baseline'> ".($i)." </td></tr>";
								}
							  ?>
								  
								  <tr <?php echo ($consulta_reporte -> num_rows == 0)?"hidden=''":""; ?>>
									<td height="25" background="../images/esquina.png">&nbsp;</td>
								  </tr>
								</table>
								  <!--------------------------- Fin SubTabla mostrar numeros ---------------------------->
								
								</td>
						  <!-------------------------------- Fin Tabla mostrar numeros ---------------------------->
								
							  <td width="756" VALIGN=bottom>
								<!------------------------------ Tabla mostrar graficos ------------------------------------>
								  <table width="727" height="87" border="0" summary="TablaGraphics1">
								  <tr align="center">
									<td width="37" height="25">&nbsp;</td>
									<?php
								while($barras = $consulta_reporte -> fetch_assoc())
								{/////inicio while mostrar barras
												
									$fechas = date_create($barras['fechaReporte']);
									$fechass=date_format($fechas, 'Y-m-d');
									list($fechasanio, $fechasmes, $fechasdia) = explode("-",$fechass);
									//$mes_f = "'".$fechasmes."'";
									
									
									$color = (($barras['estado'] == "Anorexia")?"../images/rrr.jpg":(($barras['estado'] == "Delgado")?"../images/nnn.jpg":(($barras['estado'] == "Peso normal")?"../images/deposi.jpg":(($barras['estado'] == "Sobrepeso")?"../images/aaa.jpg":(($barras['estado'] == "obesidad")?"../images/nnn.jpg":"../images/rrr.jpg")))));
									
									if($mes == $fechasmes)
									{//// inicio if mostrar barras del mismo mes			
											?>
											<td width="124" valign="bottom" bgcolor="">			
												<?php
													$cont1 = $cont1 + 1;
												
												 echo $barras['peso'];
												 ?><!------------------------- Tabla barra pesos --------------->
												  <table height="<?php echo ($barras['peso'] * 7); ?>" width="40" border="0" bgcolor="<?php echo $color; ?>" background="<?php echo $color; ?>">
													<tr>
													
													  <td bgcolor="<?php echo $color; ?>" background="<?php echo $color; ?>">&nbsp;</td>
													  
													</tr>
												  </table>
												<!------------------------- Fin Tabla barra pesos --------------->
												
											
												</td>
												<td width="54">&nbsp;</td>
										   <?php 
									   
									   }////Fin if de mostrar las barras del mismo mes
								   
							   }///Fin while mostrar barras?>
                               <td width="494" valign="top">
                                 <div align="left"><?php echo $meses[($mes - 1)]." - ".date('Y'); ?>
                                 </div></td>
								  </tr>
								  <tr <?php echo ($consulta_reporte -> num_rows == 0)?"hidden=''":""; ?>>
									<td height="25" background="../images/horizontal.png">&nbsp;</td>  
									<?php
								while($ejex = $consulta -> fetch_assoc())
								{/////inicio while mostrar barras
												
									$fechas = date_create($ejex['fechaReporte']);
									$fechass=date_format($fechas, 'Y-m-d');
									list($fechasanio, $fechasmes, $fechasdia) = explode("-",$fechass);
									//$mes_f = "'".$fechasmes."'";
									if($mes == $fechasmes)
									{//// inicio if mostrar barras del mismo mes
									
											?>
												
											<td background="../images/horizontal.png" align="center"><?php echo $dias[(date('N', strtotime($fechass))- 1)]." - ".date('d', strtotime($fechass));?></td>
											<td background="../images/horizontal.png">&nbsp;</td>
											<?php
										}
								}
									?>
                                    
								  </tr>
								</table>
								<!---------------------------- Fin Tabla mostrar graficos ---------------------------------->
							  </td>
								
							</tr>
						  </table>
			  <!---------------------------------Fin Tabla_Principal Mostrar grafico-------------------------------------------->

    </td>
    </tr>
    </table>
          
                                    	



      </div>             
      		<div class="row price_plans"></div>
            </div>
<!----------Procesos principales---------------------->

</body>
</html>