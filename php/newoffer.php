<?php

session_start();
require 'dbm.php';
$mysqli = connect('root', '', 'fwork');

if(isset($_POST['img']) && isset($_POST['desc']) && isset($_POST['topic']) && isset($_POST['title']))
{
    $img=$_POST['img'];
    $desc=$_POST['desc'];
    $title=$_POST['title'];
    $topic=$_POST['topic'];
    $mysqli->query('INSERT INTO offers(img,title,description,topic,owner) VALUES("'.$img.'","'.$title.'","'.$desc.'","'.$topic.'","'.$_SESSION['id'].'");');
    echo 'Sikeres feltöltés';
    header('refresh:2;url=../php/index.php?page=myoffers');
}

else{
    echo 'Töltsön ki minden kötelező adatot';
}

?>