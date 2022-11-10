<?php 

class searchandfind
{

    private $host;

    private $user;

    private $password;

    private $dbname;

    private $port;

    private $socket;

    private $descriptor;

    private $resultado;

    function __construct($host, $user, $password, $dbname, $port, $socket)
    {
        $this->ost = $host;
        $this->user = $user;
        $this->password = $password;
        $this->dbname = $dbname;
        $this->port = $port;
        $this->socket = $socket;
        $this->descriptor = mysqli_connect($this->host, $this->user, $this->password, $this->dbname, $this->port, $this->socket);
    }

    public function consulta($consulta)
    {
        $this->resultado = mysqli_query($this->descriptor, $consulta);
    }

    public function extraer_registro()
    {
        if ($fila = mysqli_fetch_array($this->resultado, MYSQLI_ASSOC)) {
            return $fila;
        } else {
            return false;
        }
    }
}

$server = '127.0.0.1';
$port = 3306;
$socket = "";
$username='root';
$password='';
$database='s&fdatabase';


$con = new searchandfind($server, $username, $password, $database, $port, $socket);
$conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);





?>