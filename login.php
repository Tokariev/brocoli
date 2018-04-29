<?php
  require "db.php";

  $data = $_POST;
  if( isset($data['do_login']))
  {
      $errors = array();
      $user = R::findOne('users', 'email = ?', array($data['email']));
      if( $user )
      {
          //запоминаем пользователя
          $_SESSION['logged_user'] = $user ->email;
          header('Location: /');
      } else
      {
          $errors[] = 'Пользователь с таким Email не найден!';
      }
      if( !empty($errors))
      {
          echo '<div style="color: red";>'.array_shift($errors).'</div><hr>';
      }
  }
?>

    <form action="login.php" method="POST";>
        <p>
          <p><strong>Ваш Email</strong>:</p>
          <input type="text" name="email" value="<?php echo @$data['email']; ?>">
        </p>
        <p>
            <button type="submit" name="do_login">Войти</button>
        </p>
    </form>