<?php
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

    public function fetchProjects($archived) : array{
        $query = $this->conn->prepare("SELECT * FROM project WHERE archived=?;");
        $query->bindParam(1,$archived,PDO::PARAM_INT);
        $query->execute();
        $result = $query->fetchAll();
        $projects = array();
        foreach ($result as $prj) {
            // Convert DATE (MySQL type) into string
            $date = new DateTime($prj['startedAt']);
            $date = $date->format('Y-m-d');
            // Create a new instance of Project
            $project = new Project($prj['id'], $prj['title'], $prj['description'], $date, $prj['Contributor_id']);
            // Add in the projects array
            $projects[] = $project;
            unset($project);
        }
        return $projects;
    }
    public function deleteProject($idx){
        $query = $this->conn->prepare("DELETE FROM project WHERE id=?");
        $query->bindParam(1, $idx,PDO::PARAM_INT);
        $query->execute();
    }
}