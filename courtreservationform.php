<?php
   session_start();
   @include 'config/connection.php';
   
   if(isset($_SESSION['userID'])) {
   
       if($_SERVER['REQUEST_METHOD'] == "POST") {
           try {
               $courtNum = $_POST['courtNum'];
               $date = $_POST['date'];
               $startTime = $_POST['startTime'];
               $endTime = $_POST['endTime'];
   
               // Fetch all reservations for the given date
               $query = $pdo->prepare('SELECT * FROM courtreservation WHERE reservationDate = ? AND courtNumber = ?');
               $query->execute([$date, $courtNum]);
               $reservations = $query->fetchAll(PDO::FETCH_ASSOC);
   
               $isReserved = false;
   
               foreach($reservations as $reservation) {
                   if(!($endTime <= $reservation['startTime'] || $startTime >= $reservation['endTime'])) {
                       $isReserved = true;
                       break;
                   }
               }
   
               if(!$isReserved) {
                   $insertQuery = $pdo->prepare('INSERT INTO courtreservation VALUES (default, ?, ?, ?, ?,?)');
                   $insertQuery->execute([$_SESSION['userID'], $courtNum, $date, $startTime, $endTime]);
                   $message = "Court reserved!";
                   echo "<center><h2>{$message}</h2></center>";
               } 
               else {
                   echo "<center><h2>That date and time is reserved!</h2></center>";
               }
   
           } 
           catch(Exception $e) {
               echo "ERROR: {$e->getMessage()}";
            }
            finally {
                $pdo = null;
            }
       }
   
   }
?>









<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
<link rel="stylesheet" href="css/courtreservationform.css">
<title>MareLo Tennis club | Reservation</title>
</head>
<body>
   
    <div class="container">
        <a href="index.php"><img src="assets/img/marelotennis-high-resolution-logo-transparent.png" class="rounded mx-auto d-block" style="margin-left: 78px;   width: 225px; height: 225px;"></a>
        
        <form action="#" method="post">
            <div class="form-group">
                <label for="courtNum">Court Number</label>
                <input type="number" min="1" max="9" id="courtNum" name="courtNum" required>
            </div>
            <div class="form-group">
                <label for="password">Reservation date</label>
                <input type="date" id="date" name="date" required>
            </div>
            <div class="form-group">
                <label for="startTime">Start time</label>
                <input type="time" id="startTime" name="startTime" required>
            </div>
            <div class="form-group">
                <label for="endTime">End time</label>
                <input type="time" id="endTime" name="endTime" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Reserve"> 
            </div>
        </form>
    </div>

    <script src="bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
    <script src="js/courtreservation.js"></script>
</body>
</html>
