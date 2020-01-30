<?php

    header('Content-Type: text/html; charset=UTF-8');
    //Iniciar una nueva sesión o reanudar la existente.
    session_start();
    //Si existe la sesión "cliente"..., la guardamos en una variable.
    if (isset($_SESSION['usuario'])){
        $usuario_final = $_SESSION['usuario'];
    }else{
 header('Location: ../login.php');//Aqui lo redireccionas al lugar que quieras.
     die() ;

    }
?>

<?php

set_time_limit(30);
error_reporting(E_ALL);
ini_set('error_reporting', E_ALL);
ini_set('display_errors',1);

// config
$ldapserver = 'glocad.local';//mail2.ilog.mx
$ldapuser      = 'GLOCAD\administrador';  //GLOCAD\USUARIO
$usuario_final=$_SESSION['usuario'];
//echo "Hola".$usuario_final;
 
$ldappass     = 'Srvintercom!11'; 
$ldaptree    = "CN=Users,DC=glocad,DC=local"; 

// connect 
$ldapconn = ldap_connect($ldapserver) or die("Could not connect to LDAP server.");

if($ldapconn) {
    // binding to ldap server
    $ldapbind = ldap_bind($ldapconn, $ldapuser, $ldappass) or die ("Error trying to bind: ".ldap_error($ldapconn));
    // verify binding
    if ($ldapbind) {
        //echo "CONEXION EXITOSA...<br /><br />";
        
        
    
        $result = ldap_search($ldapconn,$ldaptree, "(samaccountname=$usuario_final)") or die ("Error in search query: ".ldap_error($ldapconn));
        $data = ldap_get_entries($ldapconn, $result);
        
        // SHOW ALL DATA
        //echo '<h1>Dump all data</h1><pre>';
        //print_r($data);    
        //echo '</pre>';
        
        
        // iterate over array and print data for each entry
        
        for ($i=0; $i<$data["count"]; $i++) {
            //echo "dn is: ". $data[$i]["dn"] ."<br />";

            $nombre1=utf8_encode($data[$i]["cn"][0]);
            //echo "User: ". $data[$i]["cn"][0] ."<br />           
        }

         for ($i=0; $i<$data["count"]; $i++) {
            //echo "dn is: ". $data[$i]["dn"] ."<br />";
            $dep=utf8_encode($data[$i]["department"][0]);
            //echo "User: ". $data[$i]["cn"][0] ."<br />           
        }
        // print number of entries found
        for ($i=0; $i<$data["count"]; $i++) {
            //echo "dn is: ". $data[$i]["dn"] ."<br />";
            $oficina1=utf8_encode($data[$i]["physicaldeliveryofficename"][0]);
            //echo "User: ". $data[$i]["cn"][0] ."<br />           
        }
        for ($i=0; $i<$data["count"]; $i++) {
            //echo "dn is: ". $data[$i]["dn"] ."<br />";

            if(isset($data[$i]["facsimiletelephonenumber"][0])) {
                $ext=utf8_encode($data[$i]["facsimiletelephonenumber"][0]);
            } else {
                //echo "Departamento: None<br /><br />";
            }
            

            //echo "User: ". $data[$i]["cn"][0] ."<br />           
        }

       
        
        

        
    } 

}

// all done? clean up
ldap_close($ldapconn);
?>