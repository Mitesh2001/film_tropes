<?php
    session_start();
    include('connection_file.php');

    if (isset($_REQUEST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if ($username == "" || $password =="") {
            $_SESSION['loginError'] = 'Enter username & password';
        } elseif ($user = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM `users` WHERE username = '$username'"))) {
            if ($user['password'] != $password) {
                $_SESSION['loginError'] = 'Incorrect Password';
            } else {
                $_SESSION['user'] = $user;
                header('location:index.php');
            }
        } else {
            $_SESSION['loginError'] = 'Username or Password Incorrect';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('header.php'); ?>

    <title>Login</title>
    <style>
        .box {
            height:auto;
            margin:40px;
            padding: 5px;
            border-radius: 10%;
            opacity: 0.8;
            background-color:white;
            border: 2px solid black;
        }
        .box:hover {
            opacity: 1.0;
        }
        .form-control {
            background-color:lightgray;
            font-size:15px;
        }
        .login-body {
            background-image: url('images/backgrounds/main.jpg');
            background-size: cover;
        }
        @media only screen and (max-width: 768px) {
            .login-body {
                background:none;
            }
        }
    </style>
</head>

<body class="login-body">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-12">
                <div class="box col-12 row p-4">
                    <div class="col-12 text-center bg-dark rounded">
                        <img src="images/backgrounds/main_logo.png" alt="">
                    </div>

                    <form action="login.php" method="post">
                        <label class="col-12 mt-3">
                            <input type="text" name="username" class="form-control" placeholder="Username" required>
                        </label>

                        <label class="col-12 mt-3">
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                        </label>

                        <button type="submit" class="btn btn-outline-dark btn-block mt-3 col-12 btn-sm" name="login">
                            Login
                        </button>

                        <hr class="m-4">

                        <p class="text-primary text-center">
                            <a href="#">Forgot Password ?</a>
                        </p>

                    </form>

                </div>

                <div class="box rounded col-12 text-center pt-3">
                    <p>Don't have an account ? <a href="signup.php">Sign Up</a></p>
                </div>
            </div>
        </div>
    </div>

    <?php include('footer.php') ?>

    <?php
        if (isset($_SESSION["loginError"])) {
            $message = $_SESSION["loginError"] ;
            echo '<script type = "text/javascript">
                alertify.set("notifier","position","top-center");
                alertify.error("' . $message . '");
            </script>';
            unset($_SESSION["loginError"]);
        }
        if (isset($_SESSION["successMessage"])) {
            $message = $_SESSION["successMessage"] ;
            echo '<script type = "text/javascript">
            alertify.set("notifier","position","top-center");
            alertify.success("' . $message . '");
            </script>';
            unset($_SESSION["successMessage"]);
        }
    ?>
</body>
</html>