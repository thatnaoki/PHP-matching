<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="css/signin.css">
<style>div{padding: 10px;font-size:16px;}</style>
<title>Sign up</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
<div id="signin" class="text-center">
  <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
  <form method="post" action="signin_act.php" class="form-signin">
    <img class="mb-4" src="#" alt="" width="72" height="72">
    <div class="form-group">
      <label for="inputEmail" class="sr-only">Email address</label>
      <input name="loginId" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
    </div>
    <div class="form-group">
      <label for="inputPassword" class="sr-only">Password</label>
      <input name="loginPw" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    <p class="mt-5 mb-3 text-muted"><a href="signup.php">If you don't have an account yet.</a></p>
  </form>
</div>
</body>
</html>
