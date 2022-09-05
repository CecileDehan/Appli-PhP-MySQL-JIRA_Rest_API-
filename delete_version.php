<?php
require 'vendor/autoload.php';

use JiraRestApi\Version\VersionService;
use JiraRestApi\Project\ProjectService;
use JiraRestApi\JiraException;

// include('config.php');
// if (isset($_POST['version'])) {
//     $lienversion = $con->real_escape_string($_POST['version']);

//     function debug_to_console($data) {
//         $output = $data;
//         if (is_array($output))
//             $output = implode(',', $output);

//         echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
//     }
//         debug_to_console($lienversion);
        try {
            $versionService = new VersionService();
            $projectService = new ProjectService();

            $version = $projectService->getVersion('OPS','Cartograph.xx.XXX');

            $res = $versionService->delete($version);

        // var_dump($res);
        echo '<script>alert("Version supprimée")</script>';
                    ?>
                    <script> window.location.href = "./index.php"; </script>

                    <?php
    } catch (JiraRestApi\JiraException $e) {
        print('Error Occured! ' . $e->getMessage());
    }



// }

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
            border-radius: 50%;
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

    <?php $datetime = date('Y-m-d H:i:s'); ?>


    <div class="container">

        
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Supprimer une version</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="./delete_version.php>
                            <fieldset>


                                <label> Nom de la version:</label><br />
                                <div class="form-group" require>
                                    <select id="app" name="application" class="form-control">

                                        <!-- Verifier que les accents soient pris en compte  -->

                                        <?php
                                            // if ( empty(session_id()) ) session_start(); 
                                            include('config.php');
                                            mysqli_select_db($con, "database");      
                                            $results = mysqli_query($con,"SELECT * FROM data_version");
                                            while($row = mysqli_fetch_array($results)) { 
                                        ?>
                                            
                                            <option value="<?php echo $row['Version']?>" name="pole"><?php echo $row['Version']?></option>
                                            
                                        <?php
                                            } 
                                        ?>
                                            
                                        </select>

                                            <!-- FIN Verifier que les accents soient pris en compte  -->

                                </div>


                                </fieldset>


                                <input type="submit" class="btn btn-lg btn-success btn-block" value="Supprimer" />



                            
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $con->close(); ?>
</body>

</html>