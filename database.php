<?

    class Database
    {
        public $connection;

        public function __construct($config, $username='mysql', $password)
        {

            $dsn = 'mysql:' .http_build_query($config, '', ';'); //fitness.com?host=localhost

            //$dsn = "mysql:host={$config['host']};port={$config['port']};dbname={$config['dbname'];charset={$config['charset']}";

            $this -> connection = new PDO($dsn,$username,$password);
        }
        public function query($query)
        {
            $statement = $this->connection->prepare($query);
            $statement->execute();

            return $statement;
        }

    }
?>