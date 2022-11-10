<?php
session_start();
require 'database.php';

if(isset($_SESSION['user_id'])){
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    
    $user = null;
    
    if(count($results) > 0){
    $user = $results;
    }
    
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to Search&Find</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="activos/css/style.css">
    <style>
body {    
    font-family: 'Roboto', sans-serif;
    text-align: center;
    background-color:#D5DBDB;
}

#cabec {
    margin-top:40px;
    background-image:url(venta-apartamentos-ceuta-8.jpg) ;
    height: 500px;
    width:100%;
    background-repeat: cover;
    background-repeat: no-repeat;
}

/*#ficha{
padding: auto;
height: 250px;
border-radius: 10px;
background-color:grey;
border: 1px solid black;
}*/

#texto{
    width:40%;
    padding:4px;
    margin-left:50px;
    text-align: left; 
    
}
img{
    height:250px;
    width:400px;
    margin-right:30px;
    margin-bottom:30px;
    float:right;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.7);
    border: 1px solid white; 
    padding:10px;


}
/*input[type="submit"] {
    padding: 10px;
    color: #fff;
    background: #0098cb;
    width: 320px;
    margin: 200px auto;
    border: 0;
    border-radius: 3px;
    cursor: pointer;
}
*/
input[value="Log In"] {
    padding: 10px;
    color: #fff;
    background: #FB960C ;
    width: 180px;
    border: 0;
    border-radius: 3px;
    cursor: pointer;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.7); 
    position:absolute;
    margin-left: -182px;
    margin-top: -60px;
   
}

input[value="Publish for Free"] {
    padding: 10px;
    color: #fff;
    background: #FB960C ;
    width: 180px;
    margin: 200px auto;
    border: 0;
    border-radius: 3px;
    cursor: pointer;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.7);
    position:absolute;
    margin-left: -182px;
    margin-top: -60px;
}

input[value="Find"] {
    padding: 10px;
    color: #fff;
    background: #FB960C ;
    width: 60px;
    margin: 140px auto;
    border: 0;
    border-radius: 3px;
    cursor: pointer;
    height: 60px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.7);
    margin-top:350px;
    position:relative;
}

input[value="Contact"] {
    padding: 10px;
    color: #fff;
    background: #FB960C ;
    width: 180px;
    border: 0;
    border-radius: 3px;
    cursor: pointer;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.7);
    
}

table{
    background-image:url(fondo-abstracto-suave-acuarela_1055-8407.jpg);
    background-color:white;
    width: 80%;
    height: 40  0px;
    margin: 0 auto;
    margin-top:10px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.7);
    padding:10px;
    border:2px solid white; 
    background-repeat: cover;
    background-repeat: no-repeat;
}

.table1{
    background-color:#BFBBBA  ;
    width: 60%;
    height: 100px;
    margin: 0 auto;
    margin-top:10px;
    padding:20px;
    background-repeat: cover;
    background-repeat: no-repeat;
    border:1px solid black;
}
#logo{
    background-image:url(logoSearch.pdf);
    float:left;
    width: 50px;
    height: 50px;
}

input[name="location"] {
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.7);
    padding: 20px;
    text-align: left; 
    width: 180px;
    border-radius: 3px;
    border: 1px solid #eee;
    height: 18px;
}
select[name="price"] {
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.7);
    padding: 20px;
    text-align: left; 
    border-radius: 3px;
    border: 1px solid #eee;
}

input[value="Profile"] {
    padding: 10px;
    color: #fff;
    background: #029886 ;
    width: 180px;
    border: 0;
    border-radius: 3px;
    cursor: pointer;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.7);
    
}

.headerLog{   
    float:right;
    
}


</style>
</head>
<?php 
        require 'parciales/header.php';
        echo"<div id='logo'>
        </div>";
