<!doctype html>
<?php session_start() ;
$hash = '$2y$10$7ylPN0NdpMO1s7ZJHRpgleoE1Tg/boaSR0hptDBzBgfQWAvt55OD6';
if (isset($_POST['login']) and isset($_POST['password']) and
    $_POST['login'] == 'admin' and password_verify($_POST['password'], $hash)) {
        $_SESSION['logged'] = true;
        $_SESSION['time'] = time();
        header("Location: admin.php");
    }
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Конференция</title>
    <link rel="stylesheet" href="login-css.css">
  </head>
  <body>
    <div class="main-container">
        <div class="card">
            <div class="card-header">
                <h1 class="header-text">Логин</h1>
            </div>
            <div class="card-body">
              <form method="POST" action="login.php">
                <fieldset>
                  <legend>Логин</legend>
                  <input type="text" name="login" id="login" class="text-input" placeholder="admin">
                </fieldset>

                <fieldset>
                  <legend>Пароль</legend>
                  <input type="text" name="password" id="password" class="text-input" placeholder="********">
                </fieldset>

                <input type="submit" class="submit-button" value="Войти">

              </form>
            </div>
            
        </div>
    </div>

  </div>
    
  </body>
</html>