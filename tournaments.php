<?php
    @include 'config\connection.php';
    session_start();
    if(!isset($_SESSION['userID']))
    {
        header('Location: login.php');
    }
    
?>




<?php
    @include 'navbar.php';

    $sql = "SELECT userID, fullName, dateOfBirth, gender, ranking FROM user where userType ='Player' ORDER BY ranking DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>

<div class="container mt-5">
    <hr>
    <center>
        <h1><strong>Club ranking</strong></h1>
    </center>
    <hr>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Full Name</th>
                <th>Date of Birth</th>
                <th>Gender</th>
                <th>Ranking</th>
                <?php
                if($_SESSION['userType']=="Admin")
                {
                    echo "<th>Player ID</th>";
                }
                ?>
            </tr>
        </thead>
        <tbody>
            <?php
                $tableNumber = 1;
                foreach ($users as $user) {
                    echo '<tr>';
                    echo '<td>' . $tableNumber . '</td>';
                    echo '<td>' . htmlspecialchars($user['fullName']) . '</td>';
                    echo '<td>' . htmlspecialchars($user['dateOfBirth']) . '</td>';
                    echo '<td>' . htmlspecialchars($user['gender']) . '</td>';
                    echo '<td>' . htmlspecialchars($user['ranking']) . '</td>';
                    if($_SESSION['userType'] =="Admin")
                    {
                        echo '<td>'. htmlspecialchars($user['userID']) . '</td>';
                    }
                    echo '</tr>';
                    $tableNumber++;
                }
            ?>
            <?php
                if($_SESSION['userType']=="Admin")
                {
                    ?>
                        <tr>
                            <td colspan="6" align="center">
                            <button type="button" onclick="window.location.href='updateplayerranking.php'" class="nav-link btn btn-light">Update player ranking</button> 
                            </td>
                        </tr>
                    <?php
                }
            ?>
        </tbody>
    </table>
    <hr>
    <center>
        <h1><strong>Upcomming tournaments</strong></h1>
    </center>
    <hr>
</div>
<?php
    $sql = "SELECT tournamentID, tournamentName, startDate, endDate, location FROM tournament";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $tournaments = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<div class="container mt-5">
    <div class="row">
        <?php
            foreach ($tournaments as $tournament) {
                echo '<div class="col-md-4 mb-4 tournament-card">';
                echo '<div class="card tournament-card-body">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title tournament-card-title">' . htmlspecialchars($tournament['tournamentName']) . '</h5>';
                echo '<hr>';
                echo '<p class="card-text tournament-card-text">Tournament from ' . htmlspecialchars($tournament['startDate']) . ' to ' . htmlspecialchars($tournament['endDate']) . '.</p>';
                echo '</div>';
                echo '<ul class="list-group list-group-flush tournament-list-group">';
                echo '<li class="list-group-item tournament-list-group-item">Location: ' . htmlspecialchars($tournament['location']) . '</li>';
                echo '</ul>';
                echo '<div class="card-body tournament-card-body-button">';
                echo "<button class='tournament-button-apply' name='btnApply' type='button' onclick='window.location.href=\"applyfortournament.php?tournamentID=" . htmlspecialchars($tournament['tournamentID']) . "\"' class='btn btn-dark'>Apply for tournament</button>";
                
                echo '</div>';
                echo '</div>';
                if($_SESSION['userType'] == "Admin") {
                    echo "<div class='container center'>";
                    echo "<button class='tournament-button-delete' name='btnDelete' type='button' onclick='deleteTournament(" . htmlspecialchars($tournament['tournamentID']) . ")' class='btn btn-light'>Delete tournament</button>";
                    echo "</div>";
                }
                echo '</div>';
                $pdo=null;
            }
        ?>
    </div>
</div>
<script>
    
    function deleteTournament(tournamentID) {
        if (confirm('Are you sure you want to delete this tournament?')) {
            window.location.href = 'deletetournament.php?tournamentID=' + tournamentID;
        }
    }

</script>






<?php
    @include 'footer.php';
?>