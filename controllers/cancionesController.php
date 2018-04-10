<?php
	
	if(isset($_POST['accion']))
	{	

		if($_POST['accion'] == 'addArtist'|| $_POST['accion'] == 'addGenre' )
		{
			$accion = $_POST['accion'];

			$nombre = $_POST['nombre'];

			$data = array('name'=>$nombre,'accion'=>$accion);

		}
		else if($_POST['accion'] == 'addSong')
		{	

			$accion = $_POST['accion'];

			$nombre = $_POST['nombre'];

			$artista = $_POST['artista'];

			$genero = $_POST['genero'];

			$fecha = $_POST['fecha'];

			$data = array('name'=>$nombre,'accion'=>$accion,'artist'=>$artista,'genre'=>$genero,'date'=>$fecha);

		}


		$url = "http://localhost/Canciones/api/canciones.php";

		$ch = curl_init($url);

		curl_setopt($ch,CURLOPT_URL,$url);

		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

		curl_setopt($ch,CURLOPT_POST,false);

		curl_setopt($ch,CURLOPT_POSTFIELDS,$data);

		$resp = curl_exec($ch);

		$datos = json_decode($resp);

		echo $datos; // Me Regresa La respuesta de la API

		curl_close($ch);


	}

	// TRAE LAS CANCIONES POR ARTISTA
	if(isset($_POST['idArtist']))
	{
		$variable = 4;

		$idArtist = $_POST['idArtist'];

	    $respuesta = file_get_contents("http://localhost/Canciones/api/canciones.php?canciones=".$variable."&idArtista=".$idArtist);

	    $datos = json_decode($respuesta);

	    $canciones = $datos;

	    echo json_encode($canciones);

	   
	}

	// TRAE LAS CANCIONES POR GENERO
	if(isset($_POST['idGenero']))
	{
		$variable = 5;

		$idGenero = $_POST['idGenero'];

		$respuesta = file_get_contents("http://localhost/Canciones/api/canciones.php?canciones=".$variable."&idGenero=".$idGenero);


	    $datos = json_decode($respuesta);

	    $canciones = $datos;

	    echo json_encode($canciones);

	}


	//BORRA UNA CANCION
	if(isset($_POST['idCancion']))
	{

		$url = "http://localhost/Canciones/api/canciones.php";

		$data = array('idCancion'=>$_POST['idCancion']);

		$ch = curl_init($url);

		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		curl_setopt($ch,CURLOPT_CUSTOMREQUEST,"DELETE");
		curl_setopt($ch,CURLOPT_POSTFIELDS,http_build_query($data));

		$response = curl_exec($ch);

		if($response === false)
		{
		  $info = curl_getinfo($ch);

		  curl_close($ch);

		  die('Ocurrio un error al ejecutar. info:'.var_export($info));
		}

		curl_close($ch);

		$decoded = json_decode($response);

		echo $decoded;

	}

	//ACTUALIZA UNA CANCION

	if(isset($_POST['idCancionActualizar']))
	{
		$url = "http://localhost/Canciones/api/canciones.php";

		$data = array('idCancionActualizar'=>$_POST['idCancionActualizar'],'nombreCancion'=>$_POST['nombreCancion'],'nombreArtista'=>$_POST['nombreArtista'],
			'nombreGenero'=>$_POST['nombreGenero'],'fechaComp'=>$_POST['fechaComp']);


		$ch = curl_init($url);

		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		curl_setopt($ch,CURLOPT_CUSTOMREQUEST,"PUT");
		curl_setopt($ch,CURLOPT_POSTFIELDS,http_build_query($data));

		$response = curl_exec($ch);

		if($response === false)
		{
		  $info = curl_getinfo($ch);

		  curl_close($ch);

		  die('Ocurrio un error al ejecutar. info:'.var_export($info));
		}

		curl_close($ch);

		$decoded = json_decode($response);

		echo $decoded;

	}




		

?>