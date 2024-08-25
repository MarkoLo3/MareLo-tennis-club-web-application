<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> MareLo tennis club | Tennis Life </title>
<!--LINK ALL STYLES HERE FOR ALL THE PAGES THAT HAVE NAVBAR INCLUDED-->
    <link rel="shortcut icon" href="assets/img/marelotennis-favicon-white.png" type="image/x-icon">
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/navstyle.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/courtreservation.css">
    <link rel="stylesheet" href="css/membership.css">
    <link rel="stylesheet" href="css/coachtable.css">
    <link rel="stylesheet" href="css/tournaments.css">
    <link href="css/aboutstyle.css" rel="stylesheet">
    <link href="css/twocards.css" rel="stylesheet">
</head>
<body>
    <nav id="nav" class="navbar navbar-expand-lg navbar-dark bg-dark" >
      <a class="navbar-brand" href="index.php">
        <img src="assets/img/marelotennis-favicon-green-color.png"  alt="Bootstrap" id="navbarLogo">
      </a>
      <div class="container-fluid">
          
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          
          <div class="collapse navbar-collapse " id="navbarNav">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="about.php">About us</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="membership.php">Membership</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="tournaments.php">Tournaments</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="training.php">Training</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="courtreservation.php">Court Reservation</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Facilities</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="#">Gallery</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="#">News</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="#">Contact Us</a>
                  </li>
                  <?php
                    if($_SESSION['userType'] == 'Admin')
                    {
                      ?>
                        <li class="nav-item">
                          <button type="button" onclick="window.location.href='createtournament.php'" class="nav-link btn btn-light">Create tournament</button>
                        </li>
                      <?php
                    }
                    if($_SESSION['userType'] == 'Coach')
                    {
                      ?>
                        <li class="nav-item">
                          <button type="button" onclick="window.location.href='createschedule.php'" class="nav-link btn btn-light">Create schedule</button>
                        </li>
                      <?php
                    }
                    if(isset($_SESSION['userID']))
                    {
                      ?>
                        <li class="nav-item">
                        <button type="button" onclick="window.location.href='logout.php'" class="nav-link btn btn-light">Logout</button>
                        </li>
                      <?php
                    }
                    else
                    {
                      ?>
                        <li class="nav-item">
                        <button type="button" onclick="window.location.href='login.php'" class="nav-link btn btn-light">Login</button>
                        </li>
                      <?php
                    }
                    
                  ?>
                  
              </ul> 
          </div>
      </div>
    
    </nav>
    