<?php
	session_start();
	error_reporting(0);
	include'controller/script.php';
?>
<!DOCTYPE HTML>
<html>
<head>
<title>EasyGym</title>
<link rel="shortcut icon" href="images/Ima.png"/>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700' rel='stylesheet' type='text/css'>
<style type="text/css">
.kdk1 .kdk1rft {
	color: #FFF;
}
.kdk1 .kdk1 {
	color: #FFF;
}
.kdk1 p {
	color: #FFF;
}
</style>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); }</script>
<script src="js/jquery.min.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
			});
		});
	</script>
<script type="text/javascript" src="js/jquery.mousewheel.js"></script>
<script type="text/javascript" src="js/jquery.contentcarousel.js"></script>
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
</head>
<body>
<div class="h_menu45">
<?php
	if($_SESSION['nombreusuario'] == "")
	{
?>
<ul class="nav1">
            <ul>
              <li>
                <center>
                <a title="menu desplegable ">Inicio</a></center>
                <ul>
                  <li><center><a href="vista/login.php" title="link para direccionar a la pagina de iniciar sesión ">Iniciar sesión</a></center></li>
                  </ul>
              </li>
            </ul>
</ul>  
<?php
	}
	else
	{
?>
<ul class="nav1">
            <ul>
                <li>
                	<center>
                    	<a><?php echo $_SESSION['nombreusuario'];?></a>
                    </center>
                    <ul>
						<li>
                        	<center>
                            	<a href="vista/usuario.php" title="link para direccionar a la pagina de para ver los datos personales ">Ver perfil</a>
                        	</center>
                        </li>
                        <li>
                        	<center>
                        		<a href="controller/salir.php" title="link para Cerrar sesión ">Cerrar sesión</a>
                            </center>
						</li>
                 	</ul>
                    
                </li>
            </ul>
</ul>  
<?php
	}
?>     
</div> 
	<div class="header">
	   <div class="container">
	     <div class="header-text">
			<h1>El mejor gimnasio virtual.</h1>
			<h2>Lo mejor en tiempo y costo.</h2>
			<center>
			  <p>Olvídate del costo en transporte y en maquinaria tan costosa, sin asegurar un buen resultado.</p></center>		  
           </div>
		  <div class="header-arrow">
		     <a></a>
		  </div>
      </div>
	  </div>
	  <div class="header-bottom">
		 <div class="container">
			<div class="header-bottom_left">
            <div class="banner_btn">
            <span><a href=""title="link para contactarnos para el enlace en gmail ">Easygym@easygym.com</a></span>
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
    <div class="menu" id="menu">
	  <div class="container">
		 <div class="logo"><img src="images/DFSF.png" alt="logo_inicio"  title="logo_inicio"width="302" height="146" class="img-responsive">
		 </div>
		 <div class="h_menu4">
         <a class="toggleMenu" href="">Menu</a>		   
			 <ul class="nav">             
			   <li><a href="vista/trayecto.php" title="Enlace para direccionar a la página de quiénes somos ">¿ Quiénes somos ?</a></li>
               <?php
	if($_SESSION['nombreusuario'] != "")
	{		 
?>
               <li><a href="vista/galeria.php" title="Enlace para direccionar a la página de rutinas">Rutinas</a></li>
			   <li><a href="vista/progreso.php" title="Enlace para direccionar a la página de Progreso semanal ">Progreso semanal</a></li>    
    <?php
	}
	if(substr($_SESSION['permisos'], 1, 1) == '1')
	{
    ?>
    <li><a href="vista/reporteAdm.php" title="Enlace para direccionar a la página del administrador">Administrador</a></li>  
    <?php
	}
	?>
			 </ul>
			  <script type="text/javascript" src="js/nav.js"></script>
		  </div>
		 <div class="clear"></div>
	  </div>
	</div>
	 <div class="main">
	 	 <div class="container">
			<div class="row content-top">
				 <div class="col-md-5">
				  <img src="images/double-scan.gif" alt="gif del sistema oseo y muscular " height="442px" class="img-responsive"/> 
			     </div>
				 <div class="col-md-7 content_left_text">
				   <h3 class="FDD">Nuestra trayectoria. </h3>
				   <p><span class="kbk">Diseñar un sistema de información que brinde la facilidad a la comunidad de realizar ejercicios desde cualquier lugar  para mejorar su calidad de vida</span>.</p>
				   <img src="images/gif/73D.gif" width="450" height="257"alt="gif del una mujer haciendo flexiones de pecho"  class="img-responsive">
				 </div>
            </div>
		 </div>
		<div class="container">
		    <div class="row content-middle">
	 	    	<div class="col-md-4"><a>
	 	    		<ul class="spinning">
                    <div class="hover">
	 	    			<li class="live">Esfuerzo <span class="m_1">físico.</span></li>
	 	    			<li class="room">Virtud.</li><p>&nbsp;</p>
                      </div>
	 	    			<div class="clear">	 	    			  
	 	    			</div>	<p>&nbsp;</p>
	 	    		</ul>
					 <div class="view view-fifth">
				  	  <img src="images/1rdjed.jpg" width="550px" height="400px" class="img-responsive" alt="imagen con mensaje motivacional del cuerpo antes y despues " />
                </div>
			     </a></div>
			  <div class="col-md-4"><a>
	 	    		<ul class="spinning">
	 	    			<li class="live">Esfuerzo      <span class="m_1">mental.</span></li>
	 	    			<li class="room">Gratitud      </li><p>&nbsp;</p>
	 	    			<div class="clear">
                        </div>	<p>&nbsp;</p>
	 	    		</ul>
					  <div class="view view-fifth">
				  	    <img src="images/20131109-200630.jpg" width="550px" height="600px" class="img-responsive"  alt="imagen con mensaje motivacional para las pesonas discapacitadas  "/>
              </div><p>&nbsp;</p>
			     </a></div>
				 <div class="col-md-4"><a>
	 	    		<ul class="spinning">
	 	    			<li class="live">Descanso y <span class="m_1">Pilates.</span></li>
	 	    			<li class="room">satisfacción.</li><p>&nbsp;</p>
	 	    			<div class="clear">
                        </div>	<p>&nbsp;</p>
	 	    		</ul>
					 <div class="view view-fifth">
				  	    <img src="images/imagenes-de-gym-motivacion-5.jpg" width="550px" height="400px" class="img-responsive" alt="imagen con mensaje motivacional para perseverar "/>
                 </div> </a>
			     </div>
	      </div>
		</div>  
       
         <center>
         <table width="100%" border="1">
  <tr>
    <td width="100%" height="20%" align="center" background="images/dep.jpg"  class="kdk1">
              <p  class="kdk1">Servicio Nacional de Aprendizaje SENA.
              Analisis y desarrollo de sistema de información.
              Todos los derechos reservados © 2016 ::.              
              <p>Diseñado por: Jefferson Rojas Ochoa ,Miguel Angel Muñoz Hernandez.</p>
      </td>
  </tr>
</table>  </center>

              
        	  
</body>

</html>