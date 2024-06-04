<?

require 'Database.php';
require_once 'routes/user_routes.php';

$config = require('config.php');


//connection to a database
$db = new Database($config);
$users = $db->query("select * from users")->fetchAll(PDO::FETCH_ASSOC);

dd($users);

//POZOVI SVE METODE RUTE NAD USERIMA ZA REGISTRACIJU I LOGIN

handleUserRoutes($db);



?>