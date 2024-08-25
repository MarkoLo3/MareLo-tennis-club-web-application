<?php
    @include 'config\connection.php';
    session_start();
   
    if ($_SESSION['userType'] != 'Coach') {
        echo 'You do not have permission to perform this action.';
        exit();
    }
    if (!isset($_GET['trainingSessionID'])) {
        echo 'Invalid tournament ID.';
        exit();
    }
    
    $trainingSessionID = $_GET['trainingSessionID'];

    try {
        $pdo->beginTransaction();
        
        $sql = "DELETE FROM playersession WHERE trainingSessionID = :trainingSessionID";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':trainingSessionID' => $trainingSessionID]);

        $sql = "DELETE FROM trainingSession WHERE trainingSessionID = :trainingSessionID";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':trainingSessionID' => $trainingSessionID]);
        
        
        
        $pdo->commit();
        
        sleep(1);

        header('Location: training.php');
        
        
        
        exit();
    }
    catch (PDOException $e) {
        $pdo->rollBack();
        echo 'Error: ' . $e->getMessage();
    }
    finally {
        $pdo = null;
    }


?>