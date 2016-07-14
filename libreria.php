<?php

    function conectarBD()
    {
		//////////////////////Conexxion local/////////////////////////////////
		/*
		$db = new mysqli('localhost', 'root', '', 'easygym');
		$acentos = $db -> query("SET NAMES 'utf8'");
		if($db->connect_errno > 0){
			die('Unable to connect to database [' . $db->connect_error . ']');
		}
		*/
		//////////////////////Fin Conexxion local/////////////////////////////////
		
		/////////////////////////////Conexion web/////////////////////////////////////
		$db = new mysqli('mysql.hostinger.es', 'u745342775_gym', 'easygym2016', 'u745342775_easy');
		$acentos = $db -> query("SET NAMES 'utf8'");
		if($db->connect_error > 0){
			die('Unable to connect to database [' . $db->connect_error . ']');
		}
		///////////////////////////Fin Conexion web///////////////////////////////////////
		
		
		return $db;    
    }

   function seleccion($tabla,$array_campos,$condicion)
     {
		 $campos=implode(',',$array_campos);
		 $sql="select $campos FROM $tabla WHERE $condicion";
		 
		 $db = conectarBD();
		 
		if(!$result = $db->query($sql)){
		  die('Hay un error corriendo en la consulta!!! [' . $db->error . ']');
		}
		return $result;
    }

  function insertar ($tabla,$array_valores,$array_campos)
     { 
		 $valores = implode("','",$array_valores);
		 $campos = implode(',',$array_campos);
		 $sql = "INSERT INTO $tabla ($campos) VALUES ('$valores')";
		 $db = conectarBD();
		 
		if(!$result = $db->query($sql)){
		  die('Hay un error corriendo en la consulta!!! [' . $db->error . ']');
		}
		return $result; 
     }
	 	 
	function consultar($tabla, $condicion)
	{
		$sql="select * FROM $tabla WHERE $condicion";
		$db = conectarBD();
		
		if(!$result = $db->query($sql)){
		  die('Hay un error corriendo en la consulta!!! [' . $db->error . ']<br> y la condicion es '.$condicion.' y la tabla: '.$tabla.'');
		}
		
		return $result;
	}
?>