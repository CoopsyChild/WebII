<?php

session_start();
require 'dbm.php';
$mysqli = connect('root', '', 'fwork');
$change = false;

if (!empty($_POST['newprofilepic'])) {
    $mysqli->query("UPDATE users SET profilepic=" . "'" . $_POST['newprofilepic'] . "'" . " WHERE users.id=" . $_SESSION['id'] . ";");
    echo "<span>Sikeres profilkép frissítés</span><br>";
    $change = true;
}

if (!empty($_POST['newlastname'])) {
    $mysqli->query("UPDATE users SET lastname=" . "'" . $_POST['newlastname'] . "'" . " WHERE users.id=" . $_SESSION['id'] . ";");
    echo "<span>Sikeres vezetéknév frissítés</span><br>";
    $change = true;
}

if (!empty($_POST['newfirstname'])) {
    $mysqli->query("UPDATE users SET firstname=" . "'" . $_POST['newfirstname'] . "'" . " WHERE users.id=" . $_SESSION['id'] . ";");
    echo "<span>Sikeres keresztnév frissítés</span><br>";
    $change = true;
}

if (!empty($_POST['newmail'])) {
    $mysqli->query("UPDATE users SET email=" . "'" . $_POST['newmail'] . "'" . " WHERE users.id=" . $_SESSION['id'] . ";");
    echo "<span>Sikeres email cím frissítés</span><br>";
    $change = true;
}

if (!empty($_POST['oldpass']) && !empty($_POST['newpass']) && !empty($_POST['newpasscheck'])) {
    $result = $mysqli->query("SELECT password FROM users WHERE users.id=" . $_SESSION['id'] . ";");
    $row = $result->fetch_assoc();
    if ($row['password'] === md5($_POST['oldpass'])) {
        if (md5($_POST['newpass']) === md5($_POST['newpasscheck'])) {
            $mysqli->query("UPDATE users SET password=" . "'" . md5($_POST['newpass']) . "'" . " WHERE users.id=" . $_SESSION['id'] . ";");
            echo "<span>Sikeres elszófrissítés</span><br>";
            $change = true;
        } else {
            echo "<span>Sikertelen jelszó frissítés: A két új jelszó nem egyezik meg! </span><br>";
            $change = true;
        }
    } else {
        echo "<span>Sikertelen jelszó frissítés: A régi jelszó hibás! </span><br>";
        $change = true;
    }
}

if ($change === false) {
    echo "<span>Mivel üresek voltak a mezők semmilyen változatatás nem történt. </span><br>";
}
echo "<span>Pár másodperc múlva visszakerülsz a profilod oldalára </span><br>";
header('refresh:4;url=../php/index.php?page=account');

?>
<span></span>