
<!-- Connexion LDAP -->

<?php
    // $username = $_POST['username'];
    // $password = $_POST['password'];


    // $ldapconfig['host'] = 'LDAP SERVER';//CHANGE THIS TO THE CORRECT LDAP SERVER
    // $ldapconfig['port'] = '389';
    // $ldapconfig['basedn'] = 'dc=LDAP_SERVER,dc=com';//CHANGE THIS TO THE CORRECT BASE DN
    // $ldapconfig['usersdn'] = 'cn=users';//CHANGE THIS TO THE CORRECT USER OU/CN
    // $ds=ldap_connect($ldapconfig['host'], $ldapconfig['port']);

    // ldap_set_option($ds, LDAP_OPT_PROTOCOL_VERSION, 3);
    // ldap_set_option($ds, LDAP_OPT_REFERRALS, 0);
    // ldap_set_option($ds, LDAP_OPT_NETWORK_TIMEOUT, 10);

    //     // $dn="uid=".$username.",".$ldapconfig['usersdn'].",".$ldapconfig['basedn'];

    // if(isset($_POST['username'])){
    //     if ($bind = ldap_bind($ds, $username, $password)) {

    //         $cookie_id=uniqid('USER');
    //         setcookie('userid', $cookie_id);  
    //         setcookie('email',$username);

    
    ?>
             <!-- <script>window.location.href = "./index.php";</script> -->

         <?php 
    //     } else {

    //     echo "Login Failed: Email et/ou mot de passe incorrect(s) ";
    //     }
    // }
?>

<!-- FIN Connexion LDAP -->


<?php


    if(isset($_SESSION)){ 
        
        session_destroy();

    }

    include("config.php");
    

    $error = 0;

    if (isset($_POST['login']) && !empty($_POST['username']) && !empty($_POST['password'])) {

        $username = $con->real_escape_string($_POST['username']);
        $password = $con->real_escape_string($_POST['password']);

        $login = $con->query("SELECT * FROM registration WHERE name='$username' AND password='$password'");
       

        if ($login->num_rows == 1) {
                        
            //session_register("userid");
            $row = $login->fetch_assoc();

            session_start();
            $cookie_id=$row['id'];
            
            $email=$row['email'];
            // retenir l'id de la personne connectée 
            setcookie('userid', $cookie_id);  
            setcookie('email',$email);    
            
            ?>
                <script>window.location.href = "./index.php";</script>

            <?php 

            exit;
        } else {
            $error = 1;
        }
    }
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Connexion</title>
    <link href="./css/fonts.css" rel="stylesheet">
    <link rel="icon" href="node_modules\@gouvfr\dsfr\dist\favicon\favicon.svg" type="image/svg+xml">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/login.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">

</head>

<body>

    <div class="container">

        <div class="row">
        <?php if($error==1){ ?>
        <br>
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            Email et/ou mot de passe incorrect(s) !
        </div>
        <?php } ?>

        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">   
                        <h3 class="panel-title">Connexion</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="./login.php">
                            <fieldset>
                                <div class="form-group">
                                    <input name="username" class="form-control" placeholder="Username" name="username" type="text">
                                </div>
                                <div class="form-group">
                                    <input name="password" class="form-control" placeholder="Password" name="password" type="password">
                                </div>

                                <input type="submit" name="login" class="btn btn-lg btn-success btn-block" value="Login" />

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


</body>

</html>