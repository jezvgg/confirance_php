<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Конференция</title>
    <link rel="stylesheet" href="index-css.css">
  </head>
  <body>
    <div class="main-container">
        <div class="card">
            <div class="card-header">
                <h1 class="header-text">Регистрация</h1>
            </div>
            <div class="card-body">
              <form method="POST" action="main.php">
                <fieldset>
                  <legend>Имя и фамилия</legend>
                  <input type="text" name="name" id="name" class="text-input" placeholder="Иван" value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>">
                  <input type="text" name="surname" id="surname" class="text-input" placeholder="Иванов" value="<?php echo isset($_POST['surname']) ? htmlspecialchars($_POST['surname']) : ''; ?>">
                </fieldset>

                <fieldset>
                  <legend>Телефон и email</legend>
                  <input type="tel" name="phone" id="phone" class="text-input" placeholder="+71231231212" value="<?php echo isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : ''; ?>">
                  <input type="email" name="email" id="email" class="text-input" placeholder="smth@smth.sm" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
                </fieldset>

                <label for="theme">Тематика Конференция</label><br>
                  <select name="theme" id="theme" class="text-input" value="<?php echo isset($_POST['theme']) ? htmlspecialchars($_POST['theme']) : ''; ?>">
                    <option value="buisness">Бизнес 💼</option>
                    <option value="technology">Технологии 💻</option>
                    <option value="markating">Реклама и маркетинг 📺</option>
                  </select><br>

                <label for="payment">Метод оплаты</label><br>
                  <select name="payment" id="payment" class="text-input" value="<?php echo isset($_POST['payment']) ? htmlspecialchars($_POST['payment']) : ''; ?>">
                    <option value="web-money">WebMoney</option>
                    <option value="yandex">Яндекс.Деньги</option>
                    <option value="paypal">PayPal</option>
                    <option value="card">Кредитная карта</option>
                  </select>

                <br>
                <input type="checkbox" id="verify" name="verify" value="<?php echo isset($_POST['payment']) ? htmlspecialchars($_POST['payment']) : ''; ?>"/>
                <label for="verify">Рзрешение на обработку персональных данных</label>

                <br>
                <input type="checkbox" id="email-sender" name="email-sender" value="<?php echo isset($_POST['payment']) ? htmlspecialchars($_POST['payment']) : ''; ?>"/>
                <label for="email-sender">Я хочу получать рассылку о конференции</label>
                
                <br>
                <input type="submit" class="submit-button" value="Отправить">

              </form>
            </div>
            
        </div>
    </div>

  </div>
    
  </body>
</html>