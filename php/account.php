<img src="../profilepics/<?php echo $user['profilepic'] ?>" alt="Profilkép" width="100" height="100"><br>
<strong>Név: <?php echo $user['lastname'] . " " . $user['firstname']; ?></strong><br>
<strong>Felhasználónév: <?php echo $user['username']; ?></strong><br>
<strong>E-mail: <?php echo $user['email']; ?></strong><br>
<a href="index.php?page=accountupdate_form">Adatok módosítása</a><br>