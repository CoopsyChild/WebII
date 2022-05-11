<?php
if ($_SESSION['authority'] == 'client') {
    $seeking = 'freelancer';
    $query = "SELECT offers.id,offers.title,offers.img,offers.description,offers.topic,offers.owner,contracts.employee FROM offers INNER JOIN contracts ON contracts.jobid=offers.id
    WHERE contracts.employer=" . $_SESSION['id'] . ";";
    $arraykey='employee';
} else {
    $seeking = 'client';
    $query = "SELECT offers.id,offers.title,offers.img,offers.description,offers.topic,offers.owner,contracts.employer FROM offers INNER JOIN contracts ON contracts.jobid=offers.id
    WHERE contracts.employee=" . $_SESSION['id'] . ";";
    $arraykey='employer';
}

$result = $mysqli->query($query);
$offers = $result->fetch_all(MYSQLI_ASSOC);
?>

<?php foreach ($offers as $offer) : ?>
    <div class="content">
        <form action="" method="POST">
            <img src="../profilepics/<?php echo $offer['img'] ?>" alt="kép" width="150" height="100"><br>
            <h2><?php echo $offer['title']; ?></h2>
            <strong><?php $result = $mysqli->query("SELECT topic FROM topics WHERE id='" . $offer['topic'] . "'");
                    $row = $result->fetch_assoc();
                    echo $row['topic']; ?></strong>
            <p><?php echo $offer['description']; ?></p><p>
            <?php if ($seeking == "freelancer") : ?>
                Elvállalta:
            <?php else : ?>
                Munkáltató:
            <?php endif; ?>
            <img src="../profilepics/<?php $result = $mysqli->query("SELECT profilepic FROM users WHERE id='" . $offer[$arraykey] . "'");
                                        $row = $result->fetch_assoc();
                                        echo $row['profilepic']; ?>" alt="kép" width="25" height="25">
                <?php $result = $mysqli->query("SELECT username FROM users WHERE id='" . $offer[$arraykey] . "'");
                $row = $result->fetch_assoc();
                echo $row['username']; ?></p>
            <input hidden type="text" name="jobid" value="<?php echo $offer['id']; ?>">
            <input hidden type="text" name="userid" value="<?php echo $offer['owner']; ?>">
            <?php if ($seeking == "freelancer") : ?>
                <input type="submit" name="fire" value="Kirúg">
                <input type="submit" name="done" value="Kész">
            <?php else : ?>
                <input type="submit" name="fire" value="Leadás">
            <?php endif; ?>
        </form>
    </div><br>
<?php endforeach; ?>

<?php

if (isset($_POST['done'])) {
    $query = "DELETE FROM contracts WHERE jobid=".$_POST['jobid'].";";
    $mysqli->query($query);
    $query = "DELETE FROM offers WHERE id=".$_POST['jobid'].";";
    $mysqli->query($query);
    header('Location: index.php?page=myproposals');
}
if (isset($_POST['fire'])) {
    $query = "DELETE FROM contracts WHERE jobid=".$_POST['jobid'].";";
    $mysqli->query($query);
    $query = "UPDATE offers SET taken=0 WHERE id=".$_POST['jobid'].";";
    $mysqli->query($query);
    header('Location: index.php?page=myproposals');
}


?>