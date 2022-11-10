<?php 

    require 'database.php';

    $message ='';

    if(!empty($_POST['email']) && (!empty($_POST['password']) && (!empty($_POST['confirm_password']) && ($_POST['password']) == ($_POST['confirm_password'])))){
        $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $_POST['email']);
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $stmt->bindParam(':password', $password);

        if($stmt->execute()){
            $message='Succesfully created new user';
        }elseif(!$stmt->execute()){
            $message='Sorry there must have been an issues creating your account ';
        }elseif($_POST['password'] != $_POST['confirm_password']){
            $message='Sorry there must have been an issues creating your account ';
        }
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="activos/css/style.css">
    <style>
body {
    margin: 10px;
    padding: 0;
    font-family: 'Roboto', sans-serif;
    text-align: center;
    background-color:#D5DBDB ;
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
#cabec {
    margin-top:40px;
    background-image:url(venta-apartamentos-ceuta-8.jpg) ;
    height: 400px;
    width:100%;
    background-repeat: cover;
    background-repeat: no-repeat;
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
</style>
</head>
<?php 
        require 'parciales/header.php'
    ?>
<body>
<div id='cabec'>
    

    <?php 
        if(!empty($message)):
    ?>
    <p><?= $message ?></p>
    <?php endif; ?>

    <h1 style="color:#FDF9F6; text-shadow: 1px 0 5px rgba(0, 0, 0, 1);">Register</h1>
    <span>or <h3><a href='login.php'>Login</a></h3></span>

    <form action ="register.php" method="POST">
    <input type='text' name='email' placeholder='Enter your email'>
    <input type='password' name='password' placeholder='Enter your password'>
    <input type='password' name='confirm_password' placeholder='Confirm your password'>
    <input type='number' name='phone' placeholder='Confirm your number phone'>
    <input type='submit' value='Send'>
</form>
</div>
</body>
</html>