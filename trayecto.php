<?php
	session_start();
	error_reporting(0);
	include'controller/script.php';
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="WOW Slider, Image Slider HTML, HTML Slide Show" />
	<meta name="description" content="WOWSlider created with WOW Slider, a free wizard program that helps you easily generate beautiful web slideshow" />
	
	<link rel="stylesheet" type="text/css" href="engine1/style.css" />
	<script type="text/javascript" src="engine1/jquery.js"></script>
    
 
    
    
    
<title>Quienes somos</title>
<link rel="shortcut icon" href="../images/Ima.png"/>
<link href="../css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="../css/style.css" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700' rel='stylesheet' type='text/css'>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/jquery.mousewheel.js"></script>
<script type="text/javascript" src="../js/jquery.contentcarousel.js"></script>
<link rel="stylesheet" href="../css/jquery-ui.css" />	






<head>
	<title>WOWSlider generated by WOWSlider.com</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="WOW Slider, Image Slider HTML, HTML Slide Show" />
	<meta name="description" content="WOWSlider created with WOW Slider, a free wizard program that helps you easily generate beautiful web slideshow" />
	
	<link rel="stylesheet" type="text/css" href="engine1/style.css" />
	<script type="text/javascript" src="engine1/jquery.js"></script>
	<link rel="shortcut icon" href="images/favicon.png"/>
</head>








	  
</head>
<body>
	  <div class="header-bottom">
		 <div class="container">
			<div class="header-bottom_left">
				<div class="banner_btn">
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
		<div class="h_menu4">
		   <a class="toggleMenu" href="">Menu</a>
			 <ul class="nav">
               <li><a href="../index.php" title="link para direccionar a la pagina de inicio">Inicio</a></li>
			   <li><a href="trayecto.php" title="link para direccionar a la pagina de quienes somos ">Quienes somos</a></li>
			   
			   <?php
	if($_SESSION['nombreusuario'] != "")
	{		 
	?>
   <li><a href="galeria.php" title="link para direccionar a la pagina de rutinas">Rutinas</a></li>
			   <li><a href="progreso.php" title="link para direccionar a la pagina de Progreso semanal ">Progreso semanal</a></li>    
    <?php
	}
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
    
	<div class="main">
	   <div class="about_banner_img">      
<div id="wowslider-container1">
  <div class="ws_images"><ul>
<li><img src="../images/GYM/6-tips.jpg"  width="648" height="310" alt="imagen de muger haciendo aerobicos" id="wows1_0" class="img-responsive"/></li>
<li><img src="../images/GYM/2x412.jpg"  width="682" height="305" alt="imagen de mujer con una niña en la espalda" class="img-responsive" id="wows1_1" /></li>
<li><img src="../images/GYM/Abd.jpg" width="701" height="308" alt="imagen de mujer haciendo abdominales" id="wows1_2" class="img-responsive"/></li>
<li><img src="../images/GYM/3166_2 (1).jpg"  width="645" height="305" alt="imagen de mujer haciendo abdominales de costado" id="wows1_3" class="img-responsive"/></li>
</ul></div>


<div class="ws_bullets"><div>


</div>
</div>
	</div>
	<script type="text/javascript" src="engine1/wowslider.js"></script>
	<script type="text/javascript" src="engine1/script.js"></script>
    			   <p>&nbsp;</p>
				   <p>&nbsp;</p>            
	   </div>
	   <div class="about_banner_wrap">
         <h1 class="m_11">¿ Quienes somos ?</h1>
      	 </div>
   	  <div class="about-wrapper">
      	    <div class="container">
		       <div class="row about-top">
				 <div class="col-md-5"><img src="../images/GYM/ggg10.jpg" alt="imagen de portada motivacional" class="img-responsive"/>
			     </div>
				 <div class="col-md-7 about-left-text">
				   <h2>
				     <div class="logo">
			<a href="../index.php" title="link para direccionar a la pagina de inicio">EasyGYM.</a>
            <img src="../images/gif/Linea curiosa.gif"/> 
           		   </div></h2>
				   <p>&nbsp;</p>
				   <p>&nbsp;</p>
                   <p>&nbsp;</p>
				   <p>Nosotros somos grupo de personas que
                     están enfocadas en brindarles un servicio
                     con oportunidad de tener un acceso más
				     fácil, rápido y eficaz para realizar
				     ejercicios no solamente para
				     aumentar la resistencia o capacidad
				     muscular de la persona también
				     funciona para relajar, motivar, elevar 
				     la autoestima y hasta mejorar el 
			       estado de ánimo.</p>
				   <h4><span class="m_12">
			       <p class="m_9">Email : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;easygym@easygym.com</p></span></h4>
				 </div>
                 </div>                 
       			 </div>
                 </div>
   	  </div>
	</div>
	<div class="clear"></div>
		  </div>
	     </div>
<p>&nbsp;</p>
</body>
</html>