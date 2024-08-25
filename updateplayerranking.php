<?php
    @include 'config\connection.php';
    session_start();
    if($_SESSION['userType']!="Admin")
    {
        header('Location: index.php');
        exit();
    }

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $playerID = $_POST['playerID'];
        $newRanking = $_POST['ranking'];

        try{
            
            $sql = $pdo->prepare("UPDATE user set ranking = ? where userID = ?");
            $sql->execute([$newRanking,$playerID]);
            echo "<center><strong>Successfully updated!</strong></center>";
            sleep(1);
            header('Location: tournaments.php');
            
        }
        catch(PDOException $e)
        {
            echo "ERROR:".$e->getMessage();
        }
        finally {
            $pdo = null;
        }
        

        
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
<link rel="stylesheet" href="css/updateplayerranking.css">
<title>MareLo Tennis club | Update ranking</title>
</head>
<body>
   
    <div class="container">
        <a href="index.php"><img src="assets/img/marelotennis-high-resolution-logo-transparent.png" class="rounded mx-auto d-block" style="margin-left: 78px;   width: 225px; height: 225px;"></a>
        
        <form action="#" method="post">
            <div class="form-group">
                <label for="playerID">Player ID</label>
                <input type="number" min="1" id="playerID" name="playerID" required>
            </div>
            <div class="form-group">
                <label for="ranking">New ranking</label>
                <input type="number" id="ranking" name="ranking" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Update"> 
            </div>
        </form>
    </div>

    <script src="bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
</body>
</html>