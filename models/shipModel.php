<?php
class shipModel
{
   static public function getall()
   {
      $query = "SELECT * FROM ship";
      $stmt = DB::connect()->prepare($query);
      $stmt->execute();
      $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $res;
   }
   static public function add($data)
   {
      $stmt = DB::connect()->prepare("INSERT INTO `ship`(`name`, `rooms_number`, `places_number`) 
    VALUES (:shipname,:rooms,:places)");
      $stmt->bindParam(':shipname', $data['shipName']);
      $stmt->bindParam(':rooms', $data['rooms']);
      $stmt->bindParam(':places', $data['places']);
      if ($stmt->execute()) {
         return 'ok';
      } else {
         return 'error';
      }
      $stmt = null;
   }
   static public function delete($data)
   {
      try {
         $stmtdelet = DB::connect()->prepare('DELETE FROM `ship` WHERE idS=:id');
         $stmtdelet->bindParam(':id', $data['id']);
         $stmtdelet->execute();
         if ($stmtdelet->execute()) {
            return 'ok';
         }
      } catch (PDOException $ex) {
         echo 'erreur' . $ex->getMessage();
      }
      $stmt = null;
   }
}
