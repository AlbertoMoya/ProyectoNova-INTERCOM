<?php  session_start();  ?>
<html>
<head>
<title>Iniciar Sesion</title>
 <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="stylelogin.css">
    <br>
<body>
<br> 
<br>
   
    <div class="loginbox">
    <img src="Images/avatar1.png" class="avatar">
        <h1>Iniciar Sesión</h1>
        <form role="form" name="login" action="condicion2.php" method="post" >
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