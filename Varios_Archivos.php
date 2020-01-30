<?php

$serverName = "192.168.1.118"; //serverName\instanceName, portNumber (por defecto es 1433)
$connectionInfo = array( "Database"=>"InteNovaPrueba", "UID"=>"luis", "PWD"=>"", "characterset"=>"UTF-8");
$conn = sqlsrv_connect( $serverName, $connectionInfo);



?>


<html lang="es">
	<head>
		<meta charset="utf-8">
		<title>Subir Archivos</title>
		
		<script src="https://code.jquery.com/jquery-3.2.1.min.js" ></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		
		<style>
			body {
			padding-top: 20px;
			padding-bottom: 20px;
			}
		</style>
	</head>
	
	<body>    

		  <?php
			$name=$_GET['idb'];

			 $query= "SELECT * FROM FIN007 
             INNER JOIN CAT_SAT_REGISTROPEDIMENTOS ON FIN007.CLAVE=CAT_SAT_REGISTROPEDIMENTOS.Exportador 
             INNER JOIN CAT_SAT_REGISTROS ON CAT_SAT_REGISTROPEDIMENTOS.ClaveRegistro=CAT_SAT_REGISTROS.Clave 
             WHERE CAT_SAT_REGISTROS.Clave='$name'";

			 $resultado = sqlsrv_query($conn, $query);
                   
                    	while($row =sqlsrv_fetch_array($resultado)) {
                    		
                            $id = $row['CLAVE'];
                            $PEDIMENTO = $row['Pedimento'];
                            $Booking = $row['Registro'];
                            $Nombre = $row['NOMBRE'];
                            $ClaveRegistro= $row['ClaveRegistro'];




                           }
                    	?>

		

		<center>
       
        <div class="logo"><img alt="intercomls" style="width: 140px; height: 80px; text-align: center;" src="Logo/GLOC.png" class="align-right"/></div></center>
		<br />
		<br />
		<div class="container">		
			<div class="panel panel-primary">
				<div class="panel-body">

			

					
					<form name="form1" id="form1" method="post" action="guardar.php" enctype="multipart/form-data">
						
						<h4 class="text-center">Cargar Múltiples Archivos al Booking <?php echo $Booking; ?> </h4>
						
						<div class="form-group">
							<label class="col-sm-2 control-label">Pedimento</label>
							<div class="col-sm-8">
								<input type="text" name="Pedimento" placeholder="Pedimento" value="<?php echo $PEDIMENTO; ?>" required>
							</div>

							<div class="col-sm-8">
								<input type="hidden" name="ClaveRegistro" placeholder="Pedimento" value="<?php echo $ClaveRegistro; ?>" required>
							</div>

							<div class="col-sm-8">
								<input type="hidden" name="booking" placeholder="Pedimento" value="<?php echo $Booking; ?>" required>
							</div>


							<label class="col-sm-2 control-label">Archivos</label>
							<div class="col-sm-8">
								<input type="file" class="form-control" id="archivo[]" name="archivo[]" multiple="">
							</div>
                            

							
							<button type="submit" class="btn btn-primary">Cargar</button>
						</div>
						
					</form>
					
				</div>
			</div>
		</div>
	</body>
</html>