<?php

    require_once 'config\connection.php';

    try {
        $stmt = $pdo->prepare("SELECT membershipType, price, duration FROM membership");
        $stmt->execute();
        $memberships = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } 
    catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    finally {
        $pdo = null;
    }

    echo json_encode($memberships);
?>
