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

<!-- Форма регитсрации-->

<body>
  <div class="contr">
    <form class="forma" action="vendor/signup.php" method="post" enctype="multipart/form-data">
      <label>ФИО</label>
      <input class="inp-m" name="full_name" type="text" placeholder="Введите свое полное имя">
      <label>Логин</label>
      <input class="inp-m" name="login" type="text" placeholder="Введите свой логин">
      <label>Почта</label>
      <input class="inp-m" name="email" type="email" placeholder="Введите адрес своей почты">
      <label>Изображение профиля</label>
      <input class="inp-m" name="avatar" type="file">
      <label>Пароль</label>
      <input class="inp-m" name="password" type="password" placeholder="Введите пароль">
      <label>Подтвержддение пароля</label>
      <input class="inp-m" name="password_confirm" type="password" placeholder="Подтвердите пароль">
      <button class="btn-log" type="submit">Войти</button>
      <p>
        У вас уже есть акаунт? - <a href="/index.php">авторизируйтесь</a>
      </p>
      <?php 
          if ($_SESSION['message']){
            echo '<p class="msg"> ' . $_SESSION['message'] . '</p>';
          }
           unset($_SESSION['message']);

        ?>
    
    </form>
  </div>
</body>

</html>