<?php  

session_start();
    //Si existe la sesión "cliente"..., la guardamos en una variable.
    if (isset($_SESSION['usuario'])){
        $usuario_final = $_SESSION['usuario'];
       //$Permiso=$_SESSION['Permiso']= $row['Permiso'];
        //$Agente =$_SESSION['Nombre']= $row['Nombre'];

       // $_SESSION['Permiso']= $row['Permiso'];

        
           
         //echo $PA;

    }else{
 header('Location:login.php');//Aqui lo redireccionas al lugar que quieras.
     die() ;

    }





$serverName = "192.168.1.118"; //serverName\instanceName, portNumber (por defecto es 1433)
$connectionInfo = array( "Database"=>"InteNovaPrueba", "UID"=>"luis", "PWD"=>"", "characterset"=>"UTF-8");
$conn = sqlsrv_connect( $serverName, $connectionInfo);





?>

<!DOCTYPE html>
<html>
<head>
	<title>Tabla de Clientes</title>
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
				<th>Clave</th>
				<th>Nombre</th>
				<th>Origen</th>
                <th>Aduana</th>
				

			</tr>
		</thead>

		<tbody>
			<?php

			  
              
			 $query= "SELECT DISTINCT NOMBRE, FIN007.CLAVE, FIN007.ORIGEN, CAT_SAT_AGENTEADUANAL.RazonSocial  FROM FIN007 
             INNER JOIN CAT_SAT_REGISTROPEDIMENTOS ON FIN007.CLAVE=CAT_SAT_REGISTROPEDIMENTOS.Exportador 
             INNER JOIN CAT_SAT_REGISTROS ON CAT_SAT_REGISTROPEDIMENTOS.ClaveRegistro=CAT_SAT_REGISTROS.Clave
             INNER JOIN CAT_SAT_AGENTEADUANAL ON CAT_SAT_REGISTROS.AgenteAduanal=CAT_SAT_AGENTEADUANAL.Clave 
             WHERE FIN007.CLAVE='15775' AND AgenteAduanal='42' 
             OR FIN007.CLAVE='27351' AND AgenteAduanal='42' 
             OR FIN007.CLAVE='06239' AND AgenteAduanal='42' 
             OR FIN007.CLAVE='14379' AND AgenteAduanal='42'";

			 $resultado = sqlsrv_query($conn, $query);
                   
                    	while($row =sqlsrv_fetch_array($resultado)) {
                    		
                            $ID = $row['CLAVE'];
                            $Cliente = $row['NOMBRE'];
                            $Origen = $row['ORIGEN'];
                            $rs = $row['RazonSocial'];
                    	?>

                    	<tr>
                    		<td>
                    			<?php echo $ID; ?>
                    		</td>
                    		<td>
                    			<a href="tabla_bookings.php?id_name=<?php echo $row['CLAVE'] ?>">
                    			<?php echo $Cliente; ?> 
                    		</a></td>
                    		
                    		<td>
                    			<?php echo $Origen; ?>
                    		</td>
                            <td>
                                <?php echo $rs; ?>
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