<?php

require_once "DatabaseController.php";

class ProjectTechnologyController {

    private $connection;

    public function __construct() {
        $this->connection = DatabaseController::connect();
    }

    public function getProjectTechnology() {

        try  {
       
            $sql = "SELECT * 
                    FROM ProjectTechnology";
        
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