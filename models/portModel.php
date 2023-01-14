<?php
class portModel{
    static public function getall()
    {
       $query = "SELECT * FROM port";
       $stmt = DB::connect()->prepare($query);
       $stmt->execute();
       $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
       return $res;
    }
    static public function add($data)
    {
       $stmt = DB::connect()->prepare('INSERT INTO `port`(`name`, `country`) 
    VALUES (:portName,:country)');
       $stmt->bindParam(':portName', $data['portName']);
       $stmt->bindParam(':country', $data['country']);
       if ($stmt->execute()) {
          return 'ok';
       } else {
          return 'error';
       }
       $stmt = null;
    }
    static public function delete($data){
    try{
      $stmtdelet = DB::connect()->prepare('DELETE FROM `port` WHERE idP=:id');
      $stmtdelet->bindParam(':id', $data['id']);
      $stmtdelet->execute();
      if ($stmtdelet->execute()) {
        return 'ok';
     }
    }catch(PDOException $ex){
        echo'erreur'.$ex-> getMessage();
     }
     $stmt = null;
   }
}