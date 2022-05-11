<?php 
    if($_SESSION['authority']=='client'){
        $seeking='freelancer';
    }
    else{
        $seeking='client';
    }
    $query="SELECT offers.id,offers.title,offers.img,offers.description,offers.topic,offers.owner FROM offers INNER JOIN users ON users.id=offers.owner 
    WHERE users.authoritytypecode=(SELECT authority.id FROM authority WHERE authority.authoritytype='".$seeking."');";
    
    if(isset($_GET['searchbtn']) && !empty($_GET['parameter']))
    {
        $keresendo=$_GET['parameter'];
        $query=$query."'";
    }
    
    $result=$mysqli->query($query);
    $offers=$result->fetch_all(MYSQLI_ASSOC);
?>

<form action="" method="GET">
    <input type="text" name="parameter" id="">
    <input type="submit" name="searchbtn" value="kereses">
</form>

<?php foreach ($offers as $offer) : ?>
    <div class="content">
        <img src="../profilepics/<?php echo $offer['img'] ?>" alt="kép" width="150" height="100"><br>
        <h2><?php echo $offer['title'];?></h2>
        <strong><?php $result=$mysqli->query("SELECT topic FROM topics WHERE id='".$offer['topic']."'");
        $row=$result->fetch_assoc();
        echo $row['topic'];?></strong>
        <p><?php echo $offer['description'];?></p>
        <p><img src="../profilepics/<?php $result=$mysqli->query("SELECT profilepic FROM users WHERE id='".$offer['owner']."'");
        $row=$result->fetch_assoc();
        echo $row['profilepic']; ?>" alt="kép" width="25" height="25">
        <?php $result=$mysqli->query("SELECT username FROM users WHERE id='".$offer['owner']."'");
        $row=$result->fetch_assoc();
        echo $row['username'];?></p>
    </div><br>
<?php endforeach; ?>