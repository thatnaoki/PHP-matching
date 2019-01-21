<?php

session_start();
include("Database.php");
$loginId = $_POST["loginId"];
$loginPw = $_POST["loginPw"];

$db = new Database;
$sql = "SELECT * FROM user_table WHERE email = :loginId AND pw = :loginPw";
$stmt = $db->prepare($sql);
$stmt->bindValue(':loginId', $loginId, PDO::PARAM_STR);
$stmt->bindValue(':loginPw', $loginPw, PDO::PARAM_STR);
$res = $stmt->execute();

if($res==false){
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);
}
$me = $stmt->fetch();

if( $me["id"] != "" ){
  $_SESSION["chk_ssid"] = session_id();
  $_SESSION["name"] = $me['name'];
  $_SESSION["id"] = $me['id'];
  $_SESSION["sex"] = $me['sex'];
  
  //Login処理OKの場合select.phpへ遷移
  header("Location: home.php");
}else{
  //Login処理NGの場合login.phpへ遷移
  header("Location: login.php");
}
