<?php

session_start();

include("funcs.php");
include("User.php");

loginCheck();

$id = $_SESSION['id'];
$user = new User();
$result = $user->_getOneUserfromDB($id);

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="css/signin.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<title>Sign up</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
<div id="signin" class="text-center">
  <h1 class="h3 mb-3 font-weight-normal">Please sign up</h1>
  <form method="post" action="signup_act.php" class="form-signin" enctype="multipart/form-data">
    <img class="mb-4" src="#" alt="" width="72" height="72">
    <div class="form-group">
      <label for="inputEmail" class="sr-only">Email address</label>
      <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
    </div>
    <div class="form-group">
      <label for="inputPassword" class="sr-only">Password</label>
      <input name="pw" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
    </div>
    <div class="form-group">
      <label for="inputUsername" class="sr-only">Username</label>
      <input name="username" type="text" id="inputUsername" class="form-control" placeholder="Username" required>
    </div>
    <div class="input-group mb-3">
      <label for="inputSex" class="input-group-text">Sex:</label>
      <select name="sex" id="inputSex" class="custom-select">
        <option selected>Choose...</option>
        <option value="0">Female</option>
        <option value="1">Male</option>
      </select>
    </div>
    <div class="input-group mb-3">
      <label for="inputAge" class="input-group-text">Age:</label>
      <select name="age" id="inputAge" class="custom-select">
        <option selected>Choose...</option>
        <script>
            for(let i=18; i<100; i++){
              document.write('<option value="' + i + '">'+i+'歳</option>');
            }
        </script>
      </select>
    </div> 
    <div class="input-group mb-3">
      <label for="inputLivein" class="input-group-text">Address:</label>
      <select name="livein" id="inputLivein" class="custom-select">
          <option value="" selected>都道府県</option>
          <option value="1">北海道</option>
          <option value="2">青森県</option>
          <option value="3">岩手県</option>
          <option value="4">宮城県</option>
          <option value="5">秋田県</option>
          <option value="6">山形県</option>
          <option value="7">福島県</option>
          <option value="8">茨城県</option>
          <option value="9">栃木県</option>
          <option value="10">群馬県</option>
          <option value="11">埼玉県</option>
          <option value="12">千葉県</option>
          <option value="13">東京都</option>
          <option value="14">神奈川県</option>
          <option value="15">新潟県</option>
          <option value="16">富山県</option>
          <option value="17">石川県</option>
          <option value="18">福井県</option>
          <option value="19">山梨県</option>
          <option value="20">長野県</option>
          <option value="21">岐阜県</option>
          <option value="22">静岡県</option>
          <option value="23">愛知県</option>
          <option value="24">三重県</option>
          <option value="25">滋賀県</option>
          <option value="26">京都府</option>
          <option value="27">大阪府</option>
          <option value="28">兵庫県</option>
          <option value="29">奈良県</option>
          <option value="30">和歌山県</option>
          <option value="31">鳥取県</option>
          <option value="32">島根県</option>
          <option value="33">岡山県</option>
          <option value="34">広島県</option>
          <option value="35">山口県</option>
          <option value="36">徳島県</option>
          <option value="37">香川県</option>
          <option value="38">愛媛県</option>
          <option value="39">高知県</option>
          <option value="40">福岡県</option>
          <option value="41">佐賀県</option>
          <option value="42">長崎県</option>
          <option value="43">熊本県</option>
          <option value="44">大分県</option>
          <option value="45">宮崎県</option>
          <option value="46">鹿児島県</option>
          <option value="47">沖縄県</option>
      </select>
    </div>
    <div class="input-group mb-3">
      <span class="input-group-text" id="inputGroupFileAddon01">Profile Image</span>
      <div class="custom-file">
        <input type="file" name="uploadedFile" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
        <label class="custom-file-label" for="inputGroupFile01"></label>
      </div>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign up</button>
    <p class="mt-5 mb-3 text-muted"><a href="signin.php">If you already have an account.</a></p>
  </form>
</div>
</body>
</html>
