<?php
include 'db4.php';

try {
    $db = new Database();
    $db->deleteUser($_GET['id']);
    header("Location:home.php");

} catch (Exception $e) {
    echo "Error " . $e->getMessage();
}

?>