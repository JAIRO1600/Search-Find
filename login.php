<?php 
  session_start();

  if (isset($_SESSION['user_id'])) {
    header('Location: /S&F');
  }
  require 'database.php';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
      $_SESSION['user_id'] = $results['id'];
      header("Location: /S&F");
    } else {
      $message = 'Sorry, those credentials do not match';
    }
  }

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="activos/css/style.css">
    <style>
body {
    margin: 10px;
    padding: 0;
    font-family: 'Roboto', sans-serif;
    text-align: center;
    background-color:#D5DBDB ;

    
}
input[type="text"],
input[type="password"],
input[name="phone"] {
    outline: none;
    padding: 20px;
    display: block;
    width: 300px;
    border-radius: 3px;
    border: 1px solid #eee;
    margin: 20px auto;
}
#logo{
background-image:url(logoSearch.jpg);

}
#cabec {
    margin-top:40px;
    background-image:url(venta-apartamentos-ceuta-8.jpg) ;
    height: 400px;
    width:100%;
    background-repeat: cover;
    background-repeat: no-repeat;
}
input[value="Send"] {
    padding: 10px;
    color: #fff;
    background: #FB960C ;
    width: 180px;
    margin: 200px auto;
    border: 0;
    border-radius: 3px;
    cursor: pointer;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.7);
}
</style>
  </head>
  <?php require 'parciales/header.php' ?>
  <body>
  <div id='cabec'>
   

    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

    <h1 style="color:#FDF9F6 ; text-shadow: 1px 0 5px rgba(0, 0, 0, 1); ">Login</h1>
    <span>or <h3><a href="register.php">Register</a></h3></span>

    <form action="login.php" method="POST">
      <input name="email" type="text" placeholder="Enter your email">
      <input name="password" type="password" placeholder="Enter your Password">
      <input type="submit" value="Send">
    </form>
    </div>
  </body>
</html>