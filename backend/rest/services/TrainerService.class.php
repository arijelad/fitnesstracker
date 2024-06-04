<?php

require_once __DIR__ . '/../dao/TrainerDao.class.php';

class TrainerService {
    private $trainer_dao;
    
    public function __construct() {
        $this->trainer_dao = new TrainertDao();
    }

    public function get_all_trainers() {
        return $this->trainer_dao->get_all_trainers();
    }

    public function get_trainer_by_id($trainer_id) {
        return $this->flight_dao->get_trainer_by_id($trainer_id);
    }

    public function add_trainer($trainer) {
        return $this->trainer_dao->add_trainer($trainer);
    }

    public function update_trainer($trainer_id, $trainer) {
        return $this->trainer_dao->edit_trainer($trainer_id, $trainer);
    }

    public function delete_trainer($trainer_id) {
        return $this->trainer_dao->delete_trainer_by_id($trainer_id);
    }
}
?>
