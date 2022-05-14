<?php

session_start();
require 'dbm.php';
$mysqli = connect('root', '', 'fwork');

if(isset($_POST['desc']) && isset($_POST['topic']) && isset($_POST['title']))
{
    $desc=$_POST['desc'];
    $title=$_POST['title'];
    $topic=$_POST['topic'];
    $mysqli->query('UPDATE offers SET title="'.$title.'",description="'.$desc.'", topic="'.$topic.'" WHERE id="'.$_POST['jobid'].'";');
    echo 'Sikeres módosítás';
    header('refresh:2;url=../php/index.php?page=myoffers');
}

else{
    echo 'Töltsön ki minden kötelező adatot';
}

?>