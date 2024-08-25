
<?php
    @include 'config\connection.php';
    session_start();
    if($_SESSION['userType'] != 'Coach')
    {
        header('Location: index.php');
        exit();
    }
    try {
        if($_SERVER['REQUEST_METHOD'] == "POST")
        {
            
            $date = $_POST['date'];
            $startTime = $_POST['startTime'];
            $endTime = $_POST['endTime'];
            $courtNumber = $_POST['courtNumber'];
            $playerIDs = $_POST['players'];


            
            $stmt = $pdo->prepare("INSERT INTO trainingsession (trainingSessionID,trainerID, date, startTime, endTime, courtNumber) VALUES (default, :trainerID, :date, :startTime, :endTime, :courtNumber)");
            $stmt->execute([
                ':trainerID' => $_SESSION['userID'],
                ':date' => $date,
                ':startTime' => $startTime,
                ':endTime' => $endTime,
                ':courtNumber' => $courtNumber
            ]);
            $trainingSessionID = $pdo->lastInsertId();
            $stmt = $pdo->prepare("INSERT INTO playersession (trainingsessionID, userID) VALUES (:trainingSessionID, :playerID)");
            foreach ($playerIDs as $playerID) {
                $stmt->execute([
                    ':trainingSessionID' => $trainingSessionID,
                    ':playerID' => $playerID
                ]);
            }

            echo "<center><strong>New training schedule created successfully</strong></center>";
            header('Location: training.php');
        }
    }
    catch(PDOException $e)
    {
        echo 'ERROR:'.$e->getMessage();
        
    }



?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
<link rel="stylesheet" href="css/createscheduleform.css">
<title>MareLo Tennis club | Training schedule form</title>
</head>
<body>
   
    <div class="container">
        <a href="index.php"><img src="assets/img/marelotennis-high-resolution-logo-transparent.png" class="rounded mx-auto d-block" style="margin-left: 78px;   width: 225px; height: 225px;"></a>
        
        <form action="#" method="post">
            <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" id="date" name="date" required>
            </div>
            <div class="form-group">
                <label for="startTime">Start Time:</label>
                <input type="time" id="startTime" name="startTime" required>
            </div>
            <div class="form-group">
                <label for="endTime">End Time:</label>
                <input type="time" id="endTime" name="endTime" required>
            </div>
            <div class="form-group">
                <label for="endTime">Court number:</label>
                <input type="number" id="courtNumber" min="1" max="9" name="courtNumber" required>
            </div>
            <div class="form-group">
                <label for="playerID">Players:</label>
                
                    <?php
                        try{
                            $selectQuery = $pdo->query("SELECT userID, fullName FROM user WHERE userType ='Player'");
                            while($row = $selectQuery->fetch(PDO::FETCH_ASSOC))
                            {
                                echo '<input type="checkbox" name="players[]" value="' . htmlspecialchars($row['userID']) . '">' 
                                . htmlspecialchars(" ".$row['fullName'])."<br>";
                            }
                        }
                        catch(PDOException $e)
                        {
                            echo 'ERROR: '. $e->getMessage();
                        }
                        finally {
                            $pdo = null;
                        }
                        
                    ?>
                
            </div>
            <div class="form-group">
                <input type="submit" value="Create Schedule"> 
            </div>
        </form>
        
    </div>
    

    <script src="bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function(){
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1;
        var yyyy = today.getFullYear();
        
        if (dd < 10)
        dd = '0' + dd;
        if (mm < 10)
        mm = '0' + mm;
            
        today = yyyy + '-' + mm + '-' + dd;
        document.getElementById("date").setAttribute("min", today);

        const form = document.querySelector('form');
        form.addEventListener('submit', function(event) {
            let valid = true;

            const startTime = form.querySelector('input[name="startTime"]');
            const endTime = form.querySelector('input[name="endTime"]');

            if (startTime.value > endTime.value) {
                alert('Start time must be before end time!');
                endTime.focus();
                valid = false;
            }

            if (!valid) {
                event.preventDefault();
            }
        });
    });


    </script>
</body>
</html>
