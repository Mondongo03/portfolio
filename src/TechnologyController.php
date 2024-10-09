<?php

require_once "DatabaseController.php";

class TechnologyController {

    private $connection;

    public function __construct() {
        $this->connection = DatabaseController::connect();
    }

    public function getTechnology() {

        try  {
       
            $sql = "SELECT * 
                    FROM Technology";
        
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