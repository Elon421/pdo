<?php
$host = 'localhost:3307';
$db = 'winkel';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
    echo "Connected to database winkel.";
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

if (isset($_POST['verstuur'])) {
    $product_naam = $_POST["product_naam"];
    $prijs_per_stuk = $_POST["prijs_per_stuk"];
    $omschrijving = $_POST["omschrijving"];

    $sql = "INSERT INTO producten (product_naam, prijs_per_stuk, omschrijving) VALUES (:product_naam, :prijs_per_stuk, :omschrijving)";
    $stmt = $pdo->prepare($sql);

    $data = [
        'product_naam' => $product_naam,
        'prijs_per_stuk' => $prijs_per_stuk,
        'omschrijving' => $omschrijving
    ];

    $stmt->execute($data);
}
$stmt = $pdo->query("SELECT * FROM producten");
$result = $stmt->fetchAll();

foreach ($result as $row) {
     echo "<p>Product: " . $row['product_naam'] . ", Prijs per stuk: " . $row['prijs_per_stuk'] . ", Omschrijving: " . $row['omschrijving'] . "</p>";
}
//meester, ik ben niet zeker of dit de opdracht was of niet. ik vond deze pdo opdracht een beetje onduidelijk
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="POST">
    <input type="text" name="product_naam" placeholder="productnaam" required> <br>

    <input type="text" name="prijs_per_stuk" placeholder="prijsperstuk" required> <br>

    <input type="text" name="omschrijving" placeholder="omschrijving" required> <br>
    
    <input type="submit" name="verstuur" value="verstuur">
</form>
</body>
</html>