<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/busca.css">
    <link rel="stylesheet" href="css/hamburguer.css"/>
    <link rel="shortcut icon" href="img/anjos_da_guarda_logo_favicon.png" >
    <script type="text/javascript" src="js/animacao_hamb.js"></script>
    <title>Busca de cuidador</title>
</head>

<body>
    <header>
        <a href="index.php"><img src="img/anjos_da_guarda_logo_nomeLateral.png"></a>
        <div id="menu">
            <div id="menu-bar" onclick="menuOnClick()">
                <div id="bar1" class="bar"></div>
                <div id="bar2" class="bar"></div>
                <div id="bar3" class="bar"></div>
            </div>
            
            <nav class="nav" id="nav">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="telaBusca.php">Buscar</a></li>
                    <li><a href="perfilCliente.php">Meu Perfil</a></li>
                    <li><a href="editarPerfil_client.php">Editar perfil</a></li>
                    <li><a href="contato.php">Fale Conosco</a></a></li>
                    <li><a href="sair.php">Sair</a></li>
                </ul>
            </nav>
        </div>

        <div class="menu-bg" id="menu-bg"></div>
    </header>

    <div class="hero">
        <main class="container">
            <legend>
                <h1>Busque um cuidador</h1>
                <h3>Veja aquele que melhor se adapte às suas necessidades</h3>
            </legend>

            <form action="" method="POST">
                <input type="text" placeholder="Insira o nome do cuidador" maxlength="70">

            </form>
            <article class="item article-01">
                AQUI VAI ENTRAR O PHP
            </article>
            <article class="item article-02">
                AQUI VAI ENTRAR O PHP
            </article>
            <article class="item article-03">
                AQUI VAI ENTRAR O PHP
            </article>
        </main>
        <aside></aside>
        <footer></footer>
    </div>
</body>

</html>