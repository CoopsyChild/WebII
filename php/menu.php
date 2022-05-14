<?php if ($_SESSION['authority'] == 'freelancer') : ?>

    <div id="header-elements">
    <div id="header-elements-right">
            <a href='../php/logout.php'> Kijelentkezés </a>
        </div>
        <div id="header-elements-right">
            <a href='index.php?page=myproposals'>Munkáim </a>
        </div>
        <div id="header-elements-right">
            <a href='index.php?page=myoffers'>Ajánlataim </a>
        </div>
        <div id="header-elements-right">
            <a href='index.php?page=offers'>Munkakeresés </a>
        </div>
        <div id="header-elements-left">
            <a href='index.php?page=account'><img src='../profilepics/<?php echo $user['profilepic'] ?>' alt='Profilkép' width='50' height='50'> <?php echo $user['username'] ?></a>
        </div>
    </div>

<?php elseif ($_SESSION['authority'] == 'client') : ?>

    <div id="header-elements">
    <div id="header-elements-right">
            <a href='../php/logout.php'> Kijelentkezés </a>
        </div>
        <div id="header-elements-right">
            <a href='index.php?page=myproposals'>Kiadott munkák </a>
        </div>
        <div id="header-elements-right">
            <a href='index.php?page=myoffers'>Hirdetéseim </a>
        </div>
        <div id="header-elements-right">
            <a href='index.php?page=offers'>Szabadúszók </a>
        </div>
        <div id="header-elements-left">
            <a href='index.php?page=account'><img src='../profilepics/<?php echo $user['profilepic'] ?>' alt='Profilkép' width='50' height='50'> <?php echo $user['username'] ?></a>
        </div>
    </div>
<?php endif; ?>