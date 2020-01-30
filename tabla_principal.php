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
				<th>Pedimento</th>
				

			</tr>
		</thead>

		<tbody>
			<?php
			 $query= "SELECT * FROM Pedimentos WHERE M3='M3' OR M3='m3'";

			 $resultado = sqlsrv_query($conn, $query);
                   
                    	while($row =sqlsrv_fetch_array($resultado)) {
                    		$Pedimento = $row['Pedimento'];
                    		
                    	?>

                    	<tr>
                    		<td><a href="tabla_pedimentos.php?id_pedimento=<?php echo $row['Pedimento'] ?>">
                    			<?php echo $Pedimento; ?>
                    		</a></td>
                    		
                    		
                    		
                    	</tr>
                <?php
                    }

                  

			?>
			
		</tbody>


	</table>

	<form method="post" action="Varios_Archivos.php" >
 	  <input type="hidden" name="num_pedimento">
      
       <input type="submit" value="Ok" />
       <br />
       <br />
    </form>

</body>
</html>