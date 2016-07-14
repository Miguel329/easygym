<?php

session_start();  //Iniciamos la sesion
include_once 'libreria.php';
$db = conectarBD();//Conectamos a la base de datos 

if(isset ($_POST["login"]))
{
	$logueo = $_POST["login"];
}
else
{
	$logueo = "";
};


if (isset($_SESSION['error_login'])) 
{		
}
else
{
	$_SESSION['error_login']="";
	
	$_SESSION['error_login']="Digite Usuario y Clave";
	$url_relativa="../vista/login.php";
	header("Location: http://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . "/" . $url_relativa);
}

if ($logueo == "Entrar") //El valor “si” se envía a la misma página mediante un valor hidden de un formulario HTML
{

$usuario=$_POST['documento']; //Recogemos usuario y contraseña
$cuenta=$_POST['password'];

if (($usuario=="") || ($cuenta=="")) //Error campos en blanco
{

$_SESSION['error_login']="¡Datos en blanco!";

$url_relativa = "../vista/login.php"; //La dirección de login para el header
header ("Location: http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']). "/" .$url_relativa);

}
else
{
//Si no es en blanco comprobamos de nuestra base de datos
$sql = consultar("usuario",'documento='.$usuario);
$row = $sql -> fetch_assoc();

if($row > 0)
{
if($row['password'] == $cuenta)
{
$sql = consultar('cliente','documento='.$usuario);
$row2 = $sql -> fetch_assoc();
$_SESSION['nombreusuario'] = $row2['Nombre']." ".$row2['Apellido'];
$_SESSION['id_usuario'] = $row['idUsuario'];
$_SESSION['permisos'] = $row['Permiso'];
$_SESSION['documento'] = $row['documento'];
$_SESSION['genero'] = $row2['Genero'];
$url_relativa = "../index.php"; //Si todo es valido dejo entrar
header("Location: http://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . "/" .$url_relativa);
}else{
$_SESSION['error_login']="¡Contraseña incorrecta!"; //Si falla la contraseña, error
$url_relativa="../vista/login.php";
header("Location: http://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . "/" .$url_relativa);
}

}
else
{
$_SESSION['error_login']="¡Usuario incorrecto!"; //Si falla el usuario, error
$url_relativa="../vista/login.php";
header("Location: http://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . "/" . $url_relativa);

}
}
}else{

session_destroy(); // Y si falla todo borro la sesión
}

?>