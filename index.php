<?php
    session_start();

    if (!$_SESSION['user']) {
        header('location:login.php');
    }

    include('connection_file.php');

    if (isset($_POST["searchResult"])) {
        if (!$_POST["search-keyword"] == "") {
            $search = $_POST['search-keyword'];
            $data = mysqli_query(
                $con,
                "select * from movies where movie_name like '%$search%'"
            );

            if (mysqli_num_rows($data) < 1) {
                $_SESSION['errorMessage'] = "No movies found for this keyword !";
                $data = mysqli_query($con, "SELECT * FROM `movies` ");
            }
        } else {
            $_SESSION['errorMessage'] = "Please Enter any keyword for Movie !";
            $data = mysqli_query($con, "SELECT * FROM `movies` ");
        }
    } else {
        $data = mysqli_query($con, "SELECT * FROM `movies` ");
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('header.php') ?>
    <title>Welcome Home</title>
    <style>
        .navbar{
            background: rgb(2,1,7);
            background: linear-gradient(158deg, rgba(2,1,7,1) 0%, rgba(115,111,250,1) 78%, rgba(0,0,0,1) 96%);
        }
    </style>
</head>
<body>
    <nav class="navbar p-3 navbar-expand-md navbar-dark">
        <a href="index.php" class="navbar-brand col-md-4 text-center">
            <img src="images/backgrounds/main_logo.png">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse col-md-8 text-center" id="collapsibleNavbar">
            <form class="form-inline col-md-6 text-center" action="index.php" method="POST">
                <input type="text" list="movies" autocomplete="off" class="form-control mr-sm-2" name="search-keyword" placeholder="Search Movie" required>
                <datalist id="movies">
                <?php
                    $selectuserMovies = mysqli_query($con, "SELECT * FROM `movies`");
                    while ($moviedata = mysqli_fetch_array($selectuserMovies)) {
                        ?>
                    <option value = "<?php echo $moviedata['movie_name'] ?>"></option>";
                <?php
                    }
                ?>
                    </datalist>
                <button class="btn btn-outline-light my-2 my-sm-0 " type="submit" name="searchResult">
                    <i class="fa fa-search"></i>
                </button>
            </form>
            <ul class="navbar-nav col-md-6">
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['user']['full_name'] ?></a>
                    <div class="dropdown-menu">
                        <a href="logout.php?logout" class="dropdown-item">
                            <i class="fas fa-sign-out-alt"></i> Sign Out
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="justify-content-center row my-4">
            <?php
                if (mysqli_num_rows($data) == 0) {
                    echo '<p class= my-2 >No Movies Found</p>';
                }
                while ($selected_data = mysqli_fetch_array($data)) {
                    ?>
            <div class="col-lg-2 col-sm-4 col-xs-6 mx-lg-3">
                <img src="<?php echo 'images/posts/'.$selected_data['movie_image'] ?>"
                    class="poster col-12"
                >
                <div class=" text-center col-12">
                    <button class="btn btn-secondary my-2 btn-block rounded">
                        <?php echo $selected_data['movie_name'] ?>
                    </button>
                </div>
            </div>
            <?php
                }
            ?>
        </div>
    </div>
    <div class="container-fluid text-center bg-dark text-light p-3 small-text footer">
        <p>
            Download And Watch Movies Online For Free © 2020 All Rights Reserved
        </p>
        <p>
            <Strong>
            Disclaimer - All My Post are Free Available On INTERNET Posted By Somebody Else<br>
            I'm Not VIOLATING Any COPYRIGHTED LAW. If Anything Is Against LAW, Please Notify Us
            </Strong>
        </p>
    </div>
    <?php include('footer.php') ?>

    <?php
        if (isset($_SESSION["errorMessage"])) {
            $message = $_SESSION["errorMessage"] ;
            echo '<script type = "text/javascript">
                alertify.set("notifier","position","top-center");
                alertify.alert("' . $message . '");
            </script>';
            unset($_SESSION["errorMessage"]);
            header('location:index.php');
        }
    ?>

</body>
</html>
