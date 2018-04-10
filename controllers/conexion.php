<?php

function conectar()
{

  $conn = pg_connect("host=localhost port=5432 dbname=Examen user=postgres password=root");

  if($conn)
  {
  	return $conn;
  }
  else
  {
  	return null;
  }

}











?>