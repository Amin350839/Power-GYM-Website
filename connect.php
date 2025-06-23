<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = sanitizeInput($_POST['name']);
    $email = sanitizeInput($_POST['email']);
    $class = sanitizeInput($_POST['class']);
    $message = sanitizeInput($_POST['message']);

    try {
        $stmt = $pdo->prepare("INSERT INTO contacts (name, email, class, message) VALUES (?, ?, ?, ?)");
        $stmt->execute([$name, $email, $class, $message]);
        
        // Redirection après succès
        header("Location: contact.php?success=1");
        exit();
    } catch (PDOException $e) {
        // Redirection avec erreur
        header("Location: contact.php?error=" . urlencode("Database error: " . $e->getMessage()));
        exit();
    }
} else {
    header("Location: contact.php");
    exit();
}
?>