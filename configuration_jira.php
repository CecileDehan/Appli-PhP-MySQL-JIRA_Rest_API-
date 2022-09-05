
<?php

require 'vendor/autoload.php';
use JiraRestApi\Configuration\ArrayConfiguration;
use JiraRestApi\Issue\IssueService;


$iss = new IssueService(new ArrayConfiguration(
          [
               'jiraHost' => 'https://sirhmen.atlassian.net/',
                
               'JiraUser' => 'xavier.fenouil@education.gouv.fr',
               'jiraPassword' => 'Oom0iCRwIYE6FBGvFDfBCA8F'

               //Token 

               // 'useTokenBasedAuth' => true,
               // 'personalAccessToken' => 'Oom0iCRwIYE6FBGvFDfBCA8F',  
          ]
   ));

   ?>