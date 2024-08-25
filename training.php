<?php
    @include 'config\connection.php';
    session_start();

    if(!isset($_SESSION['userID']))
    {
        header('Location: login.php');
    }
   
    



    @include 'navbar.php';
    try
    {
        $sql = "
            SELECT 
                ts.trainingSessionID, 
                ts.date, 
                ts.startTime, 
                ts.endTime, 
                ts.courtNumber, 
                ps.userID, 
                u.fullName, 
                u.ranking,
                u.username
            FROM trainingsession ts
            LEFT JOIN playersession ps ON ts.trainingSessionID = ps.trainingSessionID
            LEFT JOIN user u ON ps.userID = u.userID
            ORDER BY ts.date, ts.startTime, ts.trainingSessionID";

        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $sessions = $stmt->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <div class="container mt-5">
            <center><h2><strong>Training Sessions</strong></h2></center>
        <?php
            $currentSessionID = null;
            foreach ($sessions as $session) {
                if ($currentSessionID != $session['trainingSessionID']) {
                    if ($currentSessionID != null) {
                        echo '</tbody></table>';
                    }
                    $currentSessionID = $session['trainingSessionID'];
                    if($_SESSION['userType'] == "Coach")
                    {
                        echo "<hr>";
                        
                        echo "<table class='coachTable'>";
                        echo "<tr><td><button type='button' class='deleteButton' onclick='window.location.href=\"deleteschedule.php?trainingSessionID={$currentSessionID}\"' class='nav-link btn btn-light'>Delete training session</button></td></tr>";
                        
                        echo "</table>";
                        
                        

                        
                    }
                    echo '<table class="table table-bordered mt-4 mb-4">';
                    echo '<thead class="thead-dark">';
                    echo '<tr>';
                    echo '<th>Training Session Date</th>';
                    echo '<th>Time</th>';
                    echo '<th>Court Number</th>';
                    echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';
                    echo '<tr>';
                    echo '<td>' . $session['date'] . '</td>';
                    echo '<td>' . $session['startTime'] . ' - ' . $session['endTime'] . '</td>';
                    echo '<td>' . $session['courtNumber'] . '</td>';
                    echo '</tr>';
                    echo '</tbody>';
                    echo '<thead class="thead-light">';
                    echo '<tr>';
                    echo '<th>Username</th>';
                    echo '<th>Full Name</th>';
                    echo '<th>Ranking points</th>';
                    echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';
                }
                echo '<tr>';
                echo '<td>' . $session['username'] . '</td>';
                echo '<td>' . $session['fullName'] . '</td>';
                echo '<td>' . $session['ranking'] . '</td>';
                echo '</tr>';
                
                
            }
            if ($currentSessionID != null) {
                
                echo '</tbody></table>';
            }
    }
    catch(PDOException $e)
    {
        echo "ERROR".$e->getMessage();
    }
    finally {
        $pdo = null;
    }
?>
    
    </div>

<?php 
    @include 'footer.php';
?>
