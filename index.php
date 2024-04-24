<?

require 'Database.php';

//connection to a database

$config = require('config.php');

$db = new Database($config);
$users = $db->query("select * from users")->fetchAll(PDO::FETCH_ASSOC);

dd($users);

// Provera da li je zahtjev tipa POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Preuzimanje podataka iz POST zahteva
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password']; //

    $query = $db->prepare("INSERT INTO users (first_name, last_name, email, password) VALUES (:first_name, :last_name, :email, :password)");
    $query->execute([
        'first_name' => $firstName,
        'last_name' => $lastName,
        'email' => $email,
        'password' => password_hash($password, PASSWORD_DEFAULT) // Hashovanje lozinke
    ]);
}




?>