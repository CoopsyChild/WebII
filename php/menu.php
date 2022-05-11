<?php

if($_SESSION['authority']=='freelancer'){
    echo"<a href='index.php?page=offers'>Munkakeresés </a>";
    echo"<a href='index.php?page=myoffers'>Ajánlataim </a>";
    echo"<a href='index.php?page=myproposals'>Munkáim </a>";
    echo"<a href='index.php?page=account'><img src='../profilepics/".$user['profilepic']."'"." alt='Profilkép' width='40' height='40'></a>";
    echo "<a href='../php/logout.php'> Kijelentkezés </a>";
}
elseif($_SESSION['authority']=='client'){
    echo"<a href='index.php?page=offers'>Szabadúszók</a>";
    echo"<a href='index.php?page=myoffers'>Hirdetéseim </a>";
    echo"<a href='index.php?page=myproposals'>Kiadott munkák </a>";
    echo"<a href='index.php?page=account'><img src='../profilepics/".$user['profilepic']."'"." alt='Profilkép' width='40' height='40'></a>";
    echo "<a href='../php/logout.php'> Kijelentkezés </a>";
}
?>