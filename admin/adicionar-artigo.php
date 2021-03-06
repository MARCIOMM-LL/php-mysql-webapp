<?php

#Os ../ servem para subir um nível na hierarquia de pastas
require_once "../config.php";
require_once "../src/Artigo.php";
require_once "../src/redireciona.php";

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $artigo = new Artigo($mysql);
    #Inserindo dados no banco
    $artigo->adicionar($_POST['titulo'], $_POST['conteudo']);

    #Redirecionar para outra página para não continuar o 
    #carregamento do formulário sucessivamente. A função 
    #header() serve para adicionar cabeçalhos ao http
    #Em matemática e ciência da computação, a idempotência é 
    #a propriedade que algumas operações têm de poderem ser 
    #aplicadas várias vezes sem que o valor do resultado se 
    #altere após a aplicação inicial.
    // header('Location: http://php-mysql-webapp.test/admin/index.php');
    // die();

    redireciona('http://php-mysql-webapp.test/admin/index.php');
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <meta charset="UTF-8">
    <title>Adicionar Artigo</title>
</head>

<body>
    <div id="container">
        <h1>Adicionar Artigo</h1>
        <form action="adicionar-artigo.php" method="post">
            <p>
                <label for="">Digite o título do artigo</label>
                <input class="campo-form" type="text" name="titulo" id="titulo" />
            </p>
            <p>
                <label for="">Digite o conteúdo do artigo</label>
                <textarea class="campo-form" type="text" name="conteudo" id="conteudo"></textarea>
            </p>
            <p>
                <button class="botao">Criar Artigo</button>
            </p>
        </form>
    </div>
</body>

</html>