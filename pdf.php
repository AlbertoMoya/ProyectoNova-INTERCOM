<?php
$serverName = "192.168.1.153"; //serverName\instanceName, portNumber (por defecto es 1433)
$connectionInfo = array( "Database"=>"CustomerWebSite", "UID"=>"luis", "PWD"=>"lozano1", "characterset"=>"UTF-8");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
?>


<?php
			 $query= "SELECT * FROM Pedimentos WHERE ID=".$_GET['id'];

			 $resultado = sqlsrv_query($conn, $query);
                   
                    	if($row =sqlsrv_fetch_array($resultado)) {
                    		if ($row['Documento']=="") { ?>
                    		<p>No tiene archivos</p>

                    		<?php }else{              
                             
                          //  <iframe src="docs/<?php echo $row['Documento']; " ></iframe> 
                             
                             header('content-type: application/pdf');
                             readfile('docs/'.$row['Documento']);
                    	   	
                    	     }
                    	    }?>