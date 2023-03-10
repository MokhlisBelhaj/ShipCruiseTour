<?php
class iténairaire
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function getiténairaire($id)
    {
        $this->db->query(
            "SELECT po.nom
            FROM `iténairaire` it 
            JOIN `port` po ON it.port = po.id 
            WHERE it.id_croisier = {$id}"
            // "SELECT po.nom, po.pays
            // FROM `iténairaire` it 
            // JOIN `port` po ON it.port = po.id 
            // WHERE it.id_croisier = '39'"
        );

        $results = $this->db->resultSet();

        if ($results) {
            return $results;
        } else {
            return false;
        }
    }
    public function addIténairaire($data, $CruiseName)
    {
        $this->db->query('INSERT INTO `iténairaire` (`number`, `port`, `id_croisier`)
                 VALUES (:number, :port, (SELECT `id` FROM `croisier` WHERE `name` = :nom))');
        // Bind values
        $this->db->bind(':number', $data['iténairairePortNum']);
        $this->db->bind(':port', $data['iténairairePort']);
        $this->db->bind(':nom', $CruiseName);
        // Execute
        if ($this->db->execute()) {
            return 'ok';
            die("ok");
        } else {
            return 'error';
        }
    }
}
