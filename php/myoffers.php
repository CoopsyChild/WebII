<?php

if ($_SESSION['authority'] == 'client') {
    $seeking = 'freelancer';
} else {
    $seeking = 'client';
}
$result = $mysqli->query("SELECT offers.id,offers.title,offers.img,offers.description,offers.topic,offers.owner FROM offers WHERE offers.owner='" . $_SESSION['id'] . "'");
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
                    <p><img src="../profilepics/<?php $result = $mysqli->query("SELECT profilepic FROM users WHERE id='" . $offer['owner'] . "'");
                                                $row = $result->fetch_assoc();
                                                echo $row['profilepic']; ?>" alt="kép" class="profilepic">
                        <?php $result = $mysqli->query("SELECT username FROM users WHERE id='" . $offer['owner'] . "'");
                        $row = $result->fetch_assoc();
                        echo $row['username']; ?></p>
                    <center>
                        <div class="btn-group">
                            <form action="" method="POST">
                                <input hidden type="text" name="jobid" value="<?php echo $offer['id']; ?>">
                                <input type="submit" class="register-btn sitebtn" name="takedown" value="Levetel">
                            </form>
                            <form action="../php/index.php?page=offermodify_form" method="post">
                                <input hidden type="text" name="jobid" value="<?php echo $offer['id']; ?>">
                                <input type="submit" class="register-btn sitebtn" name="modify" value="Módosítás">
                            </form>
                        </div>
                    </center>
                </div>
            </div>
        <?php endforeach; ?>
        <div class="explorebg">
                <div id="post-image">
                </center><img class="plus" src="../forms/img/plus.png" alt="kép"></center>
                    <h2>Cím</h2>
                    <strong>Téma</strong>
                    <p class="desc">Leírás...</p>
                    <p><img src="../profilepics/<?php $result = $mysqli->query("SELECT profilepic FROM users WHERE id='" . $offer['owner'] . "'");
                                                $row = $result->fetch_assoc();
                                                echo $row['profilepic']; ?>" alt="kép" class="profilepic">
                        <?php $result = $mysqli->query("SELECT username FROM users WHERE id='" . $offer['owner'] . "'");
                        $row = $result->fetch_assoc();
                        echo $row['username']; ?></p>
                    <center>
                                <input onclick="location.replace('index.php?page=newoffer_form');" type="submit" class="register-btn sitebtn" name="modify" value="Hozzáadás">
                    </center>
                </div>
            </div>
    </div>
</div>

<?php

if (isset($_POST['takedown'])) {
    $query = "DELETE FROM offers WHERE id=" . $_POST['jobid'] . ";";
    $mysqli->query($query);
    echo '<script>
    location.replace("index.php?page=myoffers")
    </script>';
}

?>