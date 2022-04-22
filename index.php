<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Főoldal</title>
</head>
<body>
    <?php
        session_start();
        if(isset($_SESSION['id'])):
            require 'dbm.php';
            $mysqli = connect('root','','fwork');
            $result=$mysqli->query('SELECT * FROM users WHERE id='.$_SESSION['id'])
            or die('Hiba: '.mysqli_errno($mysqli));
            $user = mysqli_fetch_assoc($result);              
    ?>  

    <div class="menu">
       <?php include "menu.php"; ?>
    </div>
    <div class="content">
       <?php include "content.php"; ?>
    </div>

    
    <?php
        else: header('Location: login_form.php');
        endif;
    ?>
</body>
</html>