<?php
ini_set('display_errors', 1);
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
	sleep(2); //Descansillo que si no se muere el pobre servidor
	$html_dom = file_get_html('http://emtanemambtu.cat/about/detalldelineas/?linecode=0'.$i2);
	echo "<h1>Linea ".$i2."</h1><br>";
	echo "<h1>Dias laborables</h1>";
	echo "<h2>Anada</h2>";
	//Aquí pillamos anada
	$table_rows = $html_dom -> find ('div#divlaborables div#IDA_0_tramo0 .trhora td');
	$i3 = 0;
	for ($i = 1; $i <= 100; $i++)  { //36
		foreach($table_rows as $table_row => $hora)  {
			if (!strpos($hora, ".") && strlen($hora) >= 10) {
				$linea[$i2]["laborables"]["anada"][$i3] = $hora;
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
				$linea[$i2]["laborables"]["tornada"][$i3] = $hora;
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
			$linea[$i2]["dissabtes"]["anada"][$i3] = $hora;
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
			$linea[$i2]["dissabtes"]["tornada"][$i3] = $hora;
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
			$linea[$i2]["festius"]["anada"][$i3] = $hora;
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
			$linea[$i2]["festius"]["tornada"][$i3] = $hora;
			echo $linea[$i2]["festius"]["tornada"][$i3]."<br>"; //No pilla la hora cuando no hay hora (en la página de la EMT ponen ".....")
			$i3++;
		}
	};
		$table_rows = $html_dom -> find ('div#divdomingosyfestivos div#VUELTA_2_tramo'.$i.' .trhora td');
}


}
//Del 10 al 100
for ($i2 = 10; $i2 < 100; $i2++) {
	sleep(2); //Descansillo que si no se muere el pobre servidor
	$html_dom = file_get_html('http://emtanemambtu.cat/about/detalldelineas/?linecode='.$i2);
	echo "<h1>Linea ".$i2."</h1><br>";
	echo "<h2>Anada</h2>";
	//Aquí pillamos anada
	$table_rows = $html_dom -> find ('div#divlaborables div#IDA_0_tramo0 .trhora td');
	$i3 = 0;
	for ($i = 1; $i <= 100; $i++)  { //36
		foreach($table_rows as $table_row => $hora)  {
			if (!strpos($hora, ".") && strlen($hora) >= 10) {
				$linea[$i2]["laborables"]["anada"][$i3] = $hora;
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
				$linea[$i2]["laborables"]["tornada"][$i3] = $hora;
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
				$linea[$i2]["dissabtes"]["anada"][$i3] = $hora;
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
				$linea[$i2]["dissabtes"]["tornada"][$i3] = $hora;
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
			$linea[$i2]["festius"]["anada"][$i3] = $hora;
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
			$linea[$i2]["festius"]["tornada"][$i3] = $hora;
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
/*for ($i2 = 0; $i2 < count($linea); $i2++) {
}*/
//TRABAJANDO EN ESTO
for ($i = 0; $i < count($linea[3]["laborables"]["anada"]); $i++) {
	$encode[0]["laborables"]["anada"][$i] = json_encode(utf8_encode($linea[3]["laborables"]["anada"][$i]));
}
for ($i = 0; $i < count($linea[3]["laborables"]["tornada"]); $i++) {
	$encode[0]["laborables"]["tornada"][$i] = json_encode(utf8_encode($linea[3]["laborables"]["tornada"][$i]));
}
file_put_contents(chmod('prueba.json', 777), $encode[0]["laborables"]["anada"]);
file_put_contents(chmod('prueba2.json', 777), $encode[0]["laborables"]["tornada"]);
?>
<p>it means it hasn't crashed!</p>
</body>
</html>