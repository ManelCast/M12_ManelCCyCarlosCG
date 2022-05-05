<meta charset="UTF-8">
<?php

$linea = 85;
$direccion = "vuelta"; //parada = "ida"
$path = "/home/usuari/M7/M12/paradaslinea".$linea.$direccion.".json";
$json = file_get_contents($path);
$json = utf8_decode($json);

//estos 'preg_replace' son para quitar los personajes especiales dentro del json
$pattern = '/\\\u00f2/mi'; //hay que poner el \ 3 veces seguidas...
$json = preg_replace($pattern, 'ò', $json);
$pattern = '/\\\u00ed/mi';
$json = preg_replace($pattern, 'í', $json);
$pattern = '/\\\u00e0/mi';
$json = preg_replace($pattern, 'à', $json);
$pattern = '/\\\u00e8/mi';
$json = preg_replace($pattern, 'è', $json);
$pattern = '/\\\u00b7/mi';
$json = preg_replace($pattern, '·', $json);
$pattern = '/\\\u00e7/mi';
$json = preg_replace($pattern, 'ç', $json);
$pattern = '/\\\u00fc/mi';
$json = preg_replace($pattern, 'ü', $json);
$pattern = '/\\\u00c0/mi';
$json = preg_replace($pattern, 'À', $json);
$pattern = '/\\\u00e9/mi';
$json = preg_replace($pattern, 'é', $json);
$pattern = '/\\\u00f3/mi';
$json = preg_replace($pattern, 'ó', $json);
$pattern = '/\\\u00ef/mi';
$json = preg_replace($pattern, 'ï', $json);



echo $json."<br>";
echo "<br>";
$pattern = '/[ÀA-Z][,\'\-.òóçüìïèéàí·a-zÀA-Z0-9\s]+/mi';
echo preg_match_all($pattern, $json, $matches)."<br>";
$matches = $matches[0];
$matches = str_replace("'", "''", $matches); //PROBLEMA DE SQL: No puedes insertar un string que solo tenga un '. SOLUCIÓN: Hacer ''. Tendrá solo un ' en la inserción en la base de datos.
echo "<hr>";
echo "INSERT INTO Paradas VALUES (".$linea.", "."'".$direccion."', parada(";
for ($i = 0; $i < count($matches); $i++) {
	echo "'".$matches[$i]."'";
	if ($i != (count($matches)-1)) {
		echo ", ";
	}
}
echo "));"


?>