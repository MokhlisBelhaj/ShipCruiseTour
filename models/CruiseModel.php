<?php
class CruiseModel{
    static public function getall()
    {
       $query = "SELECT * FROM cruise";
       $stmt = DB::connect()->prepare($query);
       $stmt->execute();
       $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
       return $res;
    }
    static public function add($data)
    {
       $stmt = DB::connect()->prepare('INSERT INTO `cruise`(`name`, `price`, `image`, `nights_number`, `starting_date`, `ship_id`, `port_id`, `idT`) 
    VALUES (:name,:price,:image,:nights_number,:starting_date,:ship_id,:port_id, :idT)');
       $stmt->bindParam(':name', $data['']);
       $stmt->bindParam(':price', $data['']);
       $stmt->bindParam(':image', $data['']);
       $stmt->bindParam(':nights_number', $data['']);
       $stmt->bindParam(':starting_date', $data['']);
       $stmt->bindParam(':ship_id', $data['']);
       $stmt->bindParam(':port_id', $data['']);
       $stmt->bindParam(':idT', $data['']);
       if ($stmt->execute()) {
          return 'ok';
       } else {
          return 'error';
       }
       $stmt = null;
    }
    static public function delete($data){
    try{
      $stmtdelet = DB::connect()->prepare('DELETE FROM `cruise` WHERE id=:id');
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