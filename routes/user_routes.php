<?php
// routes/user_routes.php

function addUser($db, $firstName, $lastName, $email, $password) {
    $query = $db->prepare("INSERT INTO users (first_name, last_name, email, password) VALUES (:first_name, :last_name, :email, :password)");
    $query->execute([
        'first_name' => $firstName,
        'last_name' => $lastName,
        'email' => $email,
        'password' => password_hash($password, PASSWORD_DEFAULT)
    ]);
    return $query->rowCount();
}

function updateUser($db, $userId, $firstName, $lastName, $email, $password) {
    $query = $db->prepare("UPDATE users SET first_name = :first_name, last_name = :last_name, email = :email, password = :password WHERE id = :user_id");
    $query->execute([
        'user_id' => $userId,
        'first_name' => $firstName,
        'last_name' => $lastName,
        'email' => $email,
        'password' => password_hash($password, PASSWORD_DEFAULT)
    ]);
    return $query->rowCount();
}

function deleteUser($db, $userId) {
    $query = $db->prepare("DELETE FROM users WHERE id = :user_id");
    $query->execute(['user_id' => $userId]);
    return $query->rowCount();
}

function handleUserRoutes($db) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['action'])) {
        switch ($_GET['action']) {
            case 'add':
                echo addUser($db, $_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['password']);
                break;
            case 'update':
                echo updateUser($db, $_POST['user_id'], $_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['password']);
                break;
            case 'delete':
                // Pretpostavljamo da je user_id prosleđen kao POST parametar
                echo deleteUser($db, $_POST['user_id']);
                break;
            // Dodajte više slučajeva po potrebi
        }
    }
}
