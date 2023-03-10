<?php
class croisier
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
        $today = date("Y-m-d");
        $this->db->query("DELETE FROM `croisier` WHERE `date_depart`< '$today'");
        $this->db->execute();
    }
    public function getCroisierById($id)
    {
        $this->db->query(
            'SELECT `id`,`name`, `ship_id`, `prix`, `image`, `iténairaire`, `nombre_nuit`, `date_depart`, `id_port_depart` FROM `croisier` WHERE id=:id'
        );
        $this->db->bind(':id', $id);

        $results = $this->db->resultSet();

        if ($results) {
            return $results;
        } else {
            return false;
        }
    }
    
    
    public function getCroisier()
    {
        $this->db->query(
            'SELECT `id`,`name`, `ship_id`, `prix`, `image`, `iténairaire`, `nombre_nuit`, `date_depart`, `id_port_depart` FROM `croisier`'
        );

        $results = $this->db->resultSet();

        if ($results) {
            return $results;
        } else {
            return false;
        }
    }
  
    public function getCroisierbyfiltre($filtre) {
        $query = 'SELECT `id`, `name`, `ship_id`, `prix`, `image`, `iténairaire`, `nombre_nuit`, `date_depart`, `id_port_depart` FROM `croisier` WHERE `id_port_depart`=:port OR `ship_id`=:navire OR MONTH(`date_depart`)=:date';
        $this->db->query($query);
        $this->db->bind(':port', $filtre['port']);
        $this->db->bind(':navire', $filtre['navire']);
        $this->db->bind(':date', $filtre['date']);
        return $this->db->resultSet();
    } 
    public function addCroisier($datta)
    {
        $this->db->query('INSERT INTO `croisier`(`ship_id`, `prix`, `image`,  `nombre_nuit`, `date_depart`, `id_port_depart`, `name`)
         VALUES ( :ship_id,:prix, :image, :nombre_nuit, :date_depart, :id_port_depart,:name)');
        // Bind values
        $this->db->bind(':ship_id', $datta['navireId']);
        $this->db->bind(':prix', $datta['Price']);
        $this->db->bind(':image', $datta['Image']);
        $this->db->bind(':nombre_nuit', $datta['NightsNumber']);
        $this->db->bind(':date_depart', $datta['StartingDate']);
        $this->db->bind(':id_port_depart', $datta['portID']);
        $this->db->bind(':name', $datta['CruiseName']);
        // Execute
        if ($this->db->execute()) {
            return 'ok';
        } else {
            return 'error';
        }
    }
    public function deletecroisier($id)
    {
      $this->db->query('DELETE FROM `croisier` WHERE id = :id');
      // Bind values
      $this->db->bind(':id', $id);
      if ($this->db->execute()) {
        return 'ok';
      } else {
        return 'error';
      }
    }
}
