<?php
$archivo = (isset($_FILES['archivo'])) ? $_FILES['archivo'] : null;
if ($archivo) {
   $ruta_destino_archivo = "archivos/{$archivo['name']}";
   $archivo_ok = move_uploaded_file($archivo['tmp_name'], $ruta_destino_archivo);

   $nombre= $archivo['name'];


}

echo $nombre;

echo "<br />";
echo "<br />";

//$rest = substr("abcdef", 0, -1);  // devuelve "abcde"
$rest = substr("$nombre", 0, -10);
echo $rest;




if ($rest=='m3' || $rest=='M3') {

$datos= "archivos/" .$nombre;
$todos_los_datos=file($datos);
//echo $todos_los_datos;

error_reporting(0);

//print_r($todos_los_datos);

echo "<br />";
echo "<br />";
echo "<br />";
echo "<br />";

$i= 15;
$linea=15;


for ($i=15; $i <=88; $i++) {
    $servidor=rtrim($todos_los_datos[$linea]);
    $numero="1|";
    $lineas=$servidor.$numero;

    $string = $lineas;
    $array = explode("|", $string, 8);

    $validar= $array[0] . PHP_EOL;

    if ($validar==510) {
      $servidor=rtrim($todos_los_datos[$linea]);
        $numero="1|";
        $lineas1=$servidor.$numero;

        $string = $lineas1;
        $array = explode("|", $string, 8);

       $VP= $array[4] . PHP_EOL;
       //echo $VP;
    }else{
           $VP="";
           //echo $VP;


         }
   
  $suma= $suma + $VP;

  
  

   $linea++;
}

echo "La suma de los 510 es: "  .$suma;




//Sacar valor de 557

$datos557="archivos/" .$nombre;
$todos_los_datos557=file($datos557);


//print_r($todos_los_datos557);

echo "<br />";
echo "<br />";
echo "<br />";
echo "<br />";

$i557= 15;
$linea557=15;


for ($i557=15; $i557 <=100; $i557++) {
    $servidor557=rtrim($todos_los_datos557[$linea557]);
    $numero557="1|";
    $lineas557=$servidor557.$numero557;

    $string557 = $lineas557;
    $array557 = explode("|", $string557, 8);

    $validar557= $array557[0] . PHP_EOL;

    if ($validar557==557) {
      $servidor557=rtrim($todos_los_datos557[$linea557]);
        $numero557="1|";
        $lineas1557=$servidor557.$numero557;

        $string557 = $lineas1557;
        $array557 = explode("|", $string557, 8);

       $VP557= $array557[6] . PHP_EOL;
      // echo $VP557;
    }else{
           $VP557="";
           //echo $VP557;


         }  

         $suma557= $suma557 + $VP557;

   $linea557++;
}

echo "El valor de 557 es:" .$suma557;

  $SumaTotal = $suma557 + $suma;

  echo "<br />";
   echo "<br />";

  echo "La suma pro es:" .$SumaTotal;

  
} else {
  echo "El archivo no es tipo m3";
}


?>


