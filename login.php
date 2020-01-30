<?php  session_start();  ?>
<html>
<head>

<title>Iniciar Sesión</title>
 <meta charset="utf-8" />
  
    <br>
<body>
<br> 
<br>



   
    <div class="loginbox">
    
        <h1></h1>
        <form role="form" name="login" action="Login/condiciones.php" method="post" >
             <div class="loginbox">
            <p>Usuario</p>
            <input type="text" name="usuario" placeholder="INGRESA USUARIO"  required>
            <p>Contraseña</p>
            <input type="password" name="clave" placeholder="INGRESA CONTRASEÑA" required>
            <input type="submit" name="" value="Login">
            <input type="text" name="diagonal" value="\" style="visibility:hidden">
            
        </form>
    </div>     

</body>
</head>
</html>