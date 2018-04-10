<?php

	include ('../controllers/conexion.php');

	header('Content-Type: application/JSON');

	$metodo = $_SERVER['REQUEST_METHOD'];

	switch($metodo)
	{
		case 'GET':

		

			$get = $_GET['canciones'];

			if($get == 1)
			{
				echo json_encode(getCanciones());
			}
			else if($get == 2)
			{
				echo json_encode(getArtistas());
			}
			else if($get == 3)
			{
				echo json_encode(getGeneros());
			}
			else if($get == 4)
			{	
			
				echo json_encode(getCancionesPorArtista($_GET['idArtista']));
			}
			else if($get == 5)
			{
				echo json_encode(getCancionesPorGenero($_GET['idGenero']));
			}


		break;

		case 'POST':

			if($_POST['accion'] == "addArtist")
			{
				echo json_encode(insertarArtista($_POST['name']));
			}
			else if($_POST['accion'] == "addGenre")
			{
				echo json_encode(insertarGenero($_POST['name']));
			}
			else if($_POST['accion'] == "addSong")
			{
				echo json_encode(insertarSong($_POST['name'],$_POST['artist'],$_POST['genre'],$_POST['date']));
			}



		break;

		case 'PUT':

			parse_str(file_get_contents("php://input"),$post_vars);

			echo json_encode(actualizarCancion($post_vars['idCancionActualizar'],$post_vars['nombreCancion'],$post_vars['nombreArtista'],$post_vars['nombreGenero'],$post_vars['fechaComp']));

		break;

		case 'DELETE':


		parse_str(file_get_contents("php://input"),$post_vars);

		echo json_encode(borrarCancion($post_vars['idCancion']));

		break;


	}

	function actualizarCancion($idCancion = "",$nombreCancion = "",$nombreArtista = "",$nombreGenero = "",$fechaComp = "")
	{

		$conexion = conectar();

		if(!pg_last_error($conexion))
		{

			if($idCancion != ""  && $nombreCancion != "" && $nombreArtista != "" && $nombreGenero != "" && $fechaComp)
			{

				pg_prepare($conexion,'seleccionarArtista',"SELECT idartista FROM artista WHERE nombreartista = $1");

				$resultArtista = pg_execute($conexion,'seleccionarArtista',array($nombreArtista));

				if(pg_fetch_row($resultArtista) == 0)
				{
					$idArtista = null;
					
				}
				else
				{  
					$idArtista = pg_fetch_array($resultArtista,0,PGSQL_NUM);

				}

				/////////////////////////////////////////////////////////////////////

				pg_prepare($conexion,'seleccionarGenero',"SELECT idgenero FROM genero WHERE nombregenero = $1");

				$resultGenero = pg_execute($conexion,'seleccionarGenero',array($nombreGenero));

				if(pg_fetch_row($resultGenero) == 0)
				{
					$idGenero = null;

				}
				else
				{  
					$idGenero = pg_fetch_array($resultGenero,0,PGSQL_NUM);

				}

				//////////////////////////////////////////////////////////////////////////

				pg_prepare($conexion,'actualizarCancion',"UPDATE cancion set nombrecancion = $2,idartista = $3, idgenero = $4, fechacomp = $5 WHERE idcancion = $1");

				$result = @pg_execute($conexion,'actualizarCancion',array($idCancion,$nombreCancion,$idArtista[0],$idGenero[0],$fechaComp));

				if($result)
				{
					$response = "Correcto";
				}
				else
				{
					$response = "Error al Insertar";
				}

				pg_close($conexion);




			}

			else
			{
				$response = "Faltan Parametros";
			}
		}


		return $response;

	}

	function borrarCancion($idCancion)
	{	
		$conexion = conectar();

		if(!pg_last_error($conexion))
		{	

			if(is_numeric($idCancion))
			{

				pg_prepare($conexion,'borrarCancion',"DELETE FROM cancion WHERE idcancion = $1");

				$result = @pg_execute($conexion,'borrarCancion',array($idCancion));
			

				if($result)
				{
					$response = "Cancion Eliminada";
				}
				else
				{
					$response = "Error al Insertar";
				}

				pg_close($conexion);

			}

			else
			{
				$response = "Parametros insuficientes";
			}


		}
		else
		{
			$response = "Error base de datos";
		}


		return $response;

	}

	function getCanciones()
	{
		$conexion = conectar();

		if(!pg_last_error($conexion))
		{
			
			$query = "select C.idCancion,C.nombreCancion,A.nombreArtista,G.nombreGenero,C.fechaComp 
					  from cancion as C,artista as A, genero as G 
                      where C.idArtista = A.idArtista and C.idGenero = G.idGenero";

			$p_query = pg_prepare($conexion,'my_query',$query);

			$p_query = pg_execute($conexion,'my_query',array());

			$canciones_aux = array();

			while($canciones = pg_fetch_array($p_query, NULL, PGSQL_ASSOC))
			{	

				array_push($canciones_aux,$canciones);
			}

			return $canciones_aux;

		}

	}

	function getCancionesPorArtista($idFamoso)
	{
		$conexion = conectar();

		if(!pg_last_error($conexion))
		{	
			if($idFamoso == "Todos")
			{
				$query = "select C.idCancion,C.nombreCancion,A.nombreArtista,G.nombreGenero,C.fechaComp 
					  from cancion as C,artista as A, genero as G 
                      where C.idArtista = A.idArtista and C.idGenero = G.idGenero";
			}
			else if(is_numeric($idFamoso))
			{
				$query = "select C.idCancion,C.nombreCancion,A.nombreArtista,G.nombreGenero,C.fechaComp 
					  from cancion as C,artista as A, genero as G 
                      where C.idArtista = A.idArtista and C.idGenero = G.idGenero and C.idArtista=$idFamoso";

			}
			

			$p_query = pg_prepare($conexion,'my_query',$query);

			$p_query = pg_execute($conexion,'my_query',array());

			$canciones_aux = array();

			while($canciones = pg_fetch_array($p_query, NULL, PGSQL_ASSOC))
			{	

				array_push($canciones_aux,$canciones);
			}

			return $canciones_aux;

		}

	}

	function getCancionesPorGenero($idGeneros)
	{
		$conexion = conectar();

		if(!pg_last_error($conexion))
		{	
			if($idGeneros == "Todos")
			{
				$query = "select C.idCancion,C.nombreCancion,A.nombreArtista,G.nombreGenero,C.fechaComp 
					  from cancion as C,artista as A, genero as G 
                      where C.idArtista = A.idArtista and C.idGenero = G.idGenero";
			}
			else if(is_numeric($idGeneros))
			{
				$query = "select C.idCancion,C.nombreCancion,A.nombreArtista,G.nombreGenero,C.fechaComp 
					  from cancion as C,artista as A, genero as G 
                      where C.idArtista = A.idArtista and C.idGenero = G.idGenero and C.idGenero=$idGeneros";

			}
			

			$p_query = pg_prepare($conexion,'my_query',$query);

			$p_query = pg_execute($conexion,'my_query',array());

			$canciones_aux = array();

			while($canciones = pg_fetch_array($p_query, NULL, PGSQL_ASSOC))
			{	

				array_push($canciones_aux,$canciones);
			}

			return $canciones_aux;

		}

	}

	function getArtistas()
	{
		$conexion = conectar();

		if(!pg_last_error($conexion))
		{
			
			$query = "select idartista, nombreArtista from artista";

			$p_query = pg_prepare($conexion,'my_query',$query);

			$p_query = pg_execute($conexion,'my_query',array());

			$artistas_aux = array();

			while($artistas = pg_fetch_array($p_query, NULL, PGSQL_ASSOC))
			{	

				array_push($artistas_aux,$artistas);
			}

			return $artistas_aux;

		}
	}

	function getGeneros()
	{

		$conexion = conectar();

		if(!pg_last_error($conexion))
		{
			
			$query = "select idgenero,nombregenero from genero";

			$p_query = pg_prepare($conexion,'my_query',$query);

			$p_query = pg_execute($conexion,'my_query',array());

			$generos_aux = array();

			while($generos = pg_fetch_array($p_query, NULL, PGSQL_ASSOC))
			{	

				array_push($generos_aux,$generos);
			}

			return $generos_aux;

		}
	}

	function insertarArtista($nombreArtista = "")
	{	
		$conexion = conectar();

		if(!pg_last_error($conexion))
		{	

			if($nombreArtista != "")
			{

				pg_prepare($conexion,'insertarPaps',"INSERT INTO artista (idArtista,nombreArtista) VALUES (nextval('primariaartista'),$1)");

				$result = @pg_execute($conexion,'insertarPaps',array($nombreArtista));
			

				if($result)
				{
					$response = "Correcto";
				}
				else
				{
					$response = "Error al Insertar";
				}

				pg_close($conexion);

			}

			else
			{
				$response = "Parametros insuficientes";
			}


		}
		else
		{
			$response = "Error base de datos";
		}


		return $response;

	}

	function insertarGenero($nombreGenero = "")
	{	
		$conexion = conectar();

		if(!pg_last_error($conexion))
		{	

			if($nombreGenero != "")
			{

				pg_prepare($conexion,'insertarGenero',"INSERT INTO genero (idGenero,nombreGenero) VALUES (nextval('primariagenero'),$1)");

				$result = @pg_execute($conexion,'insertarGenero',array($nombreGenero));
			

				if($result)
				{
					$response = "Correcto";
				}
				else
				{
					$response = "Error al Insertar";
				}

				pg_close($conexion);

			}

			else
			{
				$response = "Parametros insuficientes";
			}


		}
		else
		{
			$response = "Error base de datos";
		}


		return $response;

	}

	

	function insertarSong($nombreCancion = "",$nameArtista = "",$nameGenero ="",$fecha ="")
	{
		$conexion = conectar();

		if(!pg_last_error($conexion))
		{	
			if($nombreCancion != "" && $nameArtista != "" && $nameGenero != "" && $fecha != "")
			{

				pg_prepare($conexion,'seleccionarArtista',"SELECT idartista FROM artista WHERE nombreartista = $1");

				$resultArtista = pg_execute($conexion,'seleccionarArtista',array($nameArtista));

				if(pg_fetch_row($resultArtista) == 0)
				{
					$idArtista = null;
					
				}
				else
				{  
					$idArtista = pg_fetch_array($resultArtista,0,PGSQL_NUM);

				}


				/////////////////////////////////////////

				pg_prepare($conexion,'seleccionarGenero',"SELECT idgenero FROM genero WHERE nombregenero = $1");

				$resultGenero = pg_execute($conexion,'seleccionarGenero',array($nameGenero));

				if(pg_fetch_row($resultGenero) == 0)
				{
					$idGenero = null;

				}
				else
				{  
					$idGenero = pg_fetch_array($resultGenero,0,PGSQL_NUM);

				}

				//////////////////////

				pg_prepare($conexion,'insertarCancion',"INSERT INTO cancion (idCancion,nombreCancion,idArtista,idGenero,fechacomp) VALUES (nextval('primariacancion'),$1,$2,$3,$4)");

				$result = @pg_execute($conexion,'insertarCancion',array($nombreCancion,$idArtista[0],$idGenero[0],$fecha));

				if($result)
				{
					$response = "Correcto";
				}
				else
				{
					$response = "Error al Insertar";
				}

				pg_close($conexion);

			}
			else
			{
				$response = "Faltan parametros";
			}

		}

		return $response;

	}

	

?>