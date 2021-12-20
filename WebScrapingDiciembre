<?php
ini_set('display_errors', 1);
ini_set('max_execution_time', 600); //tarda mucho esto
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Bus</title>
</head>
<body>
<p>If you can see this...</p><br>
<?php

include 'simple_html_dom.php';

$linea = [];

//Del 0 al 9
for ($i2 = 0; $i2 < 10; $i2++) {
	sleep(3); //Descansillo que si no se muere el pobre servidor
	$html_dom = file_get_html('http://emtanemambtu.cat/about/detalldelineas/?linecode=0'.$i2);
	echo "<h1>Linea ".$i2."</h1><br>";
	echo "<h1>Dias laborables</h1>";
	echo "<h2>Anada</h2>";
	//Aquí pillamos anada
	$table_rows = $html_dom -> find ('div#divlaborables div#IDA_0_tramo0 .trhora td');
	$i3 = 0;
	if (is_null($table_rows)) {
		echo "NULL!<br>"; //no funciona
	}
	else {
		for ($i = 1; $i <= 100; $i++)  { //36
			foreach($table_rows as $table_row => $hora)  {
				if (is_null($table_row)) {
					echo "NULL!<br>"; //no funciona
				}
				else {
					if (!strpos($hora, ".") && strlen($hora) >= 10) {
						$linea[$i2]["laborables"]["anada"][$i3] = $hora->innertext;
						echo $linea[$i2]["laborables"]["anada"][$i3]."<br>";
						$i3++;
					}
				}
			}
			$table_rows = $html_dom -> find ('div#divlaborables div#IDA_0_tramo'.$i.' .trhora td');
		}
	}
	echo "<h2>Tornada</h2>";
	//Aquí pillamos tornada
	$table_rows = $html_dom -> find ('div#divlaborables div#VUELTA_0_tramo0 .trhora td');
	$i3 = 0;
	for ($i = 1; $i <= 100; $i++)  { //33
		foreach($table_rows as $table_row => $hora)  {
			if (!strpos($hora, ".") && strlen($hora) >= 10) {
				$linea[$i2]["laborables"]["tornada"][$i3] = $hora->innertext;
				echo $linea[$i2]["laborables"]["tornada"][$i3]."<br>"; //No pilla la hora cuando no hay hora (en la página de la EMT ponen ".....")
				$i3++;
			}
		}
		$table_rows = $html_dom -> find ('div#divlaborables div#VUELTA_0_tramo'.$i.' .trhora td');
	}
	echo "<h1>Dissabtes</h1>";
	echo "<h2>Anada</h2>";

$table_rows = $html_dom -> find ('div#divsabados div#IDA_1_tramo0 .trhora td');
$i3 = 0;
for ($i = 1; $i <= 100; $i++)  { //32
	foreach($table_rows as $table_row => $hora)  {
		if (!strpos($hora, ".") && strlen($hora) >= 10) {
			$linea[$i2]["dissabtes"]["anada"][$i3] = $hora->innertext;
			echo $linea[$i2]["dissabtes"]["anada"][$i3]."<br>"; //No pilla la hora cuando no hay hora (en la página de la EMT ponen ".....")
			$i3++;
		}
	}
		$table_rows = $html_dom -> find ('div#divsabados div#IDA_1_tramo'.$i.' .trhora td');
}
echo "<h2>Tornada</h2>";

$table_rows = $html_dom -> find ('div#divsabados div#VUELTA_1_tramo0 .trhora td');
$i3 = 0;
for ($i = 1; $i <= 100; $i++)  { //32
	foreach($table_rows as $table_row => $hora)  {
		if (!strpos($hora, ".") && strlen($hora) >= 10) {
			$linea[$i2]["dissabtes"]["tornada"][$i3] = $hora->innertext;
			echo $linea[$i2]["dissabtes"]["tornada"][$i3]."<br>"; //No pilla la hora cuando no hay hora (en la página de la EMT ponen ".....")
			$i3++;
		}
	};
		$table_rows = $html_dom -> find ('div#divsabados div#VUELTA_1_tramo'.$i.' .trhora td');
}
echo "<h1>Diumenges i festius</h1><br>";

echo "<h2>Anada</h2>";

$table_rows = $html_dom -> find ('div#divdomingosyfestivos div#IDA_2_tramo0 .trhora td');
$i3 = 0;
for ($i = 1; $i <= 100; $i++)  { //35
	foreach($table_rows as $table_row => $hora)  {
		if (!strpos($hora, ".") && strlen($hora) >= 10) {
			$linea[$i2]["festius"]["anada"][$i3] = $hora->innertext;
			echo $linea[$i2]["festius"]["anada"][$i3]."<br>"; //No pilla la hora cuando no hay hora (en la página de la EMT ponen ".....")
			$i3++;
		}
	}
		$table_rows = $html_dom -> find ('div#divdomingosyfestivos div#IDA_2_tramo'.$i.' .trhora td');
}
echo "<h2>Tornada</h2>";

$table_rows = $html_dom -> find ('div#divdomingosyfestivos div#VUELTA_2_tramo0 .trhora td');
$i3 = 0;
for ($i = 1; $i <= 100; $i++)  { //35
	foreach($table_rows as $table_row => $hora)  {
		if (!strpos($hora, ".") && strlen($hora) >= 10) {
			$linea[$i2]["festius"]["tornada"][$i3] = $hora->innertext;
			echo $linea[$i2]["festius"]["tornada"][$i3]."<br>"; //No pilla la hora cuando no hay hora (en la página de la EMT ponen ".....")
			$i3++;
		}
	};
		$table_rows = $html_dom -> find ('div#divdomingosyfestivos div#VUELTA_2_tramo'.$i.' .trhora td');
}


}
//Del 10 al 100
for ($i2 = 10; $i2 < 100; $i2++) {
	sleep(3); //Descansillo que si no se muere el pobre servidor
	$html_dom = file_get_html('http://emtanemambtu.cat/about/detalldelineas/?linecode='.$i2);
	echo "<h1>Linea ".$i2."</h1><br>";
	echo "<h2>Anada</h2>";
	//Aquí pillamos anada
	$table_rows = $html_dom -> find ('div#divlaborables div#IDA_0_tramo0 .trhora td');
	$i3 = 0;
	for ($i = 1; $i <= 100; $i++)  { //36
		foreach($table_rows as $table_row => $hora)  {
			if (!strpos($hora, ".") && strlen($hora) >= 10) {
				$linea[$i2]["laborables"]["anada"][$i3] = $hora->innertext;
				echo $linea[$i2]["laborables"]["anada"][$i3]."<br>";
				$i3++;
			}
		}
		$table_rows = $html_dom -> find ('div#divlaborables div#IDA_0_tramo'.$i.' .trhora td');
	}
	echo "<h2>Tornada</h2>";
	//Aquí pillamos tornada
	$table_rows = $html_dom -> find ('div#divlaborables div#VUELTA_0_tramo0 .trhora td');
	$i3 = 0;
	for ($i = 1; $i <= 100; $i++)  { //33
		foreach($table_rows as $table_row => $hora)  {
			if (!strpos($hora, ".") && strlen($hora) >= 10) {
				$linea[$i2]["laborables"]["tornada"][$i3] = $hora->innertext;
				echo $linea[$i2]["laborables"]["tornada"][$i3]."<br>"; //No pilla la hora cuando no hay hora (en la página de la EMT ponen ".....")
				$i3++;
			}
		}
		$table_rows = $html_dom -> find ('div#divlaborables div#VUELTA_0_tramo'.$i.' .trhora td');
	}
		echo "<h1>Dissabtes</h1>";
		echo "<h2>Anada</h2>";

	$table_rows = $html_dom -> find ('div#divsabados div#IDA_1_tramo0 .trhora td');
	$i3 = 0;
	for ($i = 1; $i <= 100; $i++)  { //32
		foreach($table_rows as $table_row => $hora)  {
			if (!strpos($hora, ".") && strlen($hora) >= 10) {
				$linea[$i2]["dissabtes"]["anada"][$i3] = $hora->innertext;
				echo $linea[$i2]["dissabtes"]["anada"][$i3]."<br>"; //No pilla la hora cuando no hay hora (en la página de la EMT ponen ".....")
				$i3++;
			}
		}
			$table_rows = $html_dom -> find ('div#divsabados div#IDA_1_tramo'.$i.' .trhora td');
	}
	echo "<h2>Tornada</h2>";

	$table_rows = $html_dom -> find ('div#divsabados div#VUELTA_1_tramo0 .trhora td');
	$i3 = 0;
	for ($i = 1; $i <= 100; $i++)  { //32
		foreach($table_rows as $table_row => $hora)  {
			if (!strpos($hora, ".") && strlen($hora) >= 10) {
				$linea[$i2]["dissabtes"]["tornada"][$i3] = $hora->innertext;
				echo $linea[$i2]["dissabtes"]["tornada"][$i3]."<br>"; //No pilla la hora cuando no hay hora (en la página de la EMT ponen ".....")
				$i3++;
			}
		};
		$table_rows = $html_dom -> find ('div#divsabados div#VUELTA_1_tramo'.$i.' .trhora td');
	}
	echo "<h1>Diumenges i festius</h1><br>";

echo "<h2>Anada</h2>";

$table_rows = $html_dom -> find ('div#divdomingosyfestivos div#IDA_2_tramo0 .trhora td');
$i3 = 0;
for ($i = 1; $i <= 100; $i++)  { //35
	foreach($table_rows as $table_row => $hora)  {
		if (!strpos($hora, ".") && strlen($hora) >= 10) {
			$linea[$i2]["festius"]["anada"][$i3] = $hora->innertext;
			echo $linea[$i2]["festius"]["anada"][$i3]."<br>"; //No pilla la hora cuando no hay hora (en la página de la EMT ponen ".....")
			$i3++;
		}
	}
		$table_rows = $html_dom -> find ('div#divdomingosyfestivos div#IDA_2_tramo'.$i.' .trhora td');
}
echo "<h2>Tornada</h2>";

$table_rows = $html_dom -> find ('div#divdomingosyfestivos div#VUELTA_2_tramo0 .trhora td');
$i3 = 0;
for ($i = 1; $i <= 100; $i++)  { //35
	foreach($table_rows as $table_row => $hora)  {
		if (!strpos($hora, ".") && strlen($hora) >= 10) {
			$linea[$i2]["festius"]["tornada"][$i3] = $hora->innertext;
			echo $linea[$i2]["festius"]["tornada"][$i3]."<br>"; //No pilla la hora cuando no hay hora (en la página de la EMT ponen ".....")
			$i3++;
		}
	};
		$table_rows = $html_dom -> find ('div#divdomingosyfestivos div#VUELTA_2_tramo'.$i.' .trhora td');
}
}
$encode = [];
/*for ($i = 0; $i < count($linea); $i++) { //To do: No hacer que encode incluya las posiciones null 
	for ($i2 = 0; $i2 < count($linea[$i]["laborables"]["anada"]); $i2++) {
		$encode[$i]["laborables"]["anada"][$i2] = json_encode(utf8_encode($linea[$i]["laborables"]["anada"][$i2]));
	}
}*/
echo "count 1: ".count($linea["3"]["laborables"])."<br>";
echo "count 2: ".count($linea[3])."<br>";
echo "count 3: ".count($linea)."<br>";
for ($i = 0; $i < 100; $i++) {
	if ($linea[$i]["laborables"]["tornada"][0] == null && 
		$linea[$i]["laborables"]["anada"][0] == null && 
		$linea[$i]["dissabtes"]["tornada"][0] == null &&
		$linea[$i]["dissabtes"]["anada"][0] == null &&
		$linea[$i]["festius"]["tornada"][0] == null &&
		$linea[$i]["festius"]["anada"][0] == null) { //Si no hay una hora, que lo skipee
		continue;
	}
	else {
		$test1a = array_values($linea[$i]["laborables"]["tornada"]);
		$test2a = array_values($linea[$i]["laborables"]["anada"]);
		$test3a = array_values($linea[$i]["dissabtes"]["tornada"]);
		$test4a = array_values($linea[$i]["dissabtes"]["anada"]);
		$test5a = array_values($linea[$i]["festius"]["tornada"]);
		$test6a = array_values($linea[$i]["festius"]["anada"]);
		for ($i2 = 1; $i2 <= 6; $i2++) {
			//$encode = json_encode("$"."test".strval($i2)."a", JSON_FORCE_OBJECT); //"$test1a" pero se guarda como un string, asi que no pilla el nombre de la variable si no un string con "$test1a" escrito
			$encode = json_encode(${"test".strval($i2)."a"}, JSON_FORCE_OBJECT); //no se si esto va bien aún o no
			$name = "linea".strval($i)."archivo".strval($i2).".json";
			$file = fopen($name, 'w');
			chmod($name, 0777);
			fwrite($file, $encode);
			fclose($file);
		}
	}
}
/*$test1a = array_values($linea[3]["laborables"]["tornada"]);
$test2a = array_values($linea[3]["laborables"]["anada"]);
$test3a = array_values($linea[3]["dissabtes"]["tornada"]);
$test4a = array_values($linea[3]["dissabtes"]["anada"]);
$test5a = array_values($linea[3]["festius"]["tornada"]);
$test6a = array_values($linea[3]["festius"]["anada"]);
for ($i = 1; $i <= 6; $i++) {
	//$encode = json_encode("$"."test".strval($i)."a", JSON_FORCE_OBJECT); //"$test1a" pero se guarda como un string, asi que no pilla el nombre de la variable si no un string con "$test1a" escrito
	$encode = json_encode(${"test".strval($i)."a"}, JSON_FORCE_OBJECT); //no se si esto va bien aún o no
	$name = "archivo".strval($i).".json";
	$file = fopen($name, 'w');
	chmod($name, 0777);
	fwrite($file, $encode);
	fclose($file);
}*/
/*file_put_contents('file2.json', $encode[0]["laborables"]["tornada"]);*/
?>
<p>it means it hasn't crashed!</p>
</body>
</html>
