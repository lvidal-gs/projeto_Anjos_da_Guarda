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

    <title>Meu Perfil</title>
</head>

<body>

    <nav>
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
                    <li><a href="editarPerfil_cliente.php">Editar perfil</a></li>
                    <li><a href="contato.php">Fale Conosco</a></a></li>
                    <li><a href="sair.php">Sair</a></li>
                </ul>
            </nav>
        </div>

        <div class="menu-bg" id="menu-bg"></div>

    </header>

    <div class="hero">
    <main class="container">
        <div class="dados">
            <img src="img/default_photo.png" alt="image">
            <div class="info">
                <?php
                echo "<h1>".$_SESSION['nome']." ".$_SESSION['sobrenome']." </h1><br>";
                echo "<h5 style='color: var(--text-color);'>Reside em: ".$_SESSION['uf'].", " .$_SESSION['cidade']."</h5>";
                echo "<h5 style='color: var(--text-color);'>Procura: ";
                ?>
            </div>

        </div>

        <div class="sobre">
            <section>
                <h1>Sobre</h1>
                <?php echo "<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo sequi ipsa quod dolore officia ipsam aperiam architecto totam est! Neque ipsam harum saepe cupiditate repellendus quo pariatur ipsa ad excepturi.</p>"
                ?>
            </section>
        </div>
        <div class="sobre">
            <section>
                <h1>Formação Acadêmica</h1>
                <?php echo "<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo sequi ipsa quod dolore officia ipsam aperiam architecto totam est! Neque ipsam harum saepe cupiditate repellendus quo pariatur ipsa ad excepturi.</p>"
                ?>
            </section>
        </div>

        <div class="sobre">
            <section>
                <h1>Experiencias</h1>
                <?php echo "<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo sequi ipsa quod dolore officia ipsam aperiam architecto totam est! Neque ipsam harum saepe cupiditate repellendus quo pariatur ipsa ad excepturi.</p>"
                ?>
            </section>
        </div>

        <?php
        echo "<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css'>
        <a href='https://wa.me/55".$_SESSION['telefone']."' style='position:fixed;width:60px;height:60px;bottom:40px;right:40px;background-color:#25d366;color:#FFF;border-radius:50px;text-align:center;font-size:30px;box-shadow: 1px 1px 2px #888;
  z-index:1000;' target='_blank'> <i style='margin-top:16px' class='fa fa-whatsapp'></i>
        </a>"
        ?>
    </main>


    </div>
</body>

</html>
<style>
    main {
        background-color: white;
        min-height: 600px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-evenly;
        box-shadow: none;
    }

    .dados {
        width: 75%;
        display: flex;
        position: relative;
        align-items: center;
        justify-content: space-evenly;
    }


    .dados img {
        width: 160px;
        padding: 5px 5px;
        border: solid 2px #fd4d56;
        border-radius: 100%;
        background-color: #fff;
        justify-self: flex-start;
    }

    .dados .info {
        margin: 10px 10px;
        flex: 2;
    }

    .dados .contact {
        justify-self: flex-end;
        margin: 10px 10px;
    }

    .sobre {
        margin: 20px 20px;
        align-self: center;
    }

    .sobre p {
        text-justify: right;
        margin: 10px 40px 15px 40px;
    }

    .dados #whatsbutton {
        background-color: #34af23;
        display: block;
        float: right;
        font-family: ubuntu;
        color: #fff;
        font-size: 10pt;
        max-width: 200px;
        border-radius: 8px;
        text-decoration: none;
        padding: 16px 16px;
        margin: 5px -5px;
        transition: background-color 0.2s;
        cursor: pointer;
        border: none;
    }
</style>