<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

    define('HOST','localhost');
    define('USER','root');
    define('PASSWORD','');
    define('BASE','cadastro');

    $conn = new MySQLi(HOST,USER,PASSWORD,BASE);
    
if ($conn->connect_errno) {
die("Falha na conexão: " . $conn->connect_error);

}