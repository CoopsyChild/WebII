<?php

require 'dbm.php';
$mysqli = connect('root', '', 'fwork');

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['authoritytype']) && isset($_POST['profilepic']) && isset($_POST['lastname']) && isset($_POST['firstname'])): {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $email = $_POST['email'];
    $authoritytype = $_POST['authoritytype'];
    $profilepic = $_POST['profilepic'];
    $lastName = $_POST['lastname'];
    $firstName = $_POST['firstname'];

    $result = $mysqli->query('SELECT * FROM USERS WHERE USERNAME = "' . $username . '";');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Regisztráció</title>
    <link type="text/css" rel="stylesheet" href="../forms/style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oxygen&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container-fluid">
        <div id="register">
            <form method="POST" action="../php/reg.php">
                <center><?php if (mysqli_num_rows($result) === 0) {
                            if ($authoritytype === 'freelancer') {
                                $authoritytype = 3;
                            } elseif ($authoritytype === 'client') {
                                $authoritytype = 2;
                            }
                            $mysqli->query('INSERT INTO users(username,password,email,firstname,lastname,authoritytypecode,profilepic) VALUES("' . $username . '","' . $password . '","' . $email . '"
                            ,"' . $firstName . '","' . $lastName . '","' . $authoritytype . '","' . $profilepic . '");');
                            echo "<br><h2>Sikeres regisztráció!</h2><br>";
                        } else {
                            echo "<br><h2>Ez a felhasználónév már foglalt</h2><br>";
                        } ?>        
                </center>
                <?php header('refresh:3;url=../forms/login_form.php');?>
            </form>
        </div>
    </div>
</body>
</html>
<?php else:?>
    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Regisztráció</title>
    <link type="text/css" rel="stylesheet" href="../forms/style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oxygen&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container-fluid">
        <div id="register">
            <form method="POST" action="../php/reg.php">
                <center><br><h2>Töltsön ki minden adatot</h2><br>
                </center>
                <?php header('refresh:3;url=../forms/login_form.php');?>
            </form>
        </div>
    </div>
</body>
</html>
<?php endif?>
