<?php
      

$serverName = "192.168.1.153"; //serverName\instanceName, portNumber (por defecto es 1433)
$connectionInfo = array( "Database"=>"CustomerWebSite", "UID"=>"luis", "PWD"=>"lozano1", "characterset"=>"UTF-8");
$conn = sqlsrv_connect( $serverName, $connectionInfo);


 
  
   //include "Varios_Archivos.php";

   $Pedimento = $_POST['Pedimento'];
   $ClaveRegistro = $_POST['ClaveRegistro'];
   $Booking = $_POST['booking'];
	
	//Como el elemento es un arreglo utilizamos foreach para extraer todos los valores
	foreach($_FILES["archivo"]['tmp_name'] as $key => $tmp_name)
	{

		error_reporting(0);
		//Validamos que el archivo exista
		if($_FILES["archivo"]["name"][$key]) {
			$filename = $_FILES["archivo"]["name"][$key]; //Obtenemos el nombre original del archivo
			$source = $_FILES["archivo"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo
			
			$directorio = 'docs/'; //Declaramos un  variable con la ruta donde guardaremos los archivos
			
			//Validamos si la ruta de destino existe, en caso de no existir la creamos
			if(!file_exists($directorio)){
				mkdir($directorio, 0777) or die("No se puede crear el directorio de extracción");	
			}
			
			$dir=opendir($directorio); //Abrimos el directorio de destino
			$target_path = $directorio.'/'.$filename; //Indicamos la ruta de destino, así como el nombre del archivo
			
			//Movemos y validamos que el archivo se haya cargado correctamente
			//El primer campo es el origen y el segundo el destino
			if(move_uploaded_file($source, $target_path)) {	
				echo "El archivo $filename se ha almacenado en forma exitosa.<br>";
				} else {	
				echo "Ha ocurrido un error, por favor inténtelo de nuevo.<br>";
			}

			
            



            $rest = substr("$filename", 0, -10);
            
            
			  //  mysqli_query($conn, "insert into pedimentos(Pedimento, Documento, M3) 
                //     values ($Pedimento, '$filename', '$rest')");


           
            
            if ($rest=='m3' || $rest=='M3') {


                $datos= "docs/" .$filename;
                $todos_los_datos=file($datos);
                //echo $todos_los_datos;

                error_reporting(0);

                //print_r($todos_los_datos);

               // echo "<br />";
                 //echo "<br />";
                // echo "<br />";
                // echo "<br />";

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

                 // echo "La suma de los 510 es: "  .$suma;




//Sacar valor de 557

$datos557="docs/" .$filename;
$todos_los_datos557=file($datos557);


//print_r($todos_los_datos557);

 //echo "<br />";
 //echo "<br />";
 //echo "<br />";
 //echo "<br />";

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

 //echo "El valor de 557 es:" .$suma557;

  $SumaTotal = $suma557 + $suma;

  // // echo "<br />";
   // echo "<br />";

   //echo "La suma total es:" .$SumaTotal;
   //echo "<br />";
   // echo "<br />";

   // echo "";

  
} else {
   //echo "El archivo no es tipo m3";
   //echo "<br />";
    //echo "<br />";
    //echo "Pedimento:".$Pedimento;
     //echo "<br />";
}
	
			closedir($dir); //Cerramos el directorio de destino
		}

      if($_FILES["archivo"]["size"][$key]) {
      $Peso = $_FILES["archivo"]["size"][$key]; //Obtenemos el nombre original del archivo
      $source = $_FILES["archivo"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo
      //$Peso = $_FILES["archivo"]["name"]["filesize($filename)"][$key];
      //$Peso = size($peso);
      // echo "Peso es:".$Peso;
      }
                               
sqlsrv_query($conn, "insert into Pedimentos(ClavePedimento, Pedimento, Booking, Documento, Peso,  M3) 
                     values ( '$ClaveRegistro', '$Pedimento', '$Booking', '$filename', '$Peso', '$rest')");


	
}

sqlsrv_query($conn, "insert into Pedimentos_m3( ClaveM3, Pedimento, Booking, Documento, Suma510, Suma557, Total,  Peso, M3) 
                     values ( '$ClaveRegistro', '$Pedimento', '$Booking', '$filename', '$suma', '$suma557', '$SumaTotal', '$Peso', '$rest')");



$confirmacion ="Documentos guardados";
  echo '<script>alert("'.$confirmacion.'");</script>';
  print "<script>window.location='tabla_clientes.php';</script>";
  
?>

 

