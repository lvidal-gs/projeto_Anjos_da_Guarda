<?php
include_once("conexao.php");
session_start();
ob_start();

$cliente = "SELECT c.*, n.`rel_espec` 
            FROM clientes AS c 
            JOIN necessidades AS n 
            ON n.`id_necessidade` = c.`necessidade` 
            WHERE id = '" . $_SESSION['id'] . "' ";
$query_busca = mysqli_query($conn, $cliente);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/busca.css">
    <link rel="stylesheet" href="css/hamburguer.css" />
    <link rel="shortcut icon" href="img/anjos_da_guarda_logo_favicon.png">
    <script type="text/javascript" src="js/animacao_hamb.js"></script>

    <title>Cliente - Meu Perfil</title>
</head>

<body>

    <nav>
        <header>
            <a href="index.php"><img src="img/anjos_da_guarda_logo_nomeLateral.png"></a>
            <div>
                <?php if ($_SESSION['imagem'] == NULL) { ?>
                    <li><img style="display: relative; border-width: 2px; border-style: solid;  border-color: var(--nav-color); margin-right: -800px;width: 60px; height: 60px; border-radius: 100%;" src="img/default_photo.png" alt="image"></li>
                <?php } else { ?>
                    <li> <img id="foto" style="display: relative; border-width: 2px; border-style: solid;  border-color: var(--nav-color); margin-right: -800px;width: 60px; height: 60px; border-radius: 100%;" src="<?php echo "uploads/" . $_SESSION['imagem'] . " " ?>" style="" /></li>
                <?php } ?>
            </div>
            <div>

                <li style="display: relative; font-size: 14pt; list-style: none; margin-right: -1000px; margin-top: 5px;font-weight: bolder">Bem-vindo(a), <?php echo $_SESSION['nome'] ?></li>
            </div>
            <div id="menu">
                <div id="menu-bar" onclick="menuOnClick()">
                    <div id="bar1" class="bar"></div>
                    <div id="bar2" class="bar"></div>
                    <div id="bar3" class="bar"></div>
                </div>

                <nav class="nav" id="nav">
                    <ul>
                        <li><a href="#">Home</a></li>
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
                <?php while ($row_usuario = mysqli_fetch_assoc($query_busca)) { ?>
                    <div class="dados">
                        <?php if ($row_usuario['imagem'] == NULL) { ?>
                            <img src="img/default_photo.png" alt="image">
                        <?php } else { ?>
                            <img class="dados" src="<?php echo "uploads/" . $row_usuario['imagem'] . " " ?>" />
                        <?php } ?>

                        <div class="info">
                            <h1 style='font-size: 25pt;'><?php echo "" . $row_usuario['nome'] . " " . $row_usuario['sobrenome'] . ""; ?> </h1>

                            <?php if ($row_usuario['cep'] != NULL) { ?>
                                <h3 style='color: var(--text-color); font-size: 12pt;'><?php echo "Reside em: " . $row_usuario['uf'] . "-" . $row_usuario['cidade'] . ", " . $row_usuario['bairro'] . "."; ?></h3>
                            <?php } else { ?>
                                <h3 style='color: var(--text-color); font-size: 12pt;'> Reside em: Local não informado.</h3>
                            <?php } ?>

                            <h3 style='color: var(--text-color); font-size: 12pt;'><?php echo "Está a procura de: " . $row_usuario['rel_espec'] . "."; ?></h3>
                        </div>
                    </div>

                    <div class="sobre">
                        <section>
                            <h1 style="margin-left: -30px">Descrição de serviço</h1>
                            <?php echo "<p>" . $row_usuario['descServ'] . "</p>"
                            ?>
                        </section>


                    </div>
                    <div class="sobre">
                        <section>
                            <h1 style="margin-left: -30px">Necessidades do serviço</h1>
                            <?php echo "<p>" . $row_usuario['descNece'] . "</p>"
                            ?>
                        </section>
                    </div>

                    <div class="sobre">
                        <section>
                            <h1 style="margin-left: -30px">Observações</h1>
                            <?php echo "<p>" . $row_usuario['descObs'] . "</p>" ?>
                        </section>
                    </div>
                <?php } ?>
            </main>
        </div>

</body>

</html>