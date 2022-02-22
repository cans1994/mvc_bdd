<?php
    require('Modele.php');

    require('header.php');

    $billets = getBillets();
    require('vueAccueil.php');

    require('footer.php');
?>

