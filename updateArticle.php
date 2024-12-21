<?php
include 'Connexion/database.php';
session_start();

if (isset($_POST['id'], $_POST['title'], $_POST['content'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $imagePath = null;

    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $imagePath = 'uploads/' . basename($_FILES['image']['name']);
        if (!move_uploaded_file($_FILES['image']['tmp_name'], $imagePath)) {
            die("Failed to upload image.");
        }
    }

    if ($imagePath) {
        $query = "UPDATE article SET title = ?, content = ?, image = ? WHERE id = ?";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("sssi", $title, $content, $imagePath, $id);
    } else {
        $query = "UPDATE article SET title = ?, content = ? WHERE id = ?";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("ssi", $title, $content, $id);
    }

    if ($stmt->execute()) {
        header("Location: pageblog.php");
        exit;
    } else {
        echo "Error updating article: " . $connection->error;
    }
}
