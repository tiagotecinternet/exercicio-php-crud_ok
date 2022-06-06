<?php
$servidor = "localhost";
$usuario = "webmaio1_tiago";
$senha = "senac*123";
$db = "webmaio1_tiago";

try {
    $conexao = new PDO("mysql:host=$servidor; dbname=$db; charset=utf8", $usuario, $senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die( "Erro: ".$e->getMessage() );
}

// var_dump($conexao);