<?php
session_start(); // necessário sempre para trabalhar com funções

/*
A diferença entre include e require é a forma como um erro é tratado.
require produz um erro E_COMPILE_ERROR , o que encerra a execução do script.
O include apenas produz um warning que pode ser "abafado" com @ .
include_once tem a garantia que o arquivo não será incluído novamente se ele já foi incluído antes
*/
include './../app/phperror.php';
include './../app/configuracao.php';
include './../app/autoload.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= APP_NOME ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= URL ?>/public/css/estilos.css">
</head>

<body>
    <?php
    include '../app/Views/topo.php'; // incluindo uma view para ser exibida como um componente na página
    $rotas = new Rota(); // instanciando a classe Rota que já irá executar automaticamente seu método contrutor
    include '../app/Views/rodape.php';
    ?>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="<?= URL ?>/public/js/jquery.funcoes.js"></script>
</body>

</html>