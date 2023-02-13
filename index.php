<?php
    session_start();

    if($_SESSION['user']){
      header('Location: profile.php');
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Login/Signin</title>
  <link rel="stylesheet" href="./css/styleLogin.css" />
</head>

<body>
  <div class="contr">
    <form class="forma" action="vendor/signin.php" method="post">
      <label>Логин</label>
      <input class="inp-m" name="login" type="text" placeholder="Введите свой логин">
      <label>Пароль</label>
      <input class="inp-m" name="password" type="password" placeholder="Введите пароль">
      <button class="btn-log" type="submit">Войти</button>
      <p>
        У вас нет акаунта? - <a href="/register.php">зарегистрируйтесь</a>
      </p>
      <?php 
          if ($_SESSION['message']){
            echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
          }
           unset($_SESSION['message']);
        ?>
    </form>
  </div>
</body>

</html>