
<?php
    @include 'config\connection.php';
    session_start();
    if($_SESSION['userType'] != "Admin")
    {
        header('Location: index.php');
    }
    if($_SERVER['REQUEST_METHOD']=="POST")
    {
        try
        {
            $tournamentName = $_POST['tournamentName'];
            $startDate = $_POST['startDate'];
            $endDate = $_POST['endDate'];
            $location = $_POST['location'];
            $sql = $pdo->prepare('INSERT INTO tournament values (default,?,?,?,?)');
            $sql->execute([$tournamentName,$startDate,$endDate,$location]);
            if($sql)
                echo "<center><strong>Uspesno!</strong></center>";
            else
                echo "<center><strong>Doslo je do greske!</strong></center>";
            sleep(1);
            header('Location: tournaments.php');
        }
        catch(PDOException $e)
        {
            echo "ERROR:" . $e->getMessage();
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
<link rel="stylesheet" href="css/createtournament.css">
<title>MareLo Tennis club | Tournament form</title>
</head>
<body>
   
    <div class="container">
        <a href="index.php"><img src="assets/img/marelotennis-high-resolution-logo-transparent.png" class="rounded mx-auto d-block" style="margin-left: 78px;   width: 225px; height: 225px;"></a>
        
        <form action="#" method="post">
            <div class="form-group">
                <label for="name">Tournamnet name:</label>
                <input type="text" id="tournamentName" name="tournamentName" required>
            </div>
            <div class="form-group">
                <label for="startTime">Start date:</label>
                <input type="date" id="startDate" name="startDate" required>
            </div>
            <div class="form-group">
                <label for="endTime">End date:</label>
                <input type="date" id="endDate" name="endDate" required>
            </div>
            <div class="form-group">
                <label for="endTime">Location:</label>
                <input type="text" id="location" name="location" required>
            </div>
            
            <div class="form-group">
                <input type="submit" value="Create Tournament"> 
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
        document.getElementById("startDate").setAttribute("min", today);

        const form = document.querySelector('form');
        form.addEventListener('submit', function(event) {
            let valid = true;

            const startTime = form.querySelector('input[name="startDate"]');
            const endTime = form.querySelector('input[name="endEnd"]');

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
