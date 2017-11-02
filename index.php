<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es"> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /> 
<title>Prueba de SELECT y MySQL</title> 
</head> 
<body> 
<?php 
  // Se conecta al SGBD 
  if(!($iden = mysql_connect("localhost", "root", "1234"))) 
    die("Error: No se pudo conectar");
	
  // Selecciona la base de datos 
  if(!mysql_select_db("basetrabajo", $iden)) 
    die("Error: No existe la base de datos");
	
  // Sentencia SQL: muestra todo el contenido de la tabla "books" 
  $sentencia = "SELECT * FROM usuarios"; 
  // Ejecuta la sentencia SQL 
  $resultado = mysql_query($sentencia, $iden); 
  if(!$resultado) 
    die("Error: no se pudo realizar la consulta");
	
  echo '<table>'; 
  while($fila = mysql_fetch_assoc($resultado)) 
  { 
    echo '<tr>'; 
    echo '<td>' . $fila['id'] . '</td><td>' . $fila['cedula'] . '</td><td>' . $fila['nombre'] . '</td><td>' . $fila['password'] .'</td>'; 
    echo '</tr>'; 
  } 
  echo '</table>';
  
  // Libera la memoria del resultado
  mysql_free_result($resultado);
  
  // Cierra la conexión con la base de datos 
  mysql_close($iden); 
?> 
</body> 
</html> 
