<?php

require_once __DIR__ . '/BaseDao.class.php';

class FlightDao extends BaseDao {
    public function __construct() {
        parent::__construct('trainers');
    }

    public function get_all_trainers() {
        $query = "SELECT * FROM trainers";
        return $this->query($query, []);
    }

    public function get_trainer_by_id($trainer_id) {
        return $this->query_unique(
            "SELECT * FROM trainer WHERE trainer_id = :trainer_id", 
            ['flight_id' => $flight_id]
        );
    }

    public function add_trainer($trainer) {
        return $this->insert('trainers', $trainer);
    }

    public function edit_trainer($trainer_id, $trainer) {
        $query = "UPDATE trainers SET 
            trainer_id = :airline_id,
            name = :name,
            surname = :surname,
            description = :description,
            status = :status
            WHERE trainer_id = :trainer_id";
            
        $this->execute($query, [
            'trainer_id' => $flight['trainer_id'],
            'name' => $flight['name'],
            'surname' => $flight['surname'],
            'description' => $flight['description'],
            'status' => $flight['status']
        ]);
    }

    public function delete_trainer_by_id($trainer_id) {
        $query = "DELETE FROM trainers WHERE trainer_id = :trainer_id";
        $this->execute($query, ['trainer_id' => $trainer_id]);
    }
}
?>
