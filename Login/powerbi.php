
<?php

    
    
?>

<?php

$pass = 'SUmem83w';
$usuario='luis_l';
$userlogin = "glocad\\".$usuario;

$ldaptree = "CN=Users,DC=glocad,DC=local"; 


// conexión al servidor LDAP
$ldapconn = ldap_connect("glocad.local")
    or die("Could not connect to LDAP server.");

if ($ldapconn) {
    // realizando la autenticación
    $ldapbind = ldap_bind($ldapconn, $userlogin, $pass);
    // verificación del enlace
    if ($ldapbind) {

        $result = ldap_search($ldapconn,$ldaptree, "(department=Sistemas)") or die ("Error in search query: ".ldap_error($ldapconn));
        $info = ldap_get_entries($ldapconn, $result);
        //print_r($info);


        for ($i=0; $i < $info["count"]; $i++) { 
            
          $departamento2=$info[$i]["department"][0];
          if($departamento2=='Sistemas'){
             
            //echo "dn is: ". $data[$i]["dn"] ."<br />";
            echo ":".utf8_encode($info[$i]["cn"][0]);
            //echo "User: ". $data[$i]["cn"][0] ."<br />           
        
          }
          
          
 

         
        

            

        
    }  
 } else {
        $incorrecto="Usuario o contraseña incorrectos... Verifique por favor";
                    echo '<script>alert("'.$incorrecto.'");</script>';
                         print "<script>window.location='../login.php';</script>";
      } 
} 



?>
