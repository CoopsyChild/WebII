<?php
    if(!isset($_GET['page']))
    {
        $p = 'main';
    }
    else {
        $p = $_GET['page'];
    }

    switch($p) {
        case 'main':
            include 'mainpage.php';
            break;
        case 'jobs':
            include 'jobs.php';
            break;
        case 'myjobs':
            include 'myjobs.php';
            break;
        case 'account':
            include 'account.php';
            break;
        case 'accountupdate_form':
            include 'accountupdate_form.php';
            break;
    }
?>