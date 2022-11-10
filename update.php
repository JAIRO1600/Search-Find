<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Formulario de registro</title>
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

input[type="text"],
input[type="password"],
input[type="number"] {
    outline: none;
    padding: 20px;
    display: block;
    width: 300px;
    border-radius: 3px;
    border: 1px solid #eee;
    margin: 0px auto;
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


</style>
    
</head>
<?php 
        require 'parciales/header.php'
    ?>
<body>
<div id='cabec'>

    <section name="formulario" enctype="multipart/form-data">
        <form method="POST">
            <br>
            <br>
            <br>
            <br>
            <input id="info" type="text" name="info" placeholder="Enter your informacion" required="" /><br>
            <input id="price" type="text" name="price" placeholder="Enter your price" required="" /><br>
            <input id="description" type="text" name="description" placeholder="Enter your description" required=""/><br>
            <input id="location" type="text" name="location" placeholder="Enter your location" required="" /><br>           
            <input id="name" type="text" name="name" placeholder="Enter your name" required="" /><br>
            <input id="email" type="text" name="email" placeholder="Enter your email" required="" /><br>
            <input id="phone" type="number" name="phone" placeholder="Enter your phone" required="" /><br>
            <input type="file" name="image" accept=".pdf,.jpg,.png" multiple/><br>
            

            <?php
    /* Llamada a la base de datos */
    require 'database.php';
    session_start();
    $idusers;
    if(isset($_SESSION['user_id'])){
        $records = $conn->prepare('SELECT id, email, password FROM users WHERE id = :id');
        $records->bindParam(':id', $_SESSION['user_id']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);

        $user = null;

        if(count($results) > 0){
        $user = $results;
        }
        $idusers = $_SESSION['user_id'];
        }


        /* Si se le da al boton send se inserta el nuevo apartamento en la bbdd con los datos recogidos por el formulario */
        if(isset($_POST['Send'])){
            $image = $_POST['image'];
            $info = $_POST['info'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $location = $_POST['location'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];

            $con->consulta("INSERT INTO apartment (image, info, description, price, location,name, email, phone, idusers) VALUES ('$image','$info','$description','$price', '$location', '$name', '$email', '$phone', '$idusers')");
            echo "<br>";
            echo "<br>";
            echo "<p style=magin: 'auto 0'>Successfully Published Apartment!</p>";
        }

    ?>

<input id="submit" type="submit" name="Send" value="Send" />
    </form>
    </section>
    </div>
</body>

</html>