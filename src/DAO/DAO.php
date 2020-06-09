<?php
//DAO - DATA OBJECT ACCESS - GERE LA CONNEXION AVEC LA BDD ET LES REQUÊTES SQL - ABSTRACT CLASS CAR ELLE NE SERA JAMAIS INSTANCIEE - LES AUTRES DAO VONT HERITER DE CETTE CLASSE
namespace projet_4\src\DAO;
use PDO;
use Exception;
abstract class DAO {

    private $connection;

    private function checkConnection()
    {
        if($this->connection === null) {
            return $this->getConnection();
        }
        return $this->connection;
    }

    //Méthode de connexion à la base de données
    private function getConnection()
    {
        try{
            $this->connection = new PDO(DB_HOST,DB_USER,DB_PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->connection;
        }
        catch(Exception $errorConnection)
        {
            die ('Erreur de connection :'.$errorConnection->getMessage());
        }

    }

    protected function createQuery($sql, $parameters = null)
    {
      if($parameters)
      {
          $result = $this->checkConnection()->prepare($sql);
          $result->execute($parameters);
          return $result;
      }
      $result = $this->checkConnection()->query($sql);
      return $result;
  }
}
