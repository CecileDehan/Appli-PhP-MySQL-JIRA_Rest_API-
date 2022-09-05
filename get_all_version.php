<?php
require 'vendor/autoload.php';

use JiraRestApi\Project\ProjectService;
use JiraRestApi\JiraException;

try {
    $proj = new ProjectService();

    $vers = $proj->getVersions('OPS');
    $file = 'versions.txt';
    file_put_contents($file, "");
    foreach ($vers as $v) {
    
        // $version = $v['name'];

        // $v is  JiraRestApi\Issue\Version
        $result = print_r($v,true);
        echo nl2br("\n");
        echo nl2br("\n");
        $current = file_get_contents($file);
        $current .= $result . "\n";
        file_put_contents($file, $current);
       
        echo '<script>alert("Extraction effectuée")</script>';
        ?>
        
                <script> window.location.href = "./index.php"; </script>

                <?php 
    }
} catch (JiraRestApi\JiraException $e) {
	print('Error Occured! ' . $e->getMessage());
}




// $values = "";
// $date = date('Y-m-d H:m:s');
// foreach ($data['players'] as $myp) {
// //    echo $myp["name"]."<br>";
//     $name = $myp['name'];
//     $posi = $myp['position'];
//     $nation = $myp['nationality'];
//     $market = $myp['marketValue'];

//     $values .= "('$name', '$posi', '$nation', '$market', '$date'),";
// }
// //remove last comma
// $values = substr($values, 0,-1);

// //mysqli connection
// $conn = mysqli_connect("host", "user", "password", "database");

// //sql query that insert the user info into the database
// $sql =  "INSERT INTO staffdb ( Name, Position, Nationality, Market, Created)       
//         VALUES".$values;
// //if the connection is sucessful, display regards message
// mysqli_query($conn, $sql) or die('Error: ' . mysqli_error($conn));
// echo "Thank you <br/>";