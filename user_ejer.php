<?php
	session_start();
	error_reporting(0);
	include_once('../controller/libreria.php');
	include '../controller/script.php';
	require '../controller/controlar.php';
	$db = conectarBD();
	$documento=$_SESSION['documento'];
	
	$con2 = consultar("usuario_rutina","documento =".$documento);
	
	$array_rutina  = array();
	
	$cont = 0;
	
	while($row = $con2 -> fetch_assoc())
	{
		$array_rutina[$cont] = $row['idRutina'];
		
		$cont = $cont + 1;
	}
	
	
	$idrutina = $_GET['id'];
	
	//die($idrutina);
?>
 <?php
 if(isset ($idrutina))
 {
					$consultar_ejercicio = consultar('ejercicio','rutina_idrutina = '.$idrutina.' AND Permisos = "'.$_SESSION['genero'].'" OR rutina_idrutina = "'.$idrutina.'" AND Permisos = "Mixto"');
 }
					$count = 0;
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
<script>
function mostrar(id, name) {
  obj = document.getElementById(id);
  na = document.getElementById(name);
  obj.style.visibility = (obj.style.visibility == 'hidden') ? 'visible' : 'hidden';
}
</script>
<script>
function open_video(a){
    a.innerHTML = '<iframe width="425" height="349" src="http://www.youtube.com/embed/'+a.rel+'?autoplay=1" frameborder="0" allowfullscreen></iframe>';
    a.onclick = null;
    a.href = null;
}
</script>
</head>
<body>
    <!-- start header_bottom -->
    <div class="header-bottom">
		 <div class="container">
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
    <!-- start menu -->
    <div class="menu">
	  <div class="container">
		 <div class="logo">
			<a href="../index.php"><img src="../images/DFSF.png" width="302" height="146" alt="LOGO_inicio" title="LOGO_inicio"> </a>
		 </div>
		<div class="h_menu4">
		   <a class="toggleMenu" href="">Menu</a>
			 <ul class="nav">
               <li><a href="../index.php" title="Enlace para direccionar a la página de inicio">Inicio</a></li>
			   <li><a href="trayecto.php" title="Enlace para direccionar a la página de quiénes somos ">Quiénes somos</a></li>
			  <li><a href="galeria.php" title="Enlace para direccionar a la página de rutinas">Rutinas</a></li>
			   <li><a href="progreso.php" title="Enlace para direccionar a la página de Progreso semanal ">Progreso semanal</a></li>
               <?php
				if(substr($_SESSION['permisos'], 1, 1) == '1')
				{
				?>
				<li><a href="reporteAdm.php"title="Enlace para direccionar a la página del administrador">Administrador</a></li>
				<?php
				}
				?>
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
            
            <table width="1140" border="0">
              <tr>
                <td width="328" height="78" valign="top">
                
                <?php
				for($i = 0; $i < count($array_rutina); $i = $i + 1)
				{
					$consultar = consultar("rutina","idRutina > 0");
				
					while($url = $consultar -> fetch_assoc())
					{
						if($url['idrutina'] == $array_rutina[$i])
						{				
				
				?>
                	<a href="user_ejer.php?id=<?php echo "".$url['idrutina']."";?>" class="header-text1" title="Enlace para direccionar a la página <?php echo "".$url['Nombre']."";?>" ><?php echo $url['Nombre']; ?></a>
                    <br>
                    <br>
                <?php	
						}
					}
				}
				?>
                <a href="form_user_ejer.php" title="Enlace para direccionar a la página agregarrutina" class="header-text1">Agregar rutina</a>
                <br>
                <br>
                <a href="galeria.php" title="Enlace para direccionar a la página de galeria " class="header-text1">Volver</a>
                </td>
                <td width="58">&nbsp;</td>
                <td width="740"> 
                               
                  
                   
                  
                  <table width="279" border="0">
                      <tr>
                    <?php
					while($url_ejer = $consultar_ejercicio -> fetch_assoc())
					{					
						$count = $count + 1;
						if( $count == 1 or $count == 2)
						{
						?>
                        <td width="198">
                        <iframe width="250" height="150" src="<?php echo $url_ejer['video']; ?>" frameborder="0" allowfullscreen></iframe>              
                        
                        </td>
                        <td width="71">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <?php
						}
					
					else
					{
						$count = 1;
					?>
                    </tr>
                    <tr height="50">
                    <td width="198" height="21">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td width="71">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    </tr>
                    <tr>
                    <td height="100">
                    <iframe width="250" height="150" src="<?php echo $url_ejer['video']; ?>" frameborder="0" allowfullscreen></iframe>
                    </td>
                    <td width="71">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <?php
					}
					}
				?>
                </tr>
                </table>
            </td>
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