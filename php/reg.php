<?php

require 'dbm.php';
$mysqli = connect('root','','fwork');

if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['authoritytype']) && isset($_POST['profilepic']) && isset($_POST['lastname']) && isset($_POST['firstname']))
{
    $username=$_POST['username'];
    $password=md5($_POST['password']);
    $email=$_POST['email'];
    $authoritytype=$_POST['authoritytype'];
    $profilepic=$_POST['profilepic'];
    $lastName=$_POST['lastname'];
    $firstName=$_POST['firstname'];

    $result=$mysqli->query('SELECT * FROM USERS WHERE USERNAME = "'.$username.'";');
    if(mysqli_num_rows($result)===0){
        if($authoritytype==='freelancer'){
            $authoritytype=3;
        }
        elseif ($authoritytype==='client'){
            $authoritytype=2;
        }
        $mysqli->query('INSERT INTO users(username,password,email,firstname,lastname,authoritytypecode,profilepic) VALUES("'.$username.'","'.$password.'","'.$email.'","'.$firstName.'","'.$lastName.'","'.$authoritytype.'","'.$profilepic.'");');
        echo 'Sikeres regisztráció!<br>';
        echo "<a href='../forms/login_form.php'>Vissza a bejelentkezéshez</a>";
    }
    else{
        echo "Ez a felhasználónév már foglalt, bocsi :(";
    }
}

else{
    echo 'Töltsön ki minden kötelező adatot';
}
