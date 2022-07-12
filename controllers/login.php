<?php 
require ('connection.php');
session_start();

if(isset($_POST['login_submit'])){

    $username = $_POST['login_user'];
    $password = $_POST['login_pass'];

    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);

    $query = "SELECT * FROM users WHERE `user_login` = '$username'";
    $select_user_query = mysqli_query($connection, $query);

    while($row = mysqli_fetch_array($select_user_query)){

        $user_id = $row['user_id'];
        $user_login = $row['user_login'];
        $user_pass = $row['user_pass'];
        $user_name = $row['user_name'];
        $user_family = $row['user_family'];
        $user_role = $row['user_role'];

    }

    if($username == $user_login && $password == $user_pass){

        //header("Location: ../index.php");

        $_SESSION['user_id'] = $user_id;
        $_SESSION['user_login'] = $user_login;
        $_SESSION['user_firstname'] = $user_name;
        $_SESSION['user_lastname'] = $user_family;
        $_SESSION['user_role'] = $user_role;

        print_r($_SESSION);

    }else{
        
        header("Location: ../index.php");

    }
}

?>