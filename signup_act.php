<?php
include("funcs.php");
include("User.php");

$props = array();

$props['email'] = $_POST["email"];
$props['password'] = $_POST["pw"];
$props['username'] = $_POST["username"];
$props['sex'] = $_POST["sex"];
$props['age'] = $_POST["age"];
$props['livein'] = $_POST["livein"];
$props['profileImage'] = $_FILES['uploadedFile'];

$user = new User();
$user->saveUser($props);
$user->saveFileToStorage($props['profileImage']);

header('location: signin.php');
