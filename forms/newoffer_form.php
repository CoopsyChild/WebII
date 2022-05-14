<form action="newoffer.php" method="post">
    <strong>Képfeltöltés:</strong><br>
    <input type="file" name="img" value="Képfeltöltés" required><br><br>
    Cím:
    <input type="text" name="title" required><br>
    Téma:
    <select name="topic">
        <?php $result = $mysqli->query("SELECT id,topic FROM topics");
        $rows = $result->fetch_all(MYSQLI_ASSOC); ?>
        <?php foreach ($rows as $row) : ?>
            <option value="<?php echo $row['id']; ?>"><?php echo $row['topic']; ?></option>
        <?php endforeach; ?>
    </select><br>
    Leírás:
    <textarea name="desc" id="" cols="30" rows="10">
    </textarea><br><br>
    <input type="submit" value="Új adatok feltöltése">
    <a href="/php/index.php?page=myoffers">Vissza</a><br>
</form>