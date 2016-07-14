<?php

session_start();
include_once ('libreria.php');

conectarBD();

$TipoDocumento=$_POST["TipoDocumento"];

$Documento=$_POST["Documento"];

$verificar = consultar('cliente','Documento='.$Documento);

if($verificar->num_rows >0)
{
	$_SESSION['error'] = "Ya existe un registro con este documento";
		$url_relativa = "../vista/registro.php";
}
else
{
	 
	$Nombre=$_POST["Nombre"];
	$Apellido=$_POST["Apellido"];
	$FechaNacimiento = $_POST["fechaNacimiento"];

	
	
	$edad = $_POST["edad"];
	$genero = $_POST["Genero"];
	
	$Email=$_POST["Email"];
	$Password=$_POST["Password"];
	
	if(isset($_POST["codAdm"]) && $_POST["codAdm"]=="329Admin329")
	{
		$Permisos = "11";
	}
	else
	{
		$Permisos = "10";
	}	
	
	$tabla = consultar('cliente','idCliente >= 0');
	
	$idCliente = $tabla -> num_rows;
	$idCliente = $idCliente + 1;
	
	if($idCliente >= 0)
	{
		$campos = array('idCliente','Nombre','Apellido','Documento','TipoDocumento','FechaNacimiento','Estado','Edad','Genero');
		
		$valores = array($idCliente, $Nombre, $Apellido, $Documento, $TipoDocumento, $FechaNacimiento, 1, $edad,$genero);
		
		$in = insertar('cliente',$valores, $campos);
	}
	
	if($idCliente >= 0)
	{
		$campos = array('idUsuario','email','password','Permiso','documento');
		
		$valores = array($idCliente,$_POST["Email"],$_POST["Password"],$Permisos,$Documento);
			
		insertar('usuario',$valores,$campos);	
	}
	
	if(mysql_errno() != 0){echo mysql_error();}
	
	echo '<center>¡Datos registrados satisfactoriamente! </center>'; 
	$url_relativa = "../vista/login.php";
	
}
header ("Location: http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']). "/" .$url_relativa);
?>
