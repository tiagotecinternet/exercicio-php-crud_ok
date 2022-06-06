<?php
require "conecta.php";

function inserir(PDO $conexao, string $nome, float $primeira, float $segunda, float $media, string $situacao){
   $sql = "INSERT INTO alunos (nome, primeira, segunda, media, situacao) 
   VALUES(:nome, :primeira, :segunda, :media, :situacao)";

   try {
      $consulta = $conexao->prepare($sql);
      $consulta->bindParam(':nome', $nome, PDO::PARAM_STR);
      $consulta->bindParam(':primeira', $primeira, PDO::PARAM_STR);
      $consulta->bindParam(':segunda', $segunda, PDO::PARAM_STR);
      $consulta->bindParam(':media', $media, PDO::PARAM_STR);
      $consulta->bindParam(':situacao', $situacao, PDO::PARAM_STR);
      $consulta->execute();
   } catch(Exception $erro){ 
      die( "Erro: " .$erro->getMessage());
   }
}

function ler(PDO $conexao){
   $sql = "SELECT * FROM alunos ORDER BY nome";

    try {
        $consulta = $conexao->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
    } catch(Exception $erro){ 
        die( "Erro: " .$erro->getMessage());
    }
    return $resultado;
} 



function lerUm(PDO $conexao, int $id):array {
   $sql = "SELECT * FROM alunos WHERE id = :id";

   try {
     $consulta = $conexao->prepare($sql);
     $consulta->bindParam(':id', $id, PDO::PARAM_INT);
     $consulta->execute();
     $resultado = $consulta->fetch(PDO::FETCH_ASSOC);
     
   } catch (Exception $erro) {
     die( "Erro: " .$erro->getMessage());
   }
   return $resultado;
}


function atualizar(PDO $conexao, int $id, string $nome, float $primeira, float $segunda, float $media, string $situacao):void {

   $sql = "UPDATE alunos SET nome = :nome, primeira = :primeira, segunda = :segunda, 
   media = :media, situacao = :situacao WHERE id = :id";

   try {
      $consulta = $conexao->prepare($sql);
      $consulta->bindParam(':id', $id, PDO::PARAM_INT);
      $consulta->bindParam(':nome', $nome, PDO::PARAM_STR);
      $consulta->bindParam(':primeira', $primeira, PDO::PARAM_STR);
      $consulta->bindParam(':segunda', $segunda, PDO::PARAM_STR);
      $consulta->bindParam(':media', $media, PDO::PARAM_STR);
      $consulta->bindParam(':situacao', $situacao, PDO::PARAM_STR);
     $consulta->execute();
   } catch (Exception $erro) {
     die( "Erro: " .$erro->getMessage());
   }
}

function excluir(PDO $conexao, int $id):void {
   $sql = "DELETE FROM alunos WHERE id = :id";
   try {
     $consulta = $conexao->prepare($sql);
     $consulta->bindParam(':id', $id, PDO::PARAM_INT);
     $consulta->execute();
   } catch (Exception $erro) {
     die( "Erro: " .$erro->getMessage());
   }
}

function calculaMedia(float $nota1, float $nota2):float {
   return ($nota1 + $nota2) / 2;
}

function verificaSituacao(float $media):string {
   return ($media >= 7) ? "aprovado" : "reprovado";
}