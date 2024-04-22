<?php

require_once __DIR__ . '/BaseDao.class.php';

class PatientDao extends BaseDao {
    public function __construct() {
        parent::__construct('patients');
    }
     public function add_user($user){
     /*

            $query = "INSERT INTO users (email, password)
                      VALUES(:email, :password)";
            $statement = $this->connection->prepare($query);
            $statement->execute($user);
            $user['userId'] = $this->connection->lastInsertId();
            return $user;
     */
     return $this->insert('users', $user);

     }
     public function count_users_paginated($search) {
             $query = "SELECT COUNT(*) AS count
                       FROM users
                       WHERE LOWER(email) LIKE CONCAT('%', :search, '%');";
             return $this->query_unique($query, [
                 'search' => $search
             ]);
         }

         public function get_users_paginated($offset, $limit, $search, $order_column, $order_direction) {
             $query = "SELECT *
                       FROM users
                       WHERE LOWER(email) LIKE CONCAT('%', :search, '%')
                       ORDER BY {$order_column} {$order_direction}
                       LIMIT {$offset}, {$limit}";
             return $this->query($query, [
                 'search' => $search
             ]);
         }

 }