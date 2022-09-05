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

    <?php 


    $datetime =date('Y-m-d H:i:s');

    ?>
    
    <div class="container">


        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Modification d'une version</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="./update.php">

                            <fieldset>

                                <?php
                                include('config.php');
                                mysqli_select_db($con, "database");

                                //recuperation de la ligne à modifier
                                $modif = $_GET['modif'];

                                
                                $results = mysqli_query($con,"SELECT * FROM data_version WHERE Version ='$modif'");
                                while($row = mysqli_fetch_array($results)) {
                                
                                ?>


                                <label> Nom de l'application:</label><br />
                                <div class="form-group">
                                    <input name="application" class="form-control" type="text" id="app" value = "<?php echo $row['App']?>" autofocus required readonly>
                                </div>
                            
                            
                                <label>Version:</label><br />
                                <div class="form-group">
                                    <input required name="version" class="form-control" type="text" value="<?php echo $row['Version']?>" id="version"  >
                                </div>

                                <label>Pôle de développement:</label><br />
                                <div class="form-group">                                    
                                    <input required name="pole" class="form-control" type="text" value="<?php echo $row['PoleDev']?>" id="pole" readonly >
                                </div>

                                <label>Equipe de développement:</label><br />
                                <div class="form-group">
                                    <input required name="equipe" class="form-control" type="text" value="<?php echo $row['EquipeDev']?>" id="equipe" readonly>
                                </div>

                                <label>Date de livraison:</label><br />
                                <div class="form-group">
                                    <input required name="livraison" class="form-control"   type="date" id="livraison" value="<?php echo $row['Livraison']?>">
                                </div>
                                
                                <label>Date d'homologation:</label><br />
                                <div class="form-group">
                                    <input name="homologation" class="form-control"  type="date" value="<?php echo $row['Homologation']?>" id="homologation" >
                                </div>

                                <label>Date de mise en production:</label><br />
                                <div class="form-group">
                                    <input required name="prod" class="form-control" type="date" value="<?php echo $row['Production']?>" id="prod" >
                                </div>

                                <label>Lien vers la FIV:</label><br />
                                <div class="form-group">
                                    <input name="fiv" class="form-control" type="text" value="<?php echo $row['FIV']?>" id="fiv" >
                                </div>
                                                                
                                <div class="etat">

                                <label>Etat actuel : <?php echo $row['Etat']?></label><br />


                                <?php if($row['Etat']=='Released'){?>
                                    <input type="radio" id="Released" name="etat" value="Released" checked>
                                    <label for="Released">Released</label><br />
                                <?php } else{?>
                                    <input type="radio" id="Released" name="etat" value="Released">
                                    <label for="Released">Released</label><br />
                                <?php }?>
                                <?php if($row['Etat']=='Unreleased'){?>
                                    <input type="radio" id="Unreleased" name="etat" value="Unreleased" checked>
                                    <label for="Unreleased">Unreleased</label><br />
                                <?php }else{?>
                                    <input type="radio" id="Unreleased" name="etat" value="Unreleased">
                                    <label for="Unreleased">Unreleased</label><br />
                                <?php }?>
                                <?php if($row['Etat']=='Archive'){?>
                                    <input type="radio" id="Archive" name="etat" value="Archive" checked>
                                    <label for="Archive">Archive</label><br />
                                <?php }else{?>
                                    <input type="radio" id="Archive" name="etat" value="Archive">
                                    <label for="Archive">Archive</label><br />
                                <?php }?>

                                </div>

                                <input id="id_version" name="id_version" type="hidden" value="<?php echo $row['id_version'] ?>">
                             
                                <?php
                            }
                            ?>
                                <input type="submit" class="btn btn-lg btn-success btn-block" value="Modifier" />
                                
                                
                                
                            </fieldset>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    

</body>
</html>