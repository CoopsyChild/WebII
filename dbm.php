<?php
function connect($username, $password, $dbname)
{
    $connection= new mysqli('localhost',$username,$password,$dbname,3306);
    if($connection->connect_error){
            die('Error'.mysqli_error($connection));
        }
    else return $connection;
}
?>