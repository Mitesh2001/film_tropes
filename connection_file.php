<?php
    $con = mysqli_connect('localhost', 'root', '12345678', 'film_tropes');
    if (!$con) {
        echo "Can't connect to the database";
    }
