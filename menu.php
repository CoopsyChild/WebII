<?php

if($_SESSION['authority']=='freelancer'){
    echo"<a href='index.php?page=jobs'>Munkakeresés </a>";
    echo"<a href='index.php?page=myjobs'>Munkáim </a>";
    echo"<a href='index.php?page=account'><img src='profilepics/".$user['profilepic']."'"." alt='Profilkép' width='40' height='40'></a>";
    echo "<a href='logout.php'> Kijelentkezés </a>";
}
elseif($_SESSION['authority']=='client'){
    echo"<a href='index.php?page=freelancers'>Szabadúszók</a>";
    echo"<a href='index.php?page=myads'>Hirdetéseim </a>";
    echo"<a href='index.php?page=account'><img src='profilepics/".$user['profilepic']."'"." alt='Profilkép' width='40' height='40'></a>";
    echo "<a href='logout.php'> Kijelentkezés </a>";
}
?>