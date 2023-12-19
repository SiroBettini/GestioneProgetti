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
            unset($query);
            $query = $this->conn->prepare("SELECT state,updatedAt FROM projectstate WHERE Project_id=?;");
            $query->bindParam(1,$prj['id'],PDO::PARAM_INT);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            // Convert DATE (MySQL type) into string
            $date = new DateTime($result[0]['updatedAt']);
            $date = $date->format('Y-m-d');
            // Create a new instance of Project
            $project = new Project($prj['id'], $prj['title'], $prj['description'], $date, $prj['Contributor_id'],$result[0]['state']);
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
    public function addProject($title,$desc,$start,$user){
        $query = $this->conn->prepare("INSERT INTO project (title,description,startedAt,archived,Contributor_id) VALUES(?,?,?,?,?)");
        $query->bindParam(1, $title);
        $query->bindParam(2, $desc);
        $archived = 0;
        $date = new DateTime($start);
        $date = $date->format('Y-m-d');
        $query->bindParam(3, $date);
        $query->bindParam(4, $archived,PDO::PARAM_INT);
        $query->bindParam(5, $user,PDO::PARAM_INT);
        $query->execute();

        unset($query);
        $query = $this->conn->prepare("INSERT INTO projectstate (state,updatedAt,Project_id) VALUES(?,?,?)");
        $currState = "assigned";
        $query->bindParam(1, $currState);
        $query->bindParam(2, $date);
        $currId = $this->conn->lastInsertId();
        $query->bindParam(3, $currId, PDO::PARAM_INT);
        $query->execute();
    }
    public function updateProject($id,$title,$desc,$state){
        if($state === "finished"){
            $query = $this->conn->prepare("UPDATE project SET title = ?, description = ?, archived=1 WHERE id = ?");
        }else{
            $query = $this->conn->prepare("UPDATE project SET title = ?, description = ? WHERE id = ?");
        }
        $query->bindParam(1, $title);
        $query->bindParam(2, $desc);
        $query->bindParam(3, $id, PDO::PARAM_INT);
        $query->execute();
        $this->updateProjState($id,$state,date('Y-m-d'));
    }
    public function updateProjState($id,$state,$date){
        $query = $this->conn->prepare("UPDATE projectstate SET `state` = ?, updatedAt = ? WHERE Project_id = ?");
        $query->bindParam(1, $state);
        $query->bindParam(2, $date);
        $query->bindParam(3, $id, PDO::PARAM_INT);
        $query->execute();
    }
}