
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
   <script src="script.js"></script>

<?php 

$conn = mysqli_connect('192.168.1.153','Alberto' ,'moya_24' ,'ilog');

if(!$conn)
    {
    die ("No hay conexion a la base de datos". mysqli_connect_error());
    }

$Pedimento = $_POST["Pedimento"];
$Documento = $_POST["Documento"];
$Suma510 = $_POST["Suma510"];
$Suma557 = $_POST["Suma557"];
$Total = $_POST["Total"];

mysqli_query($conn, "insert into pedimentos(Pedimento, Documento, Suma510, Suma557, Total)
	                values ($Pedimento, '$Documento', $Suma510, $Suma557, $Total)");


echo "<script> swal({
   title: 'Pedimento Guardado',
    text: '$folio',
   
  
 });
 
</script>";



?>