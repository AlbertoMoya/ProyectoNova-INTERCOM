<?php

$serverName = "192.168.1.118"; //serverName\instanceName, portNumber (por defecto es 1433)
$connectionInfo = array( "Database"=>"InteNovaPrueba", "UID"=>"luis", "PWD"=>"", "characterset"=>"UTF-8");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Tabla de Pedimentos</title>
	 <link rel="stylesheet" href="css datatable/bootstrap.min.css">

	 <script src="js datatable/jquery-1.12.4.js"></script>
        
        <link rel="stylesheet" type="text/css" href="dashboard/vendor/font-awesome/css/font-awesome.min.css">


	 <script>
        $(document).ready(function() {
                $('#example').DataTable({});
            });

        </script>

	 <link rel="stylesheet" href="css datatable/jquery.dataTables.min.css">
        <link rel="stylesheet" href="css datatable/dataTables.bootstrap.min.css">
        <link rel="stylesheet" href="css datatable/responsive.bootstrap.min.css">
        <script src="js datatable/bootstrap.min.js"></script>
        <script src="js datatable/jquery.dataTables.min.js"></script>
</head>
<body onload="myFunction()" style="margin:0;">

	<center>
       
        <div class="logo"><img alt="intercomls" style="width: 140px; height: 80px; text-align: center;" src="Logo/GLOC.png" class="align-right"/></div></center>

	 <div class="container">
        <div class="dropdown">
            
            
        </div>
        <br>

	<table id="example" class="display nowrap" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nombre</th>
				<th>Booking</th>
				<th>Pedimento</th>
               
				

			</tr>
		</thead>

		<tbody>
			<?php
			$name=$_GET['id_name'];

			 $query= "SELECT * FROM FIN007 
             INNER JOIN CAT_SAT_REGISTROPEDIMENTOS ON FIN007.CLAVE=CAT_SAT_REGISTROPEDIMENTOS.Exportador 
             INNER JOIN CAT_SAT_REGISTROS ON CAT_SAT_REGISTROPEDIMENTOS.ClaveRegistro=CAT_SAT_REGISTROS.Clave 
             WHERE FIN007.CLAVE='$name'";

			 $resultado = sqlsrv_query($conn, $query);
                   
                    	while($row =sqlsrv_fetch_array($resultado)) {
                    		
                            $id = $row['CLAVE'];
                            $PEDIMENTO = $row['Pedimento'];
                            $Booking = $row['Registro'];
                            $Nombre = $row['NOMBRE'];
                            $ClaveRegistro= $row['ClaveRegistro'];


                    	?>

                    	<tr>
                    		<td>
                    			<?php echo $id; ?>
                    		</td>
                            <td>
                                <?php echo $Nombre; ?>
                            </td>

                    		<td><a href="Varios_Archivos.php?idb=<?php echo $row['Clave'] ?>">
                    			<?php echo $Booking; ?> 
                    		</a></td>
                    		
                    		<td>
                    			<?php echo $PEDIMENTO; ?>
                    		</td>

                           
                    		
                    	</tr>
                <?php
                    }

                  

			?>
			
		</tbody>


	</table>

	<form method="post" action="tabla_clientes.php" >
 	  
      
       <input type="submit" value="Ok" />
       <br />
       <br />
    </form>

</body>
</html>