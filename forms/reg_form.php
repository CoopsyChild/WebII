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
                <center>
                    <h2>Új fiók létrehozása</h2>
                </center>

                <div class="form-row">
                    <div class="form-group">
                        <label for="registerUsername">Felhasználónév</label><br>
                        <input type="text" class="input-style" id="registerUsername" name="username" required pattern="[A-Z a-z 0-9]*">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="registerPassword" class="">Jelszó</label><br>
                        <input type="password" class="input-style" id="registerPassword" name="password" required>
                    </div>

                    <div class="form-group">
                        <label for="registerEmail">E-mail cím</label><br>
                        <input type="email" class="input-style" id="registerEmail" name="email" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="registerLastname">Vezetéknév</label><br>
                        <input type="text" class="input-style" id="registerLastname" name="lastname" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="registerFirstname">Keresztnév</label><br>
                        <input type="text" class="input-style" id="registerFirstname" name="firstname" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="rbtn" for="clientrbtn">Munkát szeretnék hirdetni: </label>
                        <input type="radio" name="authoritytype" value="client" id="clientrbtn">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label class="rbtn" for="freelancerrbtn">Szabadúszó vagyok, dolgozni szeretnék: </label>
                        <input type="radio" name="authoritytype" value="freelancer" id="freelancerrbtn">
                    </div>
                </div>

                <center>
                    <div class="form-row">
                        <div class="form-group">
                            <label class="register-btn input" for="profilepicbtn">Profilkép feltöltése</label><br>
                            <input type="file" class="input-file" id="profilepicbtn" name="profilepic"><br>
                        </div>
                    </div>
                </center>

                <div class="form-row">
                    <div class="form-group">
                    <center><div class="captcha-bg"><canvas name="captchatest" class="captcha" id="captcha"></canvas></div></center>
                        <input type="text" id="capthcainput" class="input-style" name="capthcainput" required><br>
                        <center><input type="button" class="register-btn check" id="captchabtn" value="Ellenörzés"><br></center>
                    </div>
                </div>

                <center><button type="submit" class="register-btn" id="submitBtn" name="signup" disabled>Regisztráció</button></center>
            </form>

        </div>

    </div>
    <script src="captchascript.js"></script>
</body>

</html>