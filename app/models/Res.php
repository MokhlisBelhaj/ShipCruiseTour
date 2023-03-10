<?php
class Res
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function reservation($data)
    {
        $this->db->query('INSERT INTO `reservation`(`date_depart`, `prix_reservation`, `user_id`, `id_croisier`, `type_ch`, `id_chambre`) VALUES (:date_depart,:prix_reservation,:user_id,:id_croisier,:type_ch,:id_chambre)');
        // Bind values
        $this->db->bind(':date_depart', $data['date_depart']);
        $this->db->bind(':prix_reservation', $data['prix']);
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':id_croisier', $data['id']);
        $this->db->bind(':type_ch', $data['chambreType']);
        $this->db->bind(':id_chambre', $data['chambre']);
        // Execute
        if ($this->db->execute()) {
            return 'ok';
        } else {
            return 'error';
        }
    }
    public function getreservation($id)
    {
        $this->db->query(
            // 'SELECT c.name AS nom_croisiere, c.iténairaire, c.image, c.nombre_nuit, c.date_depart, r.prix_reservation, n.nom AS nom_navire, ch.num_chambre, p.nom AS nom_port FROM reservation r JOIN croisier c ON r.id_croisier = c.id JOIN navire n ON c.ship_id = n.id JOIN chambre ch ON r.id_chambre = ch.id JOIN port p ON c.id_port_depart = p.id WHERE r.user_id = 
           'SELECT r.id AS id_reservation, c.name AS nom_croisiere, c.image, c.nombre_nuit, c.date_depart, r.prix_reservation, n.nom AS nom_navire, ch.num_chambre, p.nom AS nom_port FROM reservation r JOIN croisier c ON r.id_croisier = c.id JOIN navire n ON c.ship_id = n.id JOIN chambre ch ON r.id_chambre = ch.id JOIN port p ON c.id_port_depart = p.id WHERE r.user_id =:id;'
        );
        $this->db->bind(':id', $id);

        $results = $this->db->resultSet();

        if ($results) {
            return $results;
        } else {
            return [];
        }
    }
    public function deletereserve($id){
        $this->db->query('DELETE FROM `reservation` WHERE `id`=:id');
        // Bind values
        $this->db->bind(':id', $id);
        // Execute
        if ($this->db->execute()) {
            return 'ok';
        } else {
            return 'error';
        }
    }
}
