

<img src="profilepics/<?php echo $user['profilepic'] ?>" alt="Profilkép" width="200" height="200"><br>
<strong>Név: <?php echo $user['lastname']." ".$user['firstname']; ?></strong><br>
<strong>Felhasználónév: <?php echo $user['username']; ?></strong><br>
<strong>E-mail: <?php echo $user['email']; ?></strong><br>
<a href="index.php?page=accountupdate_form">Adatok módosítása</a><br>

