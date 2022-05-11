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
        case 'offers':
            include 'offers.php';
            break;
        case 'myoffers':
            include 'myoffers.php';
            break;
        case 'myproposals':
            include 'myproposals.php';
            break;
        case 'account':
            include 'account.php';
            break;
        case 'accountupdate_form':
            include '../forms/accountupdate_form.php';
            break;
    }
?>