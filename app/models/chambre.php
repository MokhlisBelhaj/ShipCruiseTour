<?php
class chambre
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function addChambre($data, $ship)
    {
        // var_dump($ship, $data);


        $this->db->query('INSERT INTO `chambre` (`num_chambre`, `id_typechambre`, `id_navire`)
          VALUES (:chambreNum,:chambreType,(SELECT `id` FROM `navire` WHERE `nom` = :nom))');
        // Bind values
        $this->db->bind(':chambreNum', $data['chambreNum']);
        $this->db->bind(':chambreType', $data['chambreType']);
        $this->db->bind(':nom', $ship);
        // Execute
        if ($this->db->execute()) {
            return 'ok';
        } else {
            return 'error';
        }
    }
    public function get_chambertyp1($id)
    {
        $this->db->query('SELECT chambre.id, chambre.num_chambre, chambre.id_typechambre, chambre.id_navire
        FROM chambre
        INNER JOIN type_chambre ON chambre.id_typechambre = type_chambre.id
        LEFT JOIN reservation ON chambre.id = reservation.id_chambre
        INNER JOIN croisier ON chambre.id_navire = croisier.ship_id
        WHERE croisier.id = :idCroisier
        AND type_chambre.id=1
        AND reservation.id_chambre IS NULL
        ;');
              $this->db->bind(':idCroisier',$id);
              
              $results = $this->db->resultSet();

              if ($results) {
                  return $results;
              } else {
                  return false;
              }
          
            

    }
    public function get_chambertyp2($id)
    {
        $this->db->query('SELECT chambre.id, chambre.num_chambre, chambre.id_typechambre, chambre.id_navire
        FROM chambre
        INNER JOIN type_chambre ON chambre.id_typechambre = type_chambre.id
        LEFT JOIN reservation ON chambre.id = reservation.id_chambre
        INNER JOIN croisier ON chambre.id_navire = croisier.ship_id
        WHERE croisier.id = :idCroisier
        AND type_chambre.id=2
        AND reservation.id_chambre IS NULL
        ;');
              $this->db->bind(':idCroisier',$id);
              
              $results = $this->db->resultSet();

              if ($results) {
                  return $results;
              } else {
                  return false;
              }
          
            

    }
    public function get_chambertyp3($id)
    {
        $this->db->query('SELECT chambre.id, chambre.num_chambre, chambre.id_typechambre, chambre.id_navire
        FROM chambre
        INNER JOIN type_chambre ON chambre.id_typechambre = type_chambre.id
        LEFT JOIN reservation ON chambre.id = reservation.id_chambre
        INNER JOIN croisier ON chambre.id_navire = croisier.ship_id
        WHERE croisier.id = :idCroisier
        AND type_chambre.id=3
        AND reservation.id_chambre IS NULL
        ;');
              $this->db->bind(':idCroisier',$id);
              
              $results = $this->db->resultSet();

              if ($results) {
                  return $results;
              } else {
                  return false;
              }
          
            

    }
}
