<!DOCTYPE html>
<html lang="en">

<head>
<head>
    <meta charset="UTF-8">
    <title>Bejelentkezés</title>
    <link type="text/css" rel="stylesheet" href="../forms/style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oxygen&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
</head>
</head>

<body>
    <div class="container-fluid">
        <div id="login">
        <form method="post" action="../php/login.php">

            <center>
                <h2>Bejelentkezés</h2>
            </center>

            <div class="form-group">
                <label for="userName">Felhasználónév</label>
                <input type="text" class="input-style" id="userName" name="username" required>
            </div>

            <div class="form-group">
                <label for="loginPassword">Jelszó</label>
                <input type="password" class="input-style" id="loginPassword" name="password" required>
            </div>

            <center><button type="submit" class="register-btn login" name="send">Bejelentkezés</button></center>
            <center><a class="register-btn href" href="../forms/reg_form.php">Regisztráció</a></center><br>
            </form>
        </div>
    </div>
</body>

</html>