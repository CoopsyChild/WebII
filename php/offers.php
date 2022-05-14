<?php
if ($_SESSION['authority'] == 'client') {
    $seeking = 'freelancer';
    $query = "SELECT offers.id,offers.title,offers.img,offers.description,offers.topic,offers.owner FROM offers INNER JOIN users ON users.id=offers.owner 
    WHERE users.authoritytypecode=(SELECT authority.id FROM authority WHERE authority.authoritytype='" . $seeking . "')";
} else {
    $seeking = 'client';
    $query = "SELECT offers.id,offers.title,offers.img,offers.description,offers.topic,offers.owner FROM offers INNER JOIN users ON users.id=offers.owner 
    WHERE offers.taken=0 AND users.authoritytypecode=(SELECT authority.id FROM authority WHERE authority.authoritytype='" . $seeking . "')";
}

if (isset($_POST['searchbtn']) && !empty($_POST['parameter']) && !empty($_POST['params'])) {
    if ($_POST['params'] == 'username') {
        $query = $query . " AND users.username LIKE '%" . $_POST['parameter'] . "%';";
    } else if ($_POST['params'] == 'title') {
        $query = $query . " AND offers.title LIKE '%" . $_POST['parameter'] . "%';";
    } else if ($_POST['params'] == 'description') {
        $query = $query . " AND offers.description LIKE '%" . $_POST['parameter'] . "%';";
    }
} else if (isset($_POST['filter'])) {
    $query = $query . " AND offers.topic=(SELECT id FROM topics WHERE topic='" . $_POST['filters'] . "')";
} else {
    $query = $query . ";";
}

$result = $mysqli->query($query);
$offers = $result->fetch_all(MYSQLI_ASSOC);
?>
<div class="explore-content">
    <form action="" method="POST">
        <label>Keresés</label>
        <select name="params">
            <option value="username">Felhasználó</option>
            <option value="title">Cím</option>
            <option value="description">Leírás</option>
        </select>
        <label>alapján </label>
        <input type="search" name="parameter" id="">
        <input type="submit" name="searchbtn" value="kereses">
        <label>Szűrés téma alapján: </label>
        <select name="filters">
            <?php $result = $mysqli->query("SELECT topic FROM topics");
            $rows = $result->fetch_all(MYSQLI_ASSOC); ?>
            <?php foreach ($rows as $row) : ?>
                <option value="<?php echo $row['topic']; ?>"><?php echo $row['topic']; ?></option>
            <?php endforeach; ?>
        </select>
        <input type="submit" name="filter" value="szűrés">
    </form>
    <div class="explore-photos">
        <?php foreach ($offers as $offer) : ?>
            <div id="post-image">
                <form action="" method="POST">
                    <img src="../profilepics/<?php echo $offer['img'] ?>" alt="kép" width="150" height="100"><br>
                    <h2><?php echo $offer['title']; ?></h2>
                    <strong><?php $result = $mysqli->query("SELECT topic FROM topics WHERE id='" . $offer['topic'] . "'");
                            $row = $result->fetch_assoc();
                            echo $row['topic']; ?></strong>
                    <p><?php echo $offer['description']; ?></p>
                    <p><img src="../profilepics/<?php $result = $mysqli->query("SELECT profilepic FROM users WHERE id='" . $offer['owner'] . "'");
                                                $row = $result->fetch_assoc();
                                                echo $row['profilepic']; ?>" class="profilepic" alt="kép" width="25" height="25">
                        <?php $result = $mysqli->query("SELECT username FROM users WHERE id='" . $offer['owner'] . "'");
                        $row = $result->fetch_assoc();
                        echo $row['username']; ?></p>
                    <input hidden type="text" name="jobid" value="<?php echo $offer['id']; ?>">
                    <input hidden type="text" name="userid" value="<?php echo $offer['owner']; ?>">
                    <?php if ($seeking == "freelancer") : ?>
                        <input type="submit" name="hire" value="Felvesz">
                    <?php else : ?>
                        <input type="submit" name="hire" value="Jelentkezes">
                    <?php endif; ?>
                </form>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php

if (isset($_POST['hire'])) {
    if ($seeking == 'freelancer') {
        $query = "INSERT INTO contracts(employer,employee,jobid) VALUES(" . $_SESSION['id'] . "," . $_POST['userid'] . "," . $_POST['jobid'] . ")";
    } else {
        $query = "UPDATE offers SET taken=1 WHERE id=" . $_POST['jobid'] . ";";
        $mysqli->query($query);
        $query = "INSERT INTO contracts(employer,employee,jobid) VALUES(" . $_POST['userid'] . "," . $_SESSION['id'] . "," . $_POST['jobid'] . ")";
    }
    $mysqli->query($query);
    header('Location: index.php?page=offers');
} ?>