<?php
require_once 'src/funcoes-alunos.php';
$alunos = ler($conexao);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Lista de alunos - Exercício CRUD com PHP e MySQL</title>
<link href="css/style.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1>Lista de alunos</h1>
    <hr>
    <p><a href="inserir.php">Inserir novo aluno</a></p>

    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Primeira nota</th>
                <th>Segunda nota</th>
                <th>Média</th>
                <th>Situação</th>
                <th>Operações</th>
            </tr>
        </thead>
        <tbody>
    <?php foreach($alunos as $aluno) { ?>
            <tr class="<?=$aluno['situacao']?>">
                <td><?=$aluno['nome']?></td>
                <td><?=$aluno['primeira']?></td>
                <td><?=$aluno['segunda']?></td>
                <td><?=$aluno['media']?></td>
                <td><?=$aluno['situacao']?></td>
                <td>
                    <a href="atualizar.php?id=<?=$aluno['id']?>">Atualizar</a>
                    <a class="excluir" href="excluir.php?id=<?=$aluno['id']?>">Excluir</a>
                </td>
            </tr>
<?php } ?> 
        </tbody>
    </table>    

    <p><a href="index.php">Voltar ao início</a></p>
</div>

<script src="js/exclusao.js"></script>


</body>
</html>