?>
    <body>
        <div id='cabec'>
        <?php
        if(!empty($user)):
        ?>
                <div class="headerLog">              
                        <a href="update.php"><input type="submit" value="Publish for Free"></a>
                </div>
        <form method='POST'>
         
        <input type='text' name='location' id='search' placeholder='search by location'>
       <!--<input type='number' name='price' id='price' placeholder='search by price'>-->  
         
        <select name='price' id='location' placeholder='search by price' >
                        <option value='0'>All prices</option>
						<option value='200'>up to 200€</option>
						<option value='300'>between 300€ and 500€</option>
						<option value='500'>between 500€ and 700€</option>
						<option value='700'>between 700€ and 1000€</option>
						<option value='1000'>more than 1000€</option>
		</select>
        <input type="submit" value="Find" name='Find'>
        </form> 
        <div class=table1> 
                <TR>
                <TD>
                <div class="header">
                        <a href="profile.php"><input type="submit" value="Profile"></a>
                </div>   
        <br>Welcome. <?= $user['email']; ?>
        <br>You are Succesfully Logged In <a href='logout.php'>Logout</a>
        </TR>
                </TD>
        </div> 
        <?php else: ?>
            <div class="headerLog">
                <a href="login.php">
                <input type="submit" value="Log In"></a>
            </div>
            <form method='POST'>
            <input type='text' name='location' placeholder='search by location'>
            <!--<input type='number' name='price' id='price' placeholder='search by price'>-->
            
            <select name='price' id='price' placeholder='search by price' value='search by price'>
                        <option value='0'>All prices</option>
						<option value='200'>up to 200€</option>
						<option value='300'>between 300€ and 500€</option>
						<option value='500-700'>between 500€ and 700€</option>
						<option value='700'>between 700€ and 1000€</option>
						<option value='1000'>more than 1000€</option>
			</select>
            <input type="submit" value="Find" name='Find'>
             </form>       

        <?php endif; ?>
        <?php     
        if(!isset($_POST['Find'])){
                $con->consulta("SELECT image, info,description,price,location,name,email, phone FROM apartment");
            while ($fila = $con->extraer_registro()) {
                /*echo"<div id='ficha'>"; */
                echo"<TABLE>
                <TR>
                <TD>";
                foreach ($fila as $key => $valor)  {
                    /*$total = array_shift($valor);*/
                    echo "<div id='texto'>$valor</div>";  
                if ($key == 'image' ) {  
                    echo "<img src='$valor'>";
                    }
                if ($key == 'name' ) {  
                        $name = $valor;
                    }
                if ($key == 'email' ) {  
                        $email = $valor;
                        } 
                if ($key == 'phone' ) {  
                            $phone = $valor;
                        }
                }echo"<a href='contacto.php?name=$name&email=$email&phone=$phone'><input type='submit' value='Contact'></a><br></TD><br><br>
                </TR> 
                </TABLE><br><br>"; 
            }
        }elseif (isset($_POST['Find'])) {
            $price = $_POST['price'];
            $location = $_POST['location'];

            /* Si la locaclizacion es vacía */
            if(empty($location)){
                if ($price == 0) {
                    $con->consulta("SELECT image, info,description,price,location,name,email,phone FROM apartment");
                    while ($fila = $con->extraer_registro()) {
                        /*echo"<div id='ficha'>"; */
                        echo"<TABLE>
                        <TR>
                        <TD>";
                        foreach ($fila as $key => $valor)  {
                            echo "<div id='texto'>$valor</div>";  
                        if ($key == 'image' ) {  
                            echo "<img src='$valor'>";
                            }
                        if ($key == 'name' ) {  
                                $name = $valor;
                            } 
                        if ($key == 'email' ) {  
                                $email = $valor;
                            }
                        if ($key == 'phone' ) {  
                                $phone = $valor;
                            } 
                        }echo"<a href='contacto.php?name=$name&email=$email&phone=$phone'><input type='submit' value='Contact'></a></TD><br><br>
                        </TR> 
                        </TABLE><br><br>";
                    }
                } elseif ($price  == 200) {
                    $con->consulta("SELECT image, info,description,price,location,name,email,phone FROM apartment WHERE price <= '$price'");
                    while ($fila = $con->extraer_registro()) {
                        /*echo"<div id='ficha'>"; */
                        echo"<TABLE>
                        <TR>
                        <TD>";
                        foreach ($fila as $key => $valor)  {
                            echo "<div id='texto'>$valor</div>";  
                        if ($key == 'image' ) {  
                            echo "<img src='$valor'>";
                            }
                        if ($key == 'name' ) {  
                                $name = $valor;
                            } 
                        if ($key == 'email' ) {  
                                $email = $valor;
                                }
                        if ($key == 'phone' ) {  
                                    $phone = $valor;
                                }  
                        }echo"<a href='contacto.php?name=$name&email=$email&phone=$phone'><input type='submit' value='Contact'></a></TD><br><br>
                        </TR> 
                        </TABLE><br><br>";
                    }
                } elseif ($price  == 300) {    
                    $con->consulta("SELECT image, info,description,price,location,name,email,phone FROM apartment WHERE price BETWEEN '$price' AND 500 ");
                    while ($fila = $con->extraer_registro()) {
                        /*echo"<div id='ficha'>"; */
                        echo"<TABLE>
                        <TR>
                        <TD>";
                        foreach ($fila as $key => $valor)  {
                            echo "<div id='texto'>$valor</div>";  
                        if ($key == 'image' ) {  
                            echo "<img src='$valor'>";
                            }
                        if ($key == 'name' ) {  
                                $name = $valor;
                            }  
                        if ($key == 'email' ) {  
                                $email = $valor;
                                }
                        if ($key == 'phone' ) {  
                                    $phone = $valor;
                                }  
                        }echo"<a href='contacto.php?name=$name&email=$email&phone=$phone'><input type='submit' value='Contact'></a></TD><br><br>
                        </TR> 
                        </TABLE><br><br>"; 
                    }
                } elseif ($price  == 500) {
                    $con->consulta("SELECT image, info,description,price,location,name,email,phone FROM apartment WHERE price BETWEEN '$price' AND 700 ");
                    while ($fila = $con->extraer_registro()) {
                        /*echo"<div id='ficha'>"; */
                        echo"<TABLE>
                        <TR>
                        <TD>";
                        foreach ($fila as $key => $valor)  {
                            echo "<div id='texto'>$valor</div>";  
                        if ($key == 'image' ) {  
                            echo "<img src='$valor'>";
                            }
                        if ($key == 'name' ) {  
                                $name = $valor;
                            }  
                        if ($key == 'email' ) {  
                                $email = $valor;
                                }
                        if ($key == 'phone' ) {  
                                    $phone = $valor;
                                }  
                        }echo"<a href='contacto.php?name=$name&email=$email&phone=$phone'><input type='submit' value='Contact'></a></TD><br><br>
                        </TR> 
                        </TABLE><br><br>"; 
                    }
                } elseif ($price  == 700) {
                    $con->consulta("SELECT image, info,description,price,location,name,email,phone FROM apartment WHERE price BETWEEN '$price' AND 1000 ");
                    while ($fila = $con->extraer_registro()) {
                        /*echo"<div id='ficha'>"; */
                        echo"<TABLE>
                        <TR>
                        <TD>";
                        foreach ($fila as $key => $valor)  {
                            echo "<div id='texto'>$valor</div>";  
                        if ($key == 'image' ) {  
                            echo "<img src='$valor'>";
                            }
                        if ($key == 'name' ) {  
                                $name = $valor;
                            }  
                        if ($key == 'email' ) {  
                                $email = $valor;
                                }
                        if ($key == 'phone' ) {  
                                    $phone = $valor;
                                }  
                        }echo"<a href='contacto.php?name=$name&email=$email&phone=$phone'><input type='submit' value='Contact'></a></TD><br><br>
                        </TR> 
                        </TABLE><br><br>";
                    }
                } elseif ($price  == 1000) {
        
                    $con->consulta("SELECT image, info,description,price,location,name,email,phone FROM apartment WHERE price >= '$price'");
                    while ($fila = $con->extraer_registro()) {
                        /*echo"<div id='ficha'>"; */
                        echo"<TABLE>
                        <TR>
                        <TD>";
                        foreach ($fila as $key => $valor)  {
                            echo "<div id='texto'>$valor</div>";  
                        if ($key == 'image' ) {  
                            echo "<img src='$valor'>";
                            }
                        if ($key == 'name' ) {  
                                $name = $valor;
                            }   
                        if ($key == 'email' ) {  
                                $email = $valor;
                                }
                        if ($key == 'phone' ) {  
                                    $phone = $valor;
                                } 
                        }echo"<a href='contacto.php?name=$name&email=$email&phone=$phone'><input type='submit' value='Contact'></a></TD><br><br>
                        </TR> 
                        </TABLE><br><br>"; 
                    }
                }
            /* Si la localizacion y el rango de precio estan cumplimentados */
            } else {
                if ($price == 0) {
                    $con->consulta("SELECT image, info,description,price,location,name,email,phone FROM apartment WHERE location = '$location'");
                    while ($fila = $con->extraer_registro()) {
                        /*echo"<div id='ficha'>"; */
                        echo"<TABLE>
                        <TR>
                        <TD>";
                        foreach ($fila as $key => $valor)  {
                            echo "<div id='texto'>$valor</div>";  
                        if ($key == 'image' ) {  
                            echo "<img src='$valor'>";
                            }
                        if ($key == 'name' ) {  
                                $name = $valor;
                            }  
                        if ($key == 'email' ) {  
                                $email = $valor;
                            }
                        if ($key == 'phone' ) {  
                                $phone = $valor;
                            } 
                        }echo"<a href='contacto.php?name=$name&email=$email&phone=$phone'><input type='submit' value='Contact'></a></TD><br><br>
                        </TR> 
                        </TABLE><br><br>"; 
                    }
                } elseif ($price  == 200) {
                    $con->consulta("SELECT image, info,description,price,location,name,email,phone FROM apartment WHERE price <= '$price' AND location = '$location'");
                    while ($fila = $con->extraer_registro()) {
                        /*echo"<div id='ficha'>"; */
                        echo"<TABLE>
                        <TR>
                        <TD>";
                        foreach ($fila as $key => $valor)  {
                            echo "<div id='texto'>$valor</div>";  
                        if ($key == 'image' ) {  
                            echo "<img src='$valor'>";
                            }
                        if ($key == 'name' ) {  
                                $name = $valor;
                            }   
                        if ($key == 'email' ) {  
                                $email = $valor;
                            }
                        if ($key == 'phone' ) {  
                                $phone = $valor;
                            }  
                        }echo"<a href='contacto.php?name=$name&email=$email&phone=$phone'><input type='submit' value='Contact'></a></TD><br><br>
                        </TR> 
                        </TABLE><br><br>"; 
                    }
                } elseif ($price  == 300) {    
                    $con->consulta("SELECT image, info,description,price,location,name,email,phone FROM apartment WHERE price BETWEEN '$price' AND 500 AND  location = '$location' ");
                    while ($fila = $con->extraer_registro()) {
                        /*echo"<div id='ficha'>"; */
                        echo"<TABLE>
                        <TR>
                        <TD>";
                        foreach ($fila as $key => $valor)  {
                            echo "<div id='texto'>$valor</div>";  
                        if ($key == 'image' ) {  
                            echo "<img src='$valor'>";
                            }
                        if ($key == 'name' ) {  
                                $name = $valor;
                            }   
                        if ($key == 'email' ) {  
                                $email = $valor;
                            }
                        if ($key == 'phone' ) {  
                                $phone = $valor;
                            }  
                        }echo"<a href='contacto.php?name=$name&email=$email&phone=$phone'><input type='submit' value='Contact'></a></TD><br><br>
                        </TR> 
                        </TABLE><br><br>"; 
                    }
                } elseif ($price  == 500) {
                    $con->consulta("SELECT image, info,description,price,location,name,email,phone FROM apartment WHERE price BETWEEN '$price' AND 700 AND  location = '$location' ");
                    while ($fila = $con->extraer_registro()) {
                        /*echo"<div id='ficha'>"; */
                        echo"<TABLE>
                        <TR>
                        <TD>";
                        foreach ($fila as $key => $valor)  {
                            echo "<div id='texto'>$valor</div>";  
                        if ($key == 'image' ) {  
                            echo "<img src='$valor'>";
                            }
                        if ($key == 'name' ) {  
                                $name = $valor;
                            }   
                        if ($key == 'email' ) {  
                                $email = $valor;
                            }
                        if ($key == 'phone' ) {  
                                $phone = $valor;
                            }  
                        }echo"<a href='contacto.php?name=$name&email=$email&phone=$phone'><input type='submit' value='Contact'></a></TD><br><br>
                        </TR> 
                        </TABLE><br><br>"; 
                    }
                } elseif ($price  == 700) {
                    $con->consulta("SELECT image, info,description,price,location,name,email,phone FROM apartment WHERE price BETWEEN '$price' AND 1000 AND  location = '$location' ");
                    while ($fila = $con->extraer_registro()) {
                        /*echo"<div id='ficha'>"; */
                        echo"<TABLE>
                        <TR>
                        <TD>";
                        foreach ($fila as $key => $valor)  {
                            echo "<div id='texto'>$valor</div>";  
                        if ($key == 'image' ) {  
                            echo "<img src='$valor'>";
                            }
                        if ($key == 'name' ) {  
                                $name = $valor;
                            }   
                        if ($key == 'email' ) {  
                                $email = $valor;
                            }
                        if ($key == 'phone' ) {  
                                $phone = $valor;
                            }  
                        }echo"<a href='contacto.php?name=$name&email=$email&phone=$phone'><input type='submit' value='Contact'></a></TD><br><br>
                        </TR> 
                        </TABLE><br><br>";
                    }
                } elseif ($price  == 1000) {
        
                    $con->consulta("SELECT image, info,description,price,location,name,email,phone FROM apartment WHERE price >= '$price' AND location = '$location'");
                    while ($fila = $con->extraer_registro()) {
                        /*echo"<div id='ficha'>"; */
                        echo"<TABLE>
                        <TR>
                        <TD>";
                        foreach ($fila as $key => $valor)  {
                            echo "<div id='texto'>$valor</div>";  
                        if ($key == 'image' ) {  
                            echo "<img src='$valor'>";
                            }
                        if ($key == 'name' ) {  
                                $name = $valor;
                            }   
                        if ($key == 'email' ) {  
                                $email = $valor;
                            }
                        if ($key == 'phone' ) {  
                                $phone = $valor;
                            } 
                        }echo"<a href='contacto.php?name=$name&email=$email&phone=$phone'><input type='submit' value='Contact'></a></TD><br><br>
                        </TR> 
                        </TABLE><br><br>";
                    }
                }
            }
        }
        ?>
        </div>
        </cabecera>
    </body>
</html>




