<?php
$jobid=$_POST['jobid'];
$query = "SELECT offers.id,offers.title,offers.img,offers.description,offers.topic FROM offers WHERE offers.id=" . $jobid . ";";
$result = $mysqli->query($query);
$offer=$result->fetch_assoc();
?>

<form action="offermodify.php" method="post">
    <br><br>
    Cím:
    <input type="text" name="title" value="<?php echo $offer['title'] ?>" required><br>
    Téma:
    <select name="topic">
    <?php $result = $mysqli->query("SELECT id,topic FROM topics WHERE id=".$offer['topic'].";");
        $row = $result->fetch_assoc(); ?>
            <option value="<?php echo $row['id']; ?>"><?php echo $row['topic']; ?></option>
        <?php $result = $mysqli->query("SELECT id,topic FROM topics WHERE id<>".$offer['topic'].";");
        $rows = $result->fetch_all(MYSQLI_ASSOC); ?>
        <?php foreach ($rows as $row) : ?>
            <option value="<?php echo $row['id']; ?>"><?php echo $row['topic']; ?></option>
        <?php endforeach; ?>
    </select><br>
    Leírás:
    <textarea name="desc" id="" cols="30" rows="10">
    <?php echo $offer['description'] ?>
    </textarea><br><br>
    <input hidden type="text" name="jobid" value="<?php echo $jobid; ?>">
    <input type="submit" value="Adatok módosítása">
    <a href="/php/index.php?page=myoffers">Vissza</a><br>
</form>