<?php

$conexion = new mysqli("localhost","root","","ventasvxt");

if(!$conexion){
  echo "no se pudo conectar a la base de datos";
}
