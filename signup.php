<?php
    session_start();
    include('connection_file.php');

    if (isset($_POST['signUp'])) {
        $email = $_POST['email'];
        $fullname = $_POST['full_name'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        if ($email=="" || $fullname=="" || $username=="" || $password=="") {
            $_SESSION['errorMessage'] = "All Fields require !";
        } elseif ($save_data =
                    mysqli_query($con, "INSERT INTO `users`(`full_name`, `email`, `username`, `password`) VALUES ('$fullname','$email','$username','$password')")
                ) {
            $_SESSION['successMessage'] = "Account created Successfully !!!";
            header('location:login.php');
        } else {
            $_SESSION['errorMessage'] = "Can't create an Account !";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('header.php'); ?>

    <title>Signup Page</title>

    <style>
        .signup-body {
            background-size:cover;
            background-image: url('images/backgrounds/signup_bg.jpg');
            background-size: cover;
        }
        .form-control {
            background-color:lightgray;
            font-size:15px;
        }
        .box {
            height:auto;
            margin:40px;
            padding: 5px;
            opacity: 0.8;
            background-color:white;
            border-radius: 10%;
            border: 1px solid black;
            opacity: 0.8;
        }
        .box:hover {
            opacity: 1.0;
        }
        @media only screen and (max-width: 768px) {
            .signup-body {
                background: none;
            }
        }
    </style>
</head>

<body class="signup-body">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-12">
                <div class="box border col-12 row p-4">
                    <div class="col-12 text-center bg-dark rounded">
                        <img src="images/backgrounds/main_logo.png">
                    </div>

                    <form action="signup.php" method="post">
                        <label class="col-12 mt-3">
                            <input type="email" name="email" class="form-control" placeholder="Enter your Email" required>
                        </label>

                        <label class="col-12 mt-3">
                            <input type="text" name="full_name" class="form-control" placeholder="Full Name" required>
                        </label>

                        <label class="col-12 mt-3">
                            <input type="text" name="username" class="form-control" placeholder="Username" required>
                        </label>

                        <label class="col-12 mt-3">
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                        </label>

                        <button type="submit"
                        class="logn-button btn btn-outline-info btn-block mt-3 col-12 btn-sm"
                        name="signUp"
                        >
                            Sign Up
                        </button>

                        <hr class="m-4">

                        <p class="text-dark col-12 text-center">
                            By signing up, you agree to our Terms Data Policy .
                        </p>

                    </form>
                </div>

                <div class="box border rounded col-12 text-center pt-3">
                    <p>Have an account ? <a href="login.php">Log In</a></p>
                </div>
            </div>
        </div>
    </div>

    <?php include('footer.php') ?>

    <?php
        if (isset($_SESSION["errorMessage"])) {
            $message = $_SESSION["errorMessage"] ;
            echo '<script type = "text/javascript">
                alertify.set("notifier","position","top-center");
                alertify.error("' . $message . '");
            </script>';
            unset($_SESSION["errorMessage"]);
        }
    ?>
</body>
</html>