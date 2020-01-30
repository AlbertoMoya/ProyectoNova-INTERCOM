<?php 
       $usuarioAD=$_POST['usuario'];
       $usuariofinal=$usuarioAD;

     session_start();
     $_SESSION['usuario']=$usuariofinal;

     $Pass = $_POST['clave'];
     $Usuario=$_SESSION['usuario'];


// $_SESSION['usuario'];


$serverName = "192.168.1.153"; //serverName\instanceName, portNumber (por defecto es 1433)
$connectionInfo = array( "Database"=>"CustomerWebSite", "UID"=>"luis", "PWD"=>"lozano1", "characterset"=>"UTF-8");
$conn = sqlsrv_connect( $serverName, $connectionInfo);



     $query= "SELECT * FROM LoginPrueba2 WHERE Usuario='$Usuario' ";

			 $resultado = sqlsrv_query($conn, $query);
                   
                    	while($row =sqlsrv_fetch_array($resultado)) {

                    		//$Permiso=$row['Permiso'];
                    		//$_SESSION['Permiso']=$claveaa; 

                   


                    		if ($Pass==$row['Pass'] & $Usuario==$row['Usuario']) { 

                    			$Permiso=$_SESSION['Permiso']= $row['Permiso'];
                                $Agente =$_SESSION['Nombre']= $row['Nombre'];

                             
                    			echo "<script>location.href='../tabla_clientes.php'</script>";
                    		} else{
                    			echo "Usuario incorrecto";
                    			die();
                    		}
                    		
                           
                            

                            }


    





?>