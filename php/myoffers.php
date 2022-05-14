<?php

if ($_SESSION['authority'] == 'client') {
    $seeking = 'freelancer';
} else {
    $seeking = 'client';
}
$result = $mysqli->query("SELECT offers.id,offers.title,offers.img,offers.description,offers.topic,offers.owner FROM offers WHERE offers.owner='" . $_SESSION['id'] . "'");
$offers = $result->fetch_all(MYSQLI_ASSOC);

?>

<a href="index.php?page=newoffer_form">Hozzáadás</a><br>

<?php foreach ($offers as $offer) : ?>
    <div class="content">
        <img src="../profilepics/<?php echo $offer['img'] ?>" alt="kép" width="150" height="100"><br>
        <h2><?php echo $offer['title']; ?></h2>
        <strong><?php $result = $mysqli->query("SELECT topic FROM topics WHERE id='" . $offer['topic'] . "'");
                $row = $result->fetch_assoc();
                echo $row['topic']; ?></strong>
        <p><?php echo $offer['description']; ?></p>
        <p><img src="../profilepics/<?php $result = $mysqli->query("SELECT profilepic FROM users WHERE id='" . $offer['owner'] . "'");
                                    $row = $result->fetch_assoc();
                                    echo $row['profilepic']; ?>" alt="kép" width="25" height="25">
            <?php $result = $mysqli->query("SELECT username FROM users WHERE id='" . $offer['owner'] . "'");
            $row = $result->fetch_assoc();
            echo $row['username']; ?></p>
        <form action="" method="POST">
            <input hidden type="text" name="jobid" value="<?php echo $offer['id']; ?>">
            <input type="submit" name="takedown" value="Levetel">
        </form>
        <form action="../php/index.php?page=offermodify_form" method="post">
            <input hidden type="text" name="jobid" value="<?php echo $offer['id']; ?>">
            <input type="submit" name="modify" value="Módosítás">
        </form>
    </div><br>
<?php endforeach; ?>

<?php

if (isset($_POST['takedown'])) {
    $query = "DELETE FROM offers WHERE id=" . $_POST['jobid'] . ";";
    $mysqli->query($query);
    header('Location: index.php?page=myoffers');
}

?>