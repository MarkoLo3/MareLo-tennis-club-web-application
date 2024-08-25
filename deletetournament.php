<?php
    @include 'config\connection.php';
    session_start();

    if ($_SESSION['userType'] != 'Admin') {
        echo 'You do not have permission to perform this action.';
        exit();
    }
    if (!isset($_GET['tournamentID'])) {
        echo 'Invalid tournament ID.';
        exit();
    }
    
    $tournamentID = $_GET['tournamentID'];

    try {
        $pdo->beginTransaction();

        $sql = "DELETE FROM tournamentplayers WHERE tournamentID = :tournamentID";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':tournamentID' => $tournamentID]);
        
        
        $sql = "DELETE FROM tournament WHERE tournamentID = :tournamentID";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':tournamentID' => $tournamentID]);
        
        
        $pdo->commit();
        
        echo 'Tournament and associated players deleted successfully.';
        sleep(1);
        header('Location: tournaments.php');
    }
    catch (PDOException $e) {
        $pdo->rollBack();
        echo 'Error: ' . $e->getMessage();
    }
    finally {
        $pdo = null;
    }


?>