<?php
    require "db.php";
?>
<?php
$data = $_POST;
if(isset($data['do_signup']))
{
    //здесь регестрируем

    $errors = array();
  /*  if( trim($data['name']) == '')
    {
        $errors[] = 'Введите Name';
    }
  */
    if( trim($data['email']) == '')
    {
        $errors[] = 'Введите Email';
    }

    if( R::count('users',"email = ?", array($data['email'])) > 0)
    {
        $errors[] = 'Пользователь с таким Email существует!';
    }
    if( empty($errors))
    {
        //всё отлично регестрируем
        $user = R::dispense('users');
        $user->email = $data['email'];
       // $user->name = $data['name'];
        R::store($user);
        header('Location: /');
        //echo '<div style="color: green";>Вы успешно зарегестрированы!<br>
          //  Можете перейти на <a href="/">Главную</a> страницу!</div><hr>';

    } else
    {
        echo '<div style="color: red";>'.array_shift($errors).'</div><hr>';
    }
}
?>

<!DOCTYPE html>
<html lang="en" >

<head>
    <meta charset="UTF-8">
    <title>Brocoli</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto|Ubuntu" rel="stylesheet">
</head>

<body>
<form value="do_signup" method="POST">
    <div class="container">
        <h1>Sign Up</h1>
        <p>Please fill in this form to create an account.</p>
        <hr>
      <!--  <label for="name"><b>Name</b></label>
        <input type="text" placeholder="Enter Name " name="name"><br>
-->
        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="email">

        <label>
            <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
        </label>

        <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

        <div class="clearfix">
            <button type="button" class="cancelbtn">Cancel</button>
            <button type="submit" name="do_signup">Sign Up</button>
        </div>
    </div>
</form>
</body>

</html>
