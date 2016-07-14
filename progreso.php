<?php
	session_start();
	error_reporting(0);

	require '../controller/libreria.php';
	include'../controller/script.php';
	require '../controller/controlar.php';
	
	$db = conectarBD();
	
	///////////////////////////////////////////Recibo variables////////////////////////////////////////////////////////////////
	$opcion = $_GET['recordID'];	
	$idCliente = $_SESSION['id_usuario'];
	$doc = $_SESSION['documento'];	
	///////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	/////////////////////////////////////////////////Consultar la tabla cliente//////////////////////////////////////////////////////////
	$sql = consultar('cliente','documento ='. $_SESSION["documento"]);
	$array_sql = $sql -> fetch_assoc();	
	///////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	//////////////////////////consultar la tabla reporte para consultar los ID de cada usuario////////////////////////////////////////////
	$con = consultar('reporte', 'idReporte > 0 AND documento ='. $_SESSION["documento"]);
	$rowCon1 = (($con -> num_rows) + 1);
	///////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	//////////////////////////consultar la tabla reporte para insertar el ultimo ID en la tabla////////////////////////////////////////////
	$con2 = consultar('reporte', 'idReporte > 0 ');
	$rowCon = (($con2 -> num_rows) + 1);
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
	
	///////////////////////////////////Insertar datos en la tabla reporte////////////////////////////////////////////////////////////////////////
		if((isset ($_POST["Peso"])))
		{
			$peso = $_POST["Peso"];			
			$estatura  = $_POST["Estatura"];			
			$IMC = $peso / (($estatura / 100)*($estatura / 100));			
			 if($IMC < 20)
			 {
				 $estado = "Anorexia";
			 }
			 else
			 {
				 if($IMC < 21)
				{
					 $estado = "Delgado";
				}
				else
				{
					if($IMC > 20 and $IMC < 25)
					 {
						 $estado = "Peso normal";
					 }
					 else
					 {
						 if($IMC > 24 and $IMC < 30)
						 {
							 $estado = "Sobrepeso";
						 }
						 else
						 {
							 if($IMC > 29 and $IMC < 40)
							 {
								 $estado = "Obesidad";
							 }
							 else
							 {
								 if($IMC > 39)
								 {
									 $estado = "Obesidad morbida";
								 }
							 }
						 }
					 }
				}
			 }
			 date_default_timezone_set('America/Bogota');
			 $fechaReporte = date('Y-m-d');
			$array_valores = array($rowCon ,substr($IMC,0,5),$peso,$estatura,$fechaReporte,$estado,$doc);
			$array_campos = array('idReporte','imc','peso','estatura','fechaReporte','estado','documento');
			
			$in = insertar('reporte',$array_valores,$array_campos);
		}
	//////////////////////////////////Fin Insertar datos en la tabla reporte//////////////////////////////////////
		
	////////////////////////////////////consultar la tabla reporte con la ultima fecha de actualizacion//////////////////////////
		$con3 = consultar('reporte', 'documento ='. $_SESSION["documento"] .' ORDER BY fechaReporte DESC');
		$UltimaFecha = $con3 -> fetch_assoc();
	///////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	
////////////////////Dar nombre del mes o dia segun llamen la funcion////////////
	$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
	$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
///////////////////////////////////////////////////////////////////////

?>
<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html><head>
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
    <td width="909">
    <?php echo ($con -> num_rows == 0 && $opcion != 1)?"<h1>Recuerde calcular el Indice de Masa Corporal(IMC)</h1>":"";?>
	<?php
		  $conReport = consultar('reporte','documento = '.$doc.' ORDER BY reporte.idReporte DESC');
	$rowReport = $conReport -> fetch_assoc();
		switch($opcion)
		{///inicio switch 
			
			////Caso 1 donde se le pide y muestra al usuario el peso y estatura actual
			case 1:
				if(isset($peso))
				{
				///////////////Inicio Mostrar ultimo peso guardado ///////////////////
				?>                
					<table width="560" border="0" align="center">
				  <tr>
					<td width="62"><div align="center"><strong>Peso</strong></div></td>
					<td width="100"><div align="center"><strong>Estatura</strong></div></td>
					<td width="264"><div align="center"><strong>IMC (Indice de masa corporal)</strong></div></td>
					<td width="79"><div align="center"><strong>Estado</strong></div></td>
				  </tr>
				  <tr>
					<td><div align="center"><?php echo $rowReport['peso']; ?></div></td>
					<td><div align="center"><?php echo $rowReport['estatura'];?></div></td>
					<td><div align="center"><?php echo $rowReport['imc'];?></div></td>
					<td><div align="center"><?php echo $rowReport['estado']; ?>
					</div></td>
				  </tr>
				</table>
				<?php
				///////////////Fin tabla Mostrar ultimo peso guardado ///////////////////
				}
				else
				{
				////////////////Inicio formulario para insertar peso y estatura/////////////////////
				?>
					<form action="progreso.php?recordID=1" method="post"> 
			<div class="register-top-grid">
										<h3>INFORMACION PERSONAL</h3>
										<div>
											<span>Peso
											<label>*</label></span>
											<input type="text" name="Peso" placeholder="digite su peso"> 
										</div>
			  <div>
											<span>Estatura
											<label>*</label></span>
											<input type="text" name="Estatura" placeholder="digite su estatura"> 
			  </div>
					   </div>
<input type="submit" value="Enviar" title="link para confirmar peso y estatura">
			</form>
   				<?php
				////////////////Fin formulario para insertar peso y estatura/////////////////////
				}
			break;
			
			//////////Cso 2 Se muestran todos los pesos por orden de fecha la mas actulaizada de primeras///////
			case 2:
				$conReport = consultar('reporte','documento = '.$doc.' ORDER BY fechaReporte DESC');
				
				////Inicio tabla mostrar datos guardados en reporte
				?>
					<table width="559" height="30" border="1" <?php echo ($con -> num_rows == 0)?"hidden=''":"";?>>
							  <tr>
								<td width="47">Peso</td>
								<td width="80">Estatura</td>
								<td width="72">IMC</td>
								<td width="194">Estado</td>
								<td width="132">Fecha</td>
							  </tr>
				<?php
						while($est = ($conReport -> fetch_assoc()))
						{////Inicio while donde se muestra los datos guardados
							echo 
							"
							   <tr>
								<td>".$est['peso']."</td>
								<td>".$est['estatura']."</td>
								<td>".$est['imc']."</td>
								<td>".$est['estado']."</td>
								<td>".$est['fechaReporte']."</td>
							  </tr>				
							";
						}////Fin while donde se muestra los datos guardados
				?>
						</table>
                        
				<?php
				////Fin tabla mostrar datos guardados en reporte
			break;
			
			
			
		}/////Fin switch
    ?>
	</td>
  </tr>
</table>


      </div>             
      		<div class="row price_plans"></div>
            </div>
<!----------Procesos principales---------------------->

</body>
</html>