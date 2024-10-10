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
                    AS projectId, p.nombre_proyecto, t.id 
                    AS technologyId, t.nombre_tecnologia, t.img
                    FROM technology t
                    JOIN project_technology pt 
                    ON t.id = pt.technologyId
                    JOIN project p 
                    ON pt.projectId = p.id";
        
            $statement = $this->connection->prepare($sql);
            $statement->setFetchMode(PDO::FETCH_OBJ);
            $statement->execute();

            $result = $statement->fetchAll();

            return $result;

          } catch(PDOException $error) {
              echo $sql . "<br>" . $error->getMessage();
          }
    }

}