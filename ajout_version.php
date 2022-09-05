<?php include('config.php');

// if ( empty(session_id()) ) session_start(); 


// session_start(); 

$error = 0;

if (isset($_POST['version'])) {
    $lienversion = $con->real_escape_string($_POST['version']);
    $check = mysqli_query($con, "SELECT * FROM data_version WHERE Version ='$lienversion'");
    $checkrows = mysqli_num_rows($check);


    if ($checkrows == 0) {
        $nomapp =  $_POST['application'];
        $lienversion = $_POST['version'];
        $pole = $_POST['pole'];
        $equipe = $_POST['equipe'];
        $datedelivraison =  $_POST['livraison'];
        $datehomologation = $_POST['homologation'];
        $dateprod = $_POST['prod'];
        $fiv = $_POST['fiv'];
        $etat = $_POST['etat'];
        
        $id_version = uniqid($nomapp);
        $_COOKIE['id_version'] = $id_version;

        // insert in database 
        $rs = $con->query("INSERT INTO data_version (`id_version`,`App`, `Version`, `PoleDev`, `EquipeDev`, `Livraison`, `Homologation`, `Production`, `FIV`, `Etat`) VALUES ('$id_version', '$nomapp', '$lienversion', '$pole', '$equipe', '$datedelivraison','$datehomologation','$dateprod','$fiv','$etat')");

        if ($rs) {
            header("Location: ./index.php");
        } else {
            echo "Error";
        }
    } else{
         echo '<script>alert("Version déjà existante ! ")</script>';
    }
}


?>

<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestion des versions</title>
    <meta name="description" content="">
    <meta name="author" content="77896,77907,77969">
    <link href="./css/fonts.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="icon" href="./assets/marianne.png" type="image/png">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>

   
    
    <style>
        body {
            font-family: 'Marianne';
        }

        .container {
            margin-top: 3vw;
        }

        .btn-success {
            background-color: #000091 !important;
        }

        a {
            text-decoration: none;
            display: inline-block;
            padding: 8px 16px;
            background-color: #000091;
            color: white;
        }

        a:hover {
            text-decoration: none;
            background-color: #1625c9;
            color: white;
        }

        .round {
            border-radius: 70%;
        }

        .return {
            margin: 1vw;
        }
    </style>
</head>

<body>
    
    <div class="return">
        <a href="./index.php" class="previous round">&#8617;</a>
    </div>
    <?php $datetime = date('Y-m-d H:i:s'); 
 ?>
   
    <div class="container">

        
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Créer une version</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="./ajout_version.php">
                            <fieldset>


                                <label> Nom de l'application:</label><br />
                                <div class="form-group" require>
                                    <select id="app" name="application" class="form-control" onchange="document.getElementById('version').value=this.value +'.'">>

                                        <!-- Verifier que les accents soient pris en compte  -->

                                        <?php
                                            // if ( empty(session_id()) ) session_start(); 
                                            include('config.php');
                                            mysqli_select_db($con, "database");      
                                            $results = mysqli_query($con,"SELECT DISTINCT * FROM application");
                                            while($row = mysqli_fetch_array($results)) { 
                                        ?>
                                            
                                            <option value="<?php echo $row['Application']?>" name="pole"><?php echo $row['Application']?></option>
                                            
                                        <?php
                                            } 
                                        ?>
                                            
                                        </select>

                                            <!-- FIN Verifier que les accents soient pris en compte  -->

                                </div>


                                <label>Version:</label><br />
                                <div class="form-group">                                   
                            
                                    <input required name="version" class="form-control" type="text" value="" id="version">
                                    
                                    
                                </div>


                                
                                <label>Pôle de développement:</label><br />
                                <div class="form-group" require>

                                    <select id="pole" name="pole" class="form-control">
                                        
                                    <?php
                                        if ( empty(session_id()) ) session_start(); 
                                        include('config.php');
                                        mysqli_select_db($con, "database");      
                                        $results = mysqli_query($con,"SELECT * FROM pole_dev");
                                        while($row = mysqli_fetch_array($results)) { 
                                    ?>
                                        
                                        <option value="<?php echo $row['PoleDev']?>" name="pole"><?php echo $row['PoleDev']?></option>
                                        
                                    <?php
                                        } 
                                    ?>
                                        
                                    </select>

                                   
                                </div>

                                <label>Equipe de développement:</label><br />
                                <div class="form-group" require>
                                <select id="equipe" name="equipe" class="form-control">


                                        <!-- Modifier avec la bonne base de données -->



                                        <?php
                                            if ( empty(session_id()) ) session_start(); 
                                            include('config.php');
                                            mysqli_select_db($con, "database");      
                                            $results = mysqli_query($con,"SELECT * FROM equipe_dev");
                                            while($row = mysqli_fetch_array($results)) { 
                                        ?>
                                            
                                            <option value="<?php echo $row['EquipeDev']?>" name="equipe"><?php echo $row['EquipeDev']?></option>
                                            
                                        <?php
                                            } 
                                        ?>


                                        <!-- FIN Modifier avec la bonne base de données  -->


                                        </select>
                                </div>

                                <label>Date de livraison:</label><br />
                                <div class="form-group">
                                    <input required name="livraison" class="form-control" type="date" id="livraison" value="">
                                </div>

                                <label>Date d'homologation:</label><br />
                                <div class="form-group">
                                    <input name="homologation" class="form-control" type="date" value="" id="homologation">
                                </div>

                                <label>Date de mise en production:</label><br />
                                <div class="form-group">
                                    <input required name="prod" class="form-control" type="date" value="" id="prod">
                                </div>

                                <label>Lien vers la FIV:</label><br />
                                <div class="form-group">
                                    <input name="fiv" class="form-control" type="text" value="" id="fiv">
                                </div>

                                
                                <label>Etat:</label><br />

                                <div class="radio-group" required>
                                    <input type="radio" id="Released" name="etat" value="Released">
                                    <label for="Released">Released</label><br />

                                    <input type="radio" id="Unreleased" name="etat" value="Unreleased" checked>
                                    <label for="Unreleased">Unreleased</label><br />

                                    <input type="radio" id="Archive" name="etat" value="Archive">
                                    <label for="Archive">Archive</label><br />

                                </div>

                                <input id="derniere_modif" name="derniere_modif" type="hidden" value="<?php echo $datetime; ?>">

                                </fieldset>


                                <input type="submit" class="btn btn-lg btn-success btn-block" value="Add" />



                            
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $con->close(); ?>
</body>

</html>