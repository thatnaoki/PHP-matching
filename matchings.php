<?php 

  session_start();
  require_once("funcs.php");
  require_once("Like.php");
  require_once("User.php");
  loginCheck();

  $myid = $_SESSION['id'];
  $sex = $_SESSION['sex'];
  $like = new Like();
  $matchedUsersIDArray = $like->getAllUsersIDWhoYouMatched($myid);
  // var_dump($matchedUsersIDArray);
  $user = new User();
  $matchedUsers = $user->getUsersByID($matchedUsersIDArray);
  // var_dump($matchedUsers);


// viewの作成
// ボタンのidにuidを紐づける
$view = "";
foreach($matchedUsers as $matchedUser) {
  $livein = convertNumToPrefecture($matchedUser["livein"]);
  $view .= '<div class="col-md-4">';
  $view .= '<div class="card mb-4" style="width: 18rem;">';
  $view .= '<img class="card-img-top" src="'.$matchedUser["profileImage"].'" alt="Card image cap">';
  $view .= '<div class="card-body">';
  $view .= '<h5 class="card-title">'.$matchedUser["username"].'</h5>';
  $view .= '<p class="card-text">Age: '.$matchedUser["age"].'</p>';
  $view .= '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modal_'.$matchedUser['id'].'">Detail</button>';
  $view .= '<div class="modal fade" id="Modal_'. $matchedUser['id'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">';
  $view .= '<div class="modal-dialog" role="document">';
  $view .= '<div class="modal-content">';
  $view .= '<div class="modal-header">';
  $view .= '<h5 class="modal-title" id="exampleModalLabel">Detail</h5>';
  $view .= '<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
  $view .= '<span aria-hidden="true">&times;</span>';
  $view .= '</button>';
  $view .= '</div>';
  $view .= '<div class="modal-body">';
  $view .= '<img class="image-in-card" src="'.$matchedUser["profileImage"].'">';
  $view .= '<div class="container" style="margin-top: 30px;">';
  $view .= '<p>'.$matchedUser["username"].'</p>';
  $view .= '<p>Age: '.$matchedUser["age"].'</p>';
  $view .= '<p class="livein">'.$livein.'</p>';
  $view .= '</div>';  
  $view .= '</div>';
  $view .= '<div class="modal-footer">';
  $view .= '<button class="btn btn-secondary" data-dismiss="modal">Close</button>';
  $view .= '<button name="toid" id="btnLike" type="submit" class="btn btn-primary" style="margin-left: 20px;">Chat</button>';
  // $view .= '<a href=chat.php"'.$matchedUser["id"].'">Like</button>';
  $view .= '</div>';
  $view .= '</div>';
  $view .= '</div>';
  $view .= '</div>';
  $view .= '</div>';
  $view .= '</div>';
  $view .= '</div>';
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Matchings</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="css/home.css">
</head>
<body id="main">
<header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">My Tinder</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="matchings.php">Matchings</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="signout.php">Sign out</a>
        </li>
      </ul>
    </div>
  </nav>
</header>
<div>
  <div class="mt-5 container">
    <div id="candidates" class="card-deck">
      <?= $view ?>
    </div>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="js/home.js"></script>
</body>
</html>