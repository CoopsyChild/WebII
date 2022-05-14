<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>

<body>
    <form method="post" action="../php/login.php">
        Felhasznalónév:
        <input type="text" name="username" required><br>

        Jelszó:
        <input type="password" name="password" required><br>
        <input type="submit" name="send" value="Bejelentkezés">
    </form>
    <a href="../forms/reg_form.php">Regisztráció</a>
</body>

</html>