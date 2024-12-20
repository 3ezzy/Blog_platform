<?php
include 'Connexion/database.php';

if (!isset($_GET['id'])) {
    die("Article ID is required.");
}

$id = $_GET['id'];

$query = "DELETE FROM article WHERE id = ?";
$stmt = $connection->prepare($query);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    header("Location: pageblog.php");
    exit;
} else {
    echo "Error deleting article: " . $connection->error;
}
?>
    