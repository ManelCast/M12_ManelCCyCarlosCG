<html>
<head>
	<meta charset="UTF-8">
<title>Paradas</title>
</head>
<body>
	<p>hola</p>
<?php
ini_set('display_errors', 1);
ini_set('max_execution_time', 600); //tarda mucho esto
error_reporting(E_ALL);

include 'simple_html_dom.php';


for ($i = 90; $i < 100; $i++) { //cambiar aquí las lineas que se quieren buscar (i = 0, i < 10 = entre las lineas 0 y 9 (ambos incluidas). mejor hacerlo de 10 en 10 o si no el internet me petaria..)
	$lineaIda = [];
	$lineaVuelta = [];
	$i2 = 0;
	sleep(3);
	$html_dom = file_get_html('http://emtanemambtu.cat/about/detalldelineas/?linecode='.$i);
	echo "<h1>Linea ".$i."</h1><br>";
	//ida
	echo "<h2>Ida</h2>";
	$table_rows = $html_dom -> find ('div#tablatermometroIDA table tr td');
	foreach ($table_rows as $table_row => $parada) {
		if (strlen($parada) > 38) {
			echo "parada: ".$parada." length: ".strlen($parada)."<br>";
			$lineaIda[$i2] = $parada->innertext;
			$i2++;
		}
	}
	//vuelta
	echo "<h2>Vuelta</h2>";
	$table_rows = $html_dom -> find ('div#tablatermometroVUELTA table tr td');
	foreach ($table_rows as $table_row => $parada) {
		if (strlen($parada) > 38) {
			echo "parada: ".$parada." length: ".strlen($parada)."<br>";
			$lineaVuelta[$i2] = $parada->innertext;
			$i2++;
		}
	}
$encodeIda = [];
$encodeVuelta = [];
$lineaIdaValues = array_values($lineaIda);
$lineaVueltaValues = array_values($lineaVuelta);
$encodeIda = json_encode($lineaIdaValues, JSON_FORCE_OBJECT);
$encodeVuelta = json_encode($lineaVueltaValues, JSON_FORCE_OBJECT);
$nameIda = "paradaslinea".strval($i)."parada.json";
$nameVuelta = "paradaslinea".strval($i)."vuelta.json";
$fileIda = fopen($nameIda, 'w');
$fileVuelta = fopen($nameVuelta, 'w');
chmod($nameIda, 0777);
chmod($nameVuelta, 0777);
fwrite($fileIda, $encodeIda);
fwrite($fileVuelta, $encodeVuelta);
fclose($fileIda);
fclose($fileVuelta);
//seguramente habrán paradas con acentos. para que salga bien, el receptor tiene que hacer un json_decode() y debería de estar bien.
}
?>
<p>adios</p>
</body>
</html>