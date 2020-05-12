<?php

 class Database {

   const DB_HOST ='mysql:host=localhost;dbname=test;charset=utf8';
   const DB_USER = 'root';
   const DB_PASS ='';


   public function getConnection() {
      try {

        $connection = new PDO(self::DB_HOST,self::DB_USER,self::DB_PASS);
        return 'Connexion OK';
      }

      catch(Exeption $errorConnection) {

      die('Erreur de connection:'.$errorConnection->getMessage());
      }
    }
 }
