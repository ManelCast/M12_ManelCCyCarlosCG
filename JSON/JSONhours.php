<?php

$linea = 85;
$dia = "laborables";
$direccion = "tornada";
$path = "/home/usuari/M7/M12/linea".$linea.$dia.$direccion.".json";
$json = file_get_contents($path);
echo $json."<br>";
$pattern = '/["][0-9]+:[0-9]+["]/i';
echo preg_match_all($pattern, $json, $matches)."<br>";
$matches = $matches[0];
$replaced = '"';
$replacing = "'";
$matches = str_replace($replaced, $replacing, $matches);
echo "INSERT INTO Horarios VALUES (".$linea.", '".$dia."', '".$direccion."', horas(";
for ($i = 0; $i < count($matches); $i++) {
	if ($i == 999) { //empezando desde este punto, las siguientes horas no se pueden guardar todas en una
		echo "));<hr>SELECT Hora INTO hores FROM Horarios WHERE linea = ".$linea." AND Dia = '".$dia."' AND Direccion = '".$direccion."';<br>UPDATE Horarios SET Hora = hores WHERE linea = ".$linea." AND Dia = '".$dia."' AND Direccion = '".$direccion."'; <br>hores2:=horas(";
	}
	if ($i == 1999) {
		echo ");<hr>hores2:=horas(";
	}
	if ($i == 2999) {
		echo ");<hr>hores2:=horas(";
	}
	echo $matches[$i];
	if ($i != (count($matches)-1) && $i != 998 && $i != 1998 & $i != 2998) {
		echo ", ";
	}
}
echo ")";
if ($i < 999) {
	echo ")";
}
echo ";";

?>