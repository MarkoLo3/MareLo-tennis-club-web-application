<?php
    @include 'config\connection.php';

    session_start();

    if (!isset($_SESSION['userID'])) {
        echo 'You must be logged in to apply for a tournament.';
        exit();
    }
    
    if (!isset($_GET['tournamentID'])) {
        echo 'Invalid tournament ID.';
        exit();
    }

    if($_SESSION['userType'] != "Player")
    {
        echo "Only players can participate in tournaments!";
        exit();

    }
    $userID = $_SESSION['userID'];
    $tournamentID = $_GET['tournamentID'];

    $sql = "INSERT INTO tournamentplayers (playerID, tournamentID) VALUES (:playerID, :tournamentID)";
    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute([':playerID' => $userID, ':tournamentID' => $tournamentID]);
        echo 'You have successfully applied for the tournament.';
        
        
    } 
    catch (PDOException $e) {
        if ($e->getCode() == 23000) {
            echo 'You have already applied for this tournament.';
        }
        else {
            echo 'Error: ' . $e->getMessage();
        }
    }
    finally {
        $pdo = null;
    }
?>
