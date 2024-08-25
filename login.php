<?php
    include 'config\connection.php';

    session_start();
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $form_username = $_POST['username'];
        $form_password = $_POST['password'];
        try {
            $stmt = $pdo->prepare('SELECT * FROM user WHERE username = ? OR email = ?');

            $stmt->execute([$form_username, $form_username]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if($user)
            {
                if(password_verify($form_password, $user['password']))
                {
                    $_SESSION['userID'] = $user['userID'];
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['fullName'] = $user['fullName'];
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['dateOfBirth'] = $user['dateOfBirth'];
                    $_SESSION['gender'] = $user['gender'];
                    $_SESSION['userType'] = $user['userType'];
                    $_SESSION['ranking'] = $user['ranking'] || null;
                    header('Location: index.php');
                    exit();
                }
                else
                {
                    $error = "Wrong password inputed, try again";
                }
            }
            else
            {
                $error = "Invalid username";
            }
        
        }
        catch(PDOException $e)
        {
            echo "ERRO:" .$e->getMessage();
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
<link rel="stylesheet" href="css/loginstyle.css">
<title>MareLo Tennis club | Login</title>
</head>
<body>
   
    <div class="container">
        <a href="index.php"><img src="assets/img/marelotennis-high-resolution-logo-transparent.png" class="rounded mx-auto d-block" style="margin-left: 78px;   width: 225px; height: 225px;"></a>
        
        <form action="#" method="post">
            <div class="form-group">
                <label for="username">Username or Email</label>
                <input placeholder="Enter your username or email" type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input placeholder="Enter your password" type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Login"> 
            </div>
            <?php
                if(isset($error))
                {
                    echo "<p>".$error."</p>";
                }
            ?>
        </form>
        <p class="text-center text-small mt-2">Don't have an account? <a name="signUp" href="register.php">Sign up</a></p>
    </div>

    <script src="bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
</body>
</html>
