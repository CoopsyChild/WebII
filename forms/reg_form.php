<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Regisztráció</title>
</head>
<body>
    <form method="POST" action="../php/reg.php">
        Felhasznalónév: 
        <input type="text" name="username" required pattern="[A-Z a-z 0-9]*"><br>

        Jelszó:
        <input type="password" name="password" required ><br>

        Email:
        <input type="email" name="email" required><br>

        Vezetéknév:
        <input type="text" name="lastname" required"><br>

        Keresztnév:
        <input type="text" name="firstname" required"><br>

        <input type="radio" name="authoritytype" value="client" id="clientrbtn">
        Kliens vagyok, munkát szeretnék hirdetni:
        <input type="radio" name="authoritytype" value="freelancer" id="freelancerrbtn">
        Szabadúszó vagyok, dolgozni szeretnék:<br>

        Profilkép:
        <input type="file" name="profilepic"><br>



        CAPTCHA:
        <span name="captchatest" id="captcha"></span>
        <input type="text" id="capthcainput" name="capthcainput" required><br>
        <input type="button" id="captchabtn" value="CAPTCHA Ellenörzés">
        <input type="button" value="Frissítés"><br>

        <span id="result"></span><br>


        <input type="submit" name="signup" id="submitBtn" value="Regisztráció" disabled>


    </form>

    <script src="captchascript.js"></script>
</body>
</html>