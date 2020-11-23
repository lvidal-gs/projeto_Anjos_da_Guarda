<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/anjos_da_guarda_logo_favicon.png" />

    <link rel="stylesheet" href="css/styles.css">


    <title>Meu Perfil</title>
</head>

<body>

    <nav>
        <a href="index.html"> <img src="img/anjos_da_guarda_logo_nomeLateral.png" width="290px" style="margin-right: -200px;"> </a>
        <span>
            <ul>
                <li><a href="#">Cuidador</li>
                <li><a href="perfilPro">Meu Perfil</a></li>
                <li><a href="#">Fale Conosco</a></li>
            </ul>
        </span>


        <div>
            <?php
            echo "<teste style='color: var(--nav-color); font-weight: bolder;font-size: 15px;'>Bem-vindo(a) " . $_SESSION['nome'] . "!</teste>";
            ?>
            <a href="sair.php" class="botao">
                <strong>Sair</strong>
            </a>
        </div>

    </nav>
    <br><br><br><br>

    <main>

        <div class="dados">
            <img src="img/default_photo.png" alt="image">
            <div class="info">
                <?php
                echo "<h1> " . $_SESSION['nome'] . " " . $_SESSION['sobrenome'] . " </h1><br>";
                echo "<h5>Especialidade: </h5>";
                echo "<h5>Área de atuação: " . $_SESSION['uf'] . ", " . $_SESSION['cidade'] . ", " . $_SESSION['bairro'] . "</h5>";
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
                <h1>Formação</h1>
                <?php echo "<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo sequi ipsa quod dolore officia ipsam aperiam architecto totam est! Neque ipsam harum saepe cupiditate repellendus quo pariatur ipsa ad excepturi.</p>"
                ?>
            </section>
        </div>

        <div class="sobre">
            <section>
                <h1>Experiencia</h1>
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
        border: solid 1.75px #3980a8;
        box-shadow: none;
    }

    .dados {
        margin: 10px 10px 0 -200px;
        display: flex;
        align-items: center;
        justify-content: space-evenly;
    }


    .dados img {
        margin: 10px 10px 0 -100px;
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