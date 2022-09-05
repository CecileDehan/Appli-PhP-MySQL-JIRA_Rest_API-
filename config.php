<?php   

    // $host = 'pr-adm-sirh07.ste.in.phm.education.gouv.fr';
    // $dbname = 'sam_version';
    // $user = 'dtmantisbt';
    // $pass= 'mantisBTDB!';
    
    // $con = pg_connect("host=$host dbname=$dbname user=$user password=$pass");


    $server = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'database';


    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);  
    $con = mysqli_connect($server, $username, $password, $database) or die("Erreur de connexion à MySQL");



    
?>

