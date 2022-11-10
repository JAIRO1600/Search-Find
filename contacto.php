<?php
session_start();
require 'parciales/header.php';
require 'database.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Formulario de contacto</title>
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
#contact{
    text-align: left;
    margin-left: 150px;
    position:absolute;   
    height:250px;
    width:200px;
    padding:15px;
    border-radius: 3px;
    margin-top: -150px;
    color: #fff;
    background:#029886;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.7);
    text-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    font-family:
}
</style>   
</head>
<body>
<div id='cabec'>
   <h1 style="color:#FDF9F6 ; text-shadow: 1px 0 5px rgba(0, 0, 0, 1); ">Contact</h1>
    <section name="formulario" enctype="multipart/form-data">
        <form method="POST">
            <br>
            <br>
            <br>
            <br>
            <input id="email" type="text" name="email" placeholder="prueba@.mail.com" required="" /><br>
            <input id="title" type="text" name="title" placeholder="Enter your title" required="" /><br>
                <div id='contact'>
                    <h2>Contact Details</h2>
                    <hr>
                    <?php
                        print $_GET['name'];
                        echo "<br>";
                        echo "<br>";
                        print $_GET['email'];
                        echo "<br>";
                        echo "<br>";
                        print $_GET['phone'];
                    ?>
                </div>           
            <input id="message" style ="height: 150px; "type="text" name="message" placeholder="Enter your message" required="" /><br>
            <input id="submit" type="submit" name="Send" value="Send" />    
        </form>    
    </section>
    </div>
</body>
<?php
if(isset($_POST['Send'])){
// múltiples recipientes
$para  = $_GET['email'] . ', ';
// asunto
$asunto = $_POST['title'] . "\r\n";
// mensaje
$mensaje = $_POST['message'] . "\r\n";
// Para enviar correo HTML, la cabecera Content-type debe definirse
$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
// Cabeceras adicionales
$cabeceras .= $_GET['name'] . "\r\n";
echo "<br>";
$cabeceras .= 'From:Estoy interesad@ en tu anuncio!' . "\r\n";
// Enviarlo
if (mail($para, $asunto, $mensaje, $cabeceras)){
    echo "<br>";echo "<br>";echo "<br>";echo "<br>";
    echo "<br>";echo "<br>";echo "<br>";echo "<br>";
    echo "Message successfully sent !!";
}else{
    echo "An error has occurred, please try again";
}
}
?>

</html>