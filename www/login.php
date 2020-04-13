<?php
    if(!isset($_POST['login'])){
?>
<html>
<head><title>Login</title>

<link rel="stylesheet" href="login.css"></head>

<body>
<div class="login-page">
  <div class="form">
    <form class="login-form" action="" method="post">
      <input type="text" name="username" placeholder="username"/>
      <input type="password" name="password" placeholder="password"/>
      <button type="submit" name="login">login</button>
    </form>
  </div>
</div>
</body>
</html>
<?php
    } else{
        $username = $_POST['username'];
        $password = $_POST['password'];
        if($username == "rahul" && $password == "123"){
            session_start();
            $_SESSION['username'] = $username;
            $home_url = 'http://' . $_SERVER['HTTP_HOST'] .'/';
            header('Location: ' . $home_url);
        } else{
            $home_url = 'http://' . $_SERVER['HTTP_HOST'] .'/login.php';
            header('Location: ' . $home_url);
        }
    }
?>