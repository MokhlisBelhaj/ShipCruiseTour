<?php
class Port
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }
  public function getPorts()
  {
    $this->db->query('SELECT * FROM `port` ');

    $results = $this->db->resultSet();

    if ($results) {
      return $results;
    } else {
      return false;
    }
  }
  public function add($data)
  {
    $this->db->query('INSERT INTO `port`(`nom`, `pays`) VALUES (:portName,:country)');
    // Bind values
    $this->db->bind(':portName', $data['portName']);
    $this->db->bind(':country', $data['country']);
    // Execute
    if ($this->db->execute()) {
      return 'ok';
    } else {
      return 'error';
    }
  }
  public function deletePort($id)
  {
    $this->db->query('DELETE FROM `port` WHERE id = :id');
    // Bind values
    $this->db->bind(':id', $id);
    if ($this->db->execute()) {
      return 'ok';
    } else {
      return 'error';
    }
  }
}
