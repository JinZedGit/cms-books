<?php 
session_start();
require ('connection.php');

$user = $_POST['login_user'];
$pass = $_POST['login_pass'];

$query = "SELECT * FROM users WHERE user_login = '$user'";
$login_query = mysqli_query($connection, $query);

if(mysqli_fetch_assoc($login_query) > 0){
    
    $query = "SELECT * FROM users WHERE user_login = '$user' AND user_pass = '$pass'";
    $logged = mysqli_query($connection, $query);

    if(mysqli_fetch_assoc($logged) > 0){
        $row = mysqli_fetch_assoc($logged);
        $role = $row['user_role'];
        $_SESSION['role'] = "$role";
        print_r($_SESSION);

    }
    else{
        echo "nqma";
    } 
} else {

    echo "nqma";

}




?>