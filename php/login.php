<?php

require "dbm.php";

if(!empty($_POST['username']) && !empty($_POST['password'])){
    $mysqli=connect('root','','fwork');
    $result=$mysqli->query('SELECT * FROM USERS;');
    $loggedIn=false;
    $userExists=false;
    while($row = $result->fetch_assoc())
    {
        if($row['username']==$_POST['username']){
            $userExists=true;
            if($row['username']==$_POST['username'] && md5($_POST['password'])==($row['password'])){
                $loggedIn=true;
                $id=$row['id'];
                $authority=$row['authoritytypecode'];
                break;
            }
        }
    }
    if($loggedIn == false && $userExists == false){
        echo 'Nincs ilyen nevű felhasználó: '.$_POST['username'].', kérem regisztráljon.';
        echo "<a href='../forms/reg_form.php'> itt </a>";
        echo " vissza a bejelentkezéshez ";
        echo "<a href='../forms/login_form.php'> itt</a>";
    }
    else if($loggedIn){
       session_start();
            $result=$mysqli->query('SELECT authoritytype FROM authority WHERE id='.$authority.';');
            $row=$result->fetch_assoc();
            var_dump($row['authoritytype']);
            $_SESSION['authority']=$row['authoritytype'];
            $_SESSION['id'] = $id;
            header('Location: index.php');
    }
    else{
        echo 'Rossz jelszó!';
    }
}
else
{
    echo "Hiányzó felhasználónév vagy jelszó!";
}


?>