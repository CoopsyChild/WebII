<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <title>Főoldal</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous"> 
     <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet"> 
     <link href="https://fonts.googleapis.com/css2?family=Oxygen&display=swap" rel="stylesheet"> 
     <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet"> 
    <link rel="stylesheet"  type="text/css" href="../forms/style.css">
</head>

<body class="index">
    <?php
    session_start();
    if (isset($_SESSION['id'])) :
        require 'dbm.php';
        $mysqli = connect('root', '', 'fwork');
        $result = $mysqli->query('SELECT * FROM users WHERE id=' . $_SESSION['id'])
            or die('Hiba: ' . mysqli_errno($mysqli));
        $user = mysqli_fetch_assoc($result);
    ?>
    <div class="container-fluid"> 
		<header><?php include "menu.php"; ?></header> 
		<div name="content"><?php include "content.php"; ?></div>
	</div> 
    <?php
    else : header('Location: php/login_form.php');
    endif;
    ?>
</body>

</html>