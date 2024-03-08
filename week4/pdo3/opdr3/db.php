<?php 

class db  {
    private $dbh;
    protected $stmt;

    public function __construct ($db, $host = "locahost", $user = "root", $pass = "")
    {
        try {
            $this->dbh = new PDO("mysql:host=$host;dbname=$db;", $user, $pass);
            $this->dbh->setAttribute(PDO::ATTR-ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection error: " . $e->getMessage());
        }
    }
}

public function run($pdo, $sql, $args = NULL)
{
    $stmt = $pdo->prepare($sql);
    $stmt->execute($args);
    return $stmt;
}

$myDb = new DB ('dbname');
?>