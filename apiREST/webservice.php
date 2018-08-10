<?php

	//Verificamos que la peticion nos llegue con el formato: 2,3,4,5,6
	function verificarArreglo($arreglo)
	{
		return (preg_match("/^[0-9]+(,[0-9]+)*$/",$arreglo))? true: false;
	}

	//Verificamos el arreglo.
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		//Si existe la variable.
		if(isset($_POST['arreglo']))
		{
			//Si cumple el formato de la peticion.
			if(verificarArreglo($_POST['arreglo']))
			{
				$arreglo = explode(",",$_POST['arreglo']);
			
				//Enviamos respuesta.
				$respuesta['minimo'] = min($arreglo);
				$respuesta['maximo'] = max($arreglo);
				$respuesta['respuesta'] = "Exito";
			}
			else
			{
				//Enviamos respuesta.
				$respuesta['minimo'] = null;
				$respuesta['maximo'] = null;
				$respuesta['respuesta'] = "Formato no permitido";
			}
		}
		else
		{
			//Enviamos respuesta.
			$respuesta['minimo'] = null;
			$respuesta['maximo'] = null;
			$respuesta['respuesta'] = "Arreglo indefinido";
		}
		
	}
	else if($_SERVER['REQUEST_METHOD'] == 'GET')
	{
		if(isset($_GET['arreglo']))
		{
			if(verificarArreglo($arreglo))
			{
				$arreglo = explode(",",$_GET['arreglo']);

				//Enviamos respuesta.
				$respuesta['minimo'] = min($arreglo);
				$respuesta['maximo'] = max($arreglo);
				$respuesta['respuesta'] = "Exito";
			}
			else
			{
				//Enviamos respuesta.
				$respuesta['minimo'] = null;
				$respuesta['maximo'] = null;
				$respuesta['respuesta'] = "Formato no permitido";
			}
		}
		else
		{
			//Enviamos respuesta.
			$respuesta['minimo'] = null;
			$respuesta['maximo'] = null;
			$respuesta['respuesta'] = "Arreglo indefinido";
		}
	}
	else
	{
		$respuesta['error'] = 'Metodo no permitido';
	}

	echo json_encode($respuesta);
?>