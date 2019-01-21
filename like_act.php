<?php 

    include("Like.php");
    $toid = $_POST['toid'];
    $myid = $_POST['myid'];
    $like = new Like;
    $like->createLike($toid, $myid);
    header("Location: home.php");
