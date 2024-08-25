<?php

    include 'config\connection.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $fullName = $_POST['fullName'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $dateOfBirth = $_POST['dateOfBirth'];
        $gender = $_POST['gender'];
        $userType = $_POST['userType'];
        $membershipID = $_POST['membership'];
  
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
     
        try {
            $pdo->beginTransaction();
            $stmt = $pdo->prepare("INSERT INTO user (fullName, email, username, password, dateOfBirth, gender, userType) VALUES (:fullName, :email, :username, :password, :dateOfBirth, :gender, :userType)");
            $stmt->execute([
                ':fullName' => $fullName,
                ':email' => $email,
                ':username' => $username,
                ':password' => $hashedPassword,
                ':dateOfBirth' => $dateOfBirth,
                ':gender' => $gender,
                ':userType' => $userType
            ]);
            
            $startDate = new DateTime('now');
            $endDate = new DateTime('now');
            switch($membershipID)
            {
                case 1:
                    $endDate = $endDate->modify('+1 month');
                    break;
                case 2:
                    $endDate = $endDate->modify('+3 month');
                    break;
                case 3:
                    $endDate = $endDate->modify('+6 month');
                    break;
                case 4:
                    $endDate = $endDate->modify('+12 month');
                    break;
                case 5:
                    $endDate = null;
                    break;
            }
            // dodati u playermembership tabelu.
            $playerID = $pdo->lastInsertId();
            $stmt = $pdo->prepare("INSERT INTO playermembership (startDate, membershipID, endDate, playerID) VALUES (:startDate, :membershipID, :endDate, :playerID)");

            if($endDate==null)
                $endDateString = "";                
            else
                $endDateString =$endDate->format('Y-m-d');

            $stmt->execute([
                ':startDate' => $startDate->format('Y-m-d'),
                ':membershipID' => $membershipID,
                ':endDate' => $endDateString, //
                ':playerID' => $playerID
            ]);

            $pdo->commit();
            sleep(0.5);
            header("location:login.php");
        } 
        catch (PDOException $e) {
            $error = "Error: " . $e->getMessage();
            echo $error;
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
<link rel="stylesheet" href="css/registerstyle.css">
<title>MareLo Tennis club | Sign Up</title>
</head>
<body>

    <div class="container">
        <a href="index.php"><img src="assets/img/marelotennis-high-resolution-logo-transparent.png" class="rounded mx-auto d-block" style="margin-left: 78px; width: 225px; height: 225px;"></a>
        
        <form action="#" method="post">
            <div class="form-group">
                <label for="fullName">Full Name</label>
                <input placeholder="Enter Full Name" type="text" id="fullName" name="fullName" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input placeholder="Enter Email" type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input placeholder="Enter Username" type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input placeholder="Enter your password" type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="dateOfBirth">Date of Birth</label>
                <input placeholder="Enter Date of Birth" type="date" id="dateOfBirth" name="dateOfBirth" required>
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
                <select id="gender" name="gender" required>
                    <option value="">Select Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="gender">Membership option</label>
                <select id="membership" name="membership" required>
                    <option value="">Select membership option</option>
                    <option value="1">Basic</option>
                    <option value="2">Standard</option>
                    <option value="3">Premium</option>
                    <option value="4">Annual</option>
                    <option value="5">No membership</option>
                </select>
            </div>
            <div class="form-group">
                <label for="gender">User type</label>
                <select id="userType" name="userType" required>
                    <option value="">Select type of account</option>
                    <option value="Player">Player</option>
                    <option value="Coach">Coach</option>
                </select>
            </div>
            <?php
                if (isset($error)) {
                    echo "<small style='color: red; font-weight: bold;'>" . $error . "</small>";
                }
            ?>
            <div class="form-group">
                <input type="submit" value="Sign Up"> 
            </div>
        </form>
        <p class="text-center text-small mt-2">Already have an account? <a name="login" href="login.php">Login</a></p>
    </div>
    <script src="js/register.js"></script>
</body>


</html>
