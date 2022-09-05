<?php

include 'configuration_jira.php';
// require 'vendor/autoload.php';

use JiraRestApi\Issue\Version;
use JiraRestApi\Project\ProjectService;
use JiraRestApi\Version\VersionService;
use JiraRestApi\JiraException;

// Information du formulaire
include('config.php');          
$id = $_GET['id'];
$results = mysqli_query($con,"SELECT * FROM data_version WHERE id_version ='$id'");

$row = mysqli_fetch_array($results);
$name = $row['Version'];
$releasedDate = $row['Production'];
$relDate = date('Y-m-g', strtotime($releasedDate));
if($row['Etat']=='Released'){
    $released = true;
}else{
    $released = false;
}

try {
    $versionService = new VersionService();
    $projectService = new ProjectService();

    $ver = $projectService->getVersion('OPS', $name);

    // update version
    $ver->setName($ver->$name)
        ->setDescription($ver->description . ' ')
        ->setReleased($released)
        ->setReleaseDate($relDate);

    $res = $versionService->update($ver);

    echo '<script>alert("Version modifiée dans JIRA  ")</script>';
    ?>
    <script> window.location.href = "./index.php"; </script>

    <?php 
    //var_dump($res);
} catch (JiraRestApi\JiraException $e) {
    //print('Error Occured! ' . $e->getMessage());
}
