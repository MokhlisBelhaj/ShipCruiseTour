<?php

class navire
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }
  public function addNavire($NAV)
  {
    $this->db->query('INSERT INTO `navire`(`nom`) VALUES (:shipName)');
    // Bind values
    $this->db->bind(':shipName', $NAV);
    // Execute
    if ($this->db->execute()) {
      return 'ok';
    } else {
      return 'error';
    }
  }

  public function getNavire()
  {
    $this->db->query(
      'SELECT n.id, n.nom, COUNT(c.id) AS nombre_chambre, SUM(tc.capacity) AS nombre_place
  FROM navire n
  LEFT JOIN chambre c ON n.id = c.id_navire
  LEFT JOIN type_chambre tc ON c.id_typechambre = tc.id
  GROUP BY n.id'
    );

    $results = $this->db->resultSet();

    if ($results) {
      return $results;
    } else {
      return false;
    }
  }
  public function deleteNavire($id)
  {
    $this->db->query('DELETE FROM `navire` WHERE id = :id');
    // Bind values
    $this->db->bind(':id', $id);
    if ($this->db->execute()) {
      return 'ok';
    } else {
      return 'error';
    }
  }
  // public function addnavire($shipName)
}
