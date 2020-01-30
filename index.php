
<?php
$archivo = (isset($_FILES['archivo'])) ? $_FILES['archivo'] : null;
if ($archivo) {
   $ruta_destino_archivo = "archivos/{$archivo['name']}";
   $archivo_ok = move_uploaded_file($archivo['tmp_name'], $ruta_destino_archivo);

   $nombre= $archivo['name'];


}
?>
<!DOCTYPE html>
<html>
 <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title> Subir archivos </title>
 </head>
 <body>
    <?php if (isset($archivo)): ?>
       <?php if ($archivo_ok): ?>
          <strong> El archivo ha sido subido correctamente. <br />
              <?php 
                      echo "El nombre del archivo es: " .$nombre;
              ?>

          </strong>
       <?php else: ?>
          <span style="color: #f00;"> Error al intentar subir el archivo. </span>
       <?php endif; ?>
    <?php endif; ?>
    <form method="post" action="pruebas2.php" enctype="multipart/form-data">
       <label> Archivo </label>
       <input type="file" name="archivo" required="required" />
       <input type="submit" value="Subir" />
    </form>
 </body>
</html>

