
        <?php
        
           include 'configuration_jira.php';
            // require 'vendor/autoload.php';

            use JiraRestApi\Issue\Version;
            use JiraRestApi\Project\ProjectService;
            use JiraRestApi\Version\VersionService;
            use JiraRestApi\JiraException;

            // Information sur la version
            include('config.php');          
            $id = $_GET['id'];
            $results = mysqli_query($con,"SELECT * FROM data_version WHERE id_version ='$id'");

            $row = mysqli_fetch_array($results);
            $name = $row['Version'];
            
            $startDate = $row['Livraison'];
            $releasedDate = $row['Production'];

            if($row['Etat']=='Released'){
                $released = true;
            }else{
                $released = false;
            }


            // Ajout dans JIRA
            try {   
                $projectService = new ProjectService();

                //Selectionner le projet
                $project = $projectService->get('OPS');

                $versionService = new VersionService();

                $version = new Version();

                $version->setName($name)
                        ->setDescription('')
                        ->setReleased($released)
                        ->setReleaseDate($releasedDate)
                        ->setProjectId($project -> id);

                $res = $versionService->create($version);
                echo '<script>alert("Version créée dans JIRA  ")</script>';
                ?>
                <script> window.location.href = "./index.php"; </script>

                <?php 
                //var_dump($res);
            } catch (JiraRestApi\JiraException $e) {

                echo '<script>alert("Version DÉJÀ créée dans JIRA")</script>';
                ?>
                <script> window.location.href = "./index.php"; </script>

                <?php 
            }
            

        ?>

