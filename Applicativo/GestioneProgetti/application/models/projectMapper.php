<?php

namespace models;

use PDO;

require_once "project.php";
class ProjectMapper
{
    private $conn;

    /**
     * @param $conn
     */
    public function __construct()
    {
        $this->conn = DBCONN;
    }

    public function fetchProjects() : array{
        $query = "SELECT * FROM project WHERE archived=0;";
        $result = $this->conn->query($query);
        $projects = array();
        foreach ($result as $prj) {
            //print_r($prj);
            //echo "<p>ciao</p>";
            $project = new Project($prj['id'], $prj['title'], $prj['description'], $prj['startedAt'], $prj['Contributor_id']);
            $projects[] = $project;
            unset($project);
        }
        return $projects;
    }
}