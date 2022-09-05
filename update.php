<!DOCTYPE html>
<html>
 
<head>
    <title>Modification d'une version</title>
</head>
 
<body>

<?php
    include('config.php');

    $nomapp =  $_POST['application'];
    $lienversion = $_POST['version'];
    $pole = $_POST['pole'];
    $equipe = $_POST['equipe'];
    $datedelivraison =  $_POST['livraison'];
    $datehomologation = $_POST['homologation'];
    $dateprod = $_POST['prod'];
    $fiv = $_POST['fiv'];
    $etat = $_POST['etat'];
    $id_version = $_POST['id_version'];

   
    // database insert SQL code
    $sql = "UPDATE data_version SET Version = '$lienversion', PoleDev = '$pole', EquipeDev = '$equipe', Livraison ='$datedelivraison',Homologation = '$datehomologation',Production ='$dateprod',FIV ='$fiv',Etat='$etat' WHERE id_version = '$id_version'";
    // insert in database 
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); 
    $rs = mysqli_query($con, $sql);

    if($rs)
    {
        header("Location: ./index.php");
    }else{
        echo "Operation failed";
    }

?>

<?php $con->close(); ?>
</body>
 
</html>