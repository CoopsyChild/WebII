<?php
if ($_SESSION['authority'] == 'client') {
    $seeking = 'freelancer';
    $query = "SELECT offers.id,offers.title,offers.img,offers.description,offers.topic,offers.owner,contracts.employee FROM offers INNER JOIN contracts ON contracts.jobid=offers.id
    WHERE contracts.employer=" . $_SESSION['id'] . ";";
    $arraykey = 'employee';
} else {
    $seeking = 'client';
    $query = "SELECT offers.id,offers.title,offers.img,offers.description,offers.topic,offers.owner,contracts.employer FROM offers INNER JOIN contracts ON contracts.jobid=offers.id
    WHERE contracts.employee=" . $_SESSION['id'] . ";";
    $arraykey = 'employer';
}

$result = $mysqli->query($query);
$offers = $result->fetch_all(MYSQLI_ASSOC);
?>
<div class="explore-content">
    <div class="explore-photos">
        <?php foreach ($offers as $offer) : ?>
            <div class="explorebg">
                <div id="post-image">
                    <img src="../profilepics/<?php echo $offer['img'] ?>" alt="kép" width="150" height="100"><br>
                    <h2><?php echo $offer['title']; ?></h2>
                    <strong><?php $result = $mysqli->query("SELECT topic FROM topics WHERE id='" . $offer['topic'] . "'");
                            $row = $result->fetch_assoc();
                            echo $row['topic']; ?></strong>
                    <p class="desc"><?php echo $offer['description']; ?></p>
                    <p>
                        <?php if ($seeking == "freelancer") : ?>
                            Elvállalta:
                        <?php else : ?>
                            Munkáltató:
                        <?php endif; ?>
                        <img src="../profilepics/<?php $result = $mysqli->query("SELECT profilepic FROM users WHERE id='" . $offer[$arraykey] . "'");
                                                    $row = $result->fetch_assoc();
                                                    echo $row['profilepic']; ?>" class="profilepic" alt="kép" width="25" height="25">
                        <?php $result = $mysqli->query("SELECT username FROM users WHERE id='" . $offer[$arraykey] . "'");
                        $row = $result->fetch_assoc();
                        echo $row['username']; ?>
                    </p>
                    <form action="" method="POST">
                        <input hidden type="text" name="jobid" value="<?php echo $offer['id']; ?>">
                        <input hidden type="text" name="userid" value="<?php echo $offer['owner']; ?>">
                        <center>
                            <?php if ($seeking == "freelancer") : ?>
                                <input type="submit" class="register-btn sitebtn" name="fire" value="Kirúg">
                                <input type="submit" class="register-btn sitebtn" name="done" value="Kész">
                            <?php else : ?>
                                <input type="submit" class="register-btn sitebtn" name="fire" value="Leadás">
                            <?php endif; ?>
                        </center>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php

if (isset($_POST['done'])) {
    $query = "DELETE FROM contracts WHERE jobid=" . $_POST['jobid'] . ";";
    $mysqli->query($query);
    $query = "DELETE FROM offers WHERE id=" . $_POST['jobid'] . ";";
    $mysqli->query($query);
    echo '<script>
    location.replace("index.php?page=myproposals")
    </script>';
}
if (isset($_POST['fire'])) {
    $query = "DELETE FROM contracts WHERE jobid=" . $_POST['jobid'] . ";";
    $mysqli->query($query);
    $query = "UPDATE offers SET taken=0 WHERE id=" . $_POST['jobid'] . ";";
    $mysqli->query($query);
    echo '<script>
    location.replace("index.php?page=myproposals")
    </script>';
}


?>