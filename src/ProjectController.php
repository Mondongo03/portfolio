<?php

require_once "DatabaseController.php";

class ProjectController {

    private $connection;

    public function __construct() {
        $this->connection = DatabaseController::connect();
    }

    public function getProjects() {

        try  {
       
            $sql = "SELECT * 
                    FROM Project";
        
            $statement = $this->connection->prepare($sql);
            $statement->setFetchMode(PDO::FETCH_OBJ);
            $statement->execute();

            $result = $statement->fetchAll();
            
            return $result;

          } catch(PDOException $error) {
              echo $sql . "<br>" . $error->getMessage();
          }
    }

    public function getJoin() {

        try  {
       
            $sql = "SELECT p.id 
                    AS projectId, p.name, t.id 
                    AS technologyId, t.name, t.img
                    FROM Technology t
                    JOIN ProjectTechnology pt 
                    ON t.id = pt.technologyId
                    JOIN Project p 
                    ON pt.projectId = p.id";
        
            $statement = $this->connection->prepare($sql);
            $statement->setFetchMode(PDO::FETCH_OBJ);
            $statement->execute();

            $result = $statement->fetchAll();
            print_r("<pre>");
            print_r($result);
            print_r("</pre>");
            return $result;

          } catch(PDOException $error) {
              echo $sql . "<br>" . $error->getMessage();
          }
    }

}