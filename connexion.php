<?php
session_start();


if (isset($_POST['username']) && isset($_POST['psw'])) {
    $host = 'mysql-db';
    $user = 'db_devuser';
    $pass = 'J&_9VZ8Tej9xk9%';
    $db = 'lab_database';

    $connexion= new mysqli($host,$user ,$pass,$db );

    if ($connexion->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $username = $_POST['username'];
    $typedPsw = $_POST['psw'];

    $connectRequete = "SELECT USR_ID,USR_PSW, USR_ADMIN FROM user WHERE USR_LOGIN='$username'";
    $resultVerif = $connexion->query($connectRequete);
    
    foreach ($resultVerif as $psw) {

        if (password_verify($typedPsw, $psw['USR_PSW']) == true) {
            $_SESSION['id'] = $psw['USR_ID'];
            $_SESSION["username"] = $username;
            $_SESSION["connected"] = true;
            $_SESSION['panier']=array();    
            if ($psw['USR_ADMIN'] == 1) {
                $_SESSION["admin"] = true;
                echo 'connected';
            } else {
                $_SESSION["admin"] = false;
                echo 'connected';
            }

        }else{
            echo "nope";
        }
    }
} else {
    echo "nope";
}