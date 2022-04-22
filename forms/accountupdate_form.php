
<form action="accountupdate.php" method="post">
    <img src="../profilepics/<?php echo $user['profilepic'] ?>" alt="Profilkép" width="100" height="100"><br>
    <strong>Új profilkép feltöltése:</strong><br>
    <input type="file" name="newprofilepic" value="Új profilkép feltöltése"><br><br>
    <strong>Jelenlegi név: <?php echo $user['lastname']." ".$user['firstname']; ?></strong><br> 
    <strong>Név változtatás:</strong><br>
    Új vezetéknév:
    <input type="text" name="newlastname"><br>
    Új keresztnév:
    <input type="text" name="newfirstname"><br><br>
    <strong>Jelenlegi e-mail: <?php echo $user['email']; ?></strong><br>
    <strong>E-mail változtatás:</strong><br>
    Új e-mail cím:
    <input type="text" name="newmail"><br><br>
    <strong>Jelszó változtatás:</strong><br>
    Régi jelszó:
    <input type="password" name="oldpass"><br>
    Új jelszó:
    <input type="password" name="newpass"><br>
    Új jelszó megint:
    <input type="password" name="newpasscheck"><br><br>
    <input type="submit" value="Új adatok feltöltése"> 
    <a href="/php/index.php?page=account">Vissza</a><br>
</form>
