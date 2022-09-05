

<?php 
// if ( empty(session_id()) ) session_start(); 
include("config.php");

$error = 0;


// // CONNEXION LDAP

// if (isset($_POST['login']) && !empty($_POST['email']) && !empty($_POST['password'])) {
//     $ldapuser = $_POST["username"];
//     $ldapmdp = $_POST["password"];
//     $ldapconn  = ldap_connect("ldap server name") or die("Couldnt connect to LDAP server");

//     if ($ldapconn){
//         $ldapbind = ldap_bind($ldapconn, $ldapuser, $ldapmdp);
//         if($ldapbind){
//             echo "connected";
//         }
//         else{
//             echo "connection failed";
//         }
//     }

//     $Result = ldap_search($ldapconn, "OU=IT,DC='Domain',DC=corp","(samaccountname=$ldaprdn)", array("dn"));
//     $data = ldap_get_entries($ldapconn,$Result);
//     print_r($data);
// }else{
//     $error =1; 
// }
// 


if (isset($_POST['fullname']) && !empty($_POST['email']) && !empty($_POST['newpassword']) && !empty($_POST['confirmpassword'])) {

    $email = $con->real_escape_string($_POST['email']);
    $newpassword = $con->real_escape_string($_POST['newpassword']);
    $confirmpassword = $con->real_escape_string($_POST['confirmpassword']);


    if ($confirmpassword != $newpassword) {
        $error = 1;
    } else {
        $change = $con->query("UPDATE registration SET password = '$newpassword' WHERE email='$email'");
        $message = 'Mot de passe changé avec succès ';

        echo '<script> alert("' . $message . '");
        window.location.href="index.php";
        </script>';
        exit;

        
    }
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./css/fonts.css" rel="stylesheet">
    <link href="./css/login.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="icon" href="./assets/marianne.png" type="image/png">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

    <title>Settings</title>
    <style>
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
        <a href="./profil.php" class="previous round">&#8617;</a>
    </div>

    <div class="container">

        <div class="row">
            <?php if ($error == 1) { ?>
                <br>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    Les deux mots de passe ne sont pas identiques !
                </div>
            <?php } ?>
           
        </div> 
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Changer de mot de passe</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="./modif_profil.php">
                            <fieldset>

                                <?php
                                include('config.php');
                                mysqli_select_db($con, "database");

                                $userid = $con->real_escape_string($_COOKIE['userid']);


                                $results = mysqli_query($con, "SELECT * FROM registration WHERE id ='$userid'");
                                while ($row = mysqli_fetch_array($results)) {

                                ?>

                                    <div class="form-group">
                                        <div>
                                            <input name="fullname" class="form-control" value="<?php echo $row['name']; ?>" name="fullname" type="text" readonly>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <input name="email" class="form-control" value="<?php echo $row['email']; ?>" name="email" type="email" readonly>
                                        </div>

                                        <div class="form-group">
                                            <input required name="newpassword" class="form-control" placeholder="Password" name="password" type="password">
                                        </div>

                                        <div class="form-group">
                                            <input required name="confirmpassword" class="form-control" placeholder="Confirm Password" name="password" type="password">
                                        </div>

                                        <input type="submit" name="login" class="btn btn-lg btn-success btn-block" value="Change" />
                                    <?php
                                }
                                    ?>
                            </fieldset>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/metisMenu/2.2.0/metisMenu.min.js"></script>

    <?php $con->close(); ?>

</body>

</html>