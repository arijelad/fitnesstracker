<?php
$username = $_POST['username'];
$password = $_POST['password'];


if ($username == 'admin' && $password == 'admin123') {
    echo "Login successful";
} else {
    echo "Login failed, please try again later.";
}
?>