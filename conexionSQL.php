<?php
$serverName = "192.168.1.153"; //serverName\instanceName, portNumber (por defecto es 1433)
$connectionInfo = array( "Database"=>"CustomerWebSite", "UID"=>"luis", "PWD"=>"lozano1", "characterset"=>"UTF-8");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ) {
     echo "Conexión establecida.<br />";
}else{
     echo "Conexión no se pudo establecer.<br />";
     die( print_r( sqlsrv_errors(), true));
}
?>