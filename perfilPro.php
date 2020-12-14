<?php
include_once("conexao.php");
session_start();
ob_start();

$cuidador = "SELECT c.*, e.`relacao`
            FROM cuidador AS c 
            JOIN especialidades AS e
            ON e.`id_espec` = c.`espec`
            WHERE id = '" . $_SESSION['id'] . "' ";
$query_busca = mysqli_query($conn, $cuidador);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/busca.css">
    <link rel="stylesheet" href="css/hamburguer.css" />
    <link rel="shortcut icon" href="img/anjos_da_guarda_logo_favicon.png">
    <script type="text/javascript" src="js/animacao_hamb.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <title>Cuidador - Meu Perfil</title>
</head>

<body>
    <nav>
        <header>
            <a href="index.php"><img src="img/anjos_da_guarda_logo_nomeLateral.png"></a>
            <div>
                <?php while ($row_usuario = mysqli_fetch_assoc($query_busca)) { ?>
                    <?php if ($row_usuario['imagem'] == NULL) { ?>
                        <li><img style="display: relative; border-width: 2px; border-style: solid;  border-color: var(--nav-color); margin-left: -2000px; width: 60px; height: 60px; border-radius: 100%;" src="img/default_photo.png" alt="image"></li>
                    <?php } else if ($row_usuario['imagem'] != NULL) { ?>
                        <li><img id="foto" style="display: relative; border-width: 2px; border-style: solid;  border-color: var(--nav-color); margin-left: -2000px; width: 60px; height: 60px; border-radius: 100%;" src="<?php echo "uploads/" . $row_usuario['imagem'] . " " ?>" style="" /></li>
                    <?php } ?>
            </div>
            <div>
                <li style="display: relative; font-size: 14pt; list-style: none; margin-left: -1750px; margin-top: 5px;font-weight: bolder">Bem-vindo(a), <?php echo $_SESSION['nome'] ?></li>
            </div>
            <div id="menu">
                <div id="menu-bar" onclick="menuOnClick()">
                    <div id="bar1" class="bar"></div>
                    <div id="bar2" class="bar"></div>
                    <div id="bar3" class="bar"></div>
                </div>
                <nav class="nav" id="nav">
                    <ul>
                        <li><a href="perfilPro.php">Meu Perfil</a></li>
                        <li><a href="editarPerfil_cuidador.php">Editar Perfil</a></li>
                        <li><a href="contato_cuidador.php">Fale Conosco</a></a></li>
                        <li><a href="sair.php">Sair</a></li>
                    </ul>
                </nav>
            </div>
            <div class="menu-bg" id="menu-bg"></div>
        </header>
        <div class="hero">
            <main style="margin-top: 80px;" class="container">
                <div class="dados">
                    <?php if ($row_usuario['imagem'] == NULL) { ?>
                        <img src="img/default_photo.png" alt="image" style="width: 150px; height: 150px; border-radius: 100%; border-width: 2px; border-style: solid;  border-color: var(--primary-color);">
                    <?php } else { ?>
                        <img id="preview" src="<?php echo "uploads/" . $row_usuario['imagem'] . " " ?>" style="width: 150px; height: 150px; border-radius: 100%; border-width: 2px; border-style: solid;  border-color: var(--primary-color);" />
                    <?php } ?>
                    <div class="info">
                        <h1 style='font-size: 22pt;'><?php echo "" . $row_usuario['nome'] . " " . $row_usuario['sobrenome'] . ""; ?> </h1>
                        <?php if ($row_usuario['cep'] != NULL) { ?>
                            <h3 style='color: var(--text-color); font-size: 12pt;'>
                                <?php echo "Reside em: " . $row_usuario['uf'] . "-" . $row_usuario['cidade'] . ", " . $row_usuario['bairro'] . "."; ?> </h3>
                        <?php } else { ?>
                            <h3 style='color: var(--text-color); font-size: 12pt;'> Reside em: Local não informado.</h3>
                        <?php } ?>

                        <h3 style='color: var(--text-color); font-size: 12pt;'><?php echo "Especialidade: " . $row_usuario['relacao'] . "."; ?></h3>

                        <?php if ($row_usuario['zona'] == NULL) { ?>
                            <h3 style='color: var(--text-color); font-size: 12pt;'> Zona de atuação: Não informado.</h3>
                        <?php } else { ?>
                            <h3 style='color: var(--text-color); font-size: 12pt;'>
                                <?php echo "Zona de atuação: " . $row_usuario['zona'] . "."; ?></h3>
                        <?php } ?>
                    </div>
                </div>
                <div class="sobre">
                    <section>
                        <h2 style="margin-left: -30px">Sobre</h2>
                        <?php echo "<p> " . $row_usuario['descSobre'] . "</p>" ?>
                    </section>
                </div>
                <div class="sobre">
                    <section>
                        <h2 style="margin-left: -30px">Formação Acadêmica</h2>
                        <?php echo "<p>" . $row_usuario['descForm'] . "</p>" ?>
                    </section>
                </div>
                <?php if ($row_usuario['cep'] == NULL) { ?>

                    <script>
                        $(document).ready(function() {
                            $('#msgcad').modal('show');
                        });
                    </script>
                    <div class="modal fade" id="msgcad" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Edite o seu perfil</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Muito bem, <?php echo $row_usuario['nome']; ?>! Agora que você já está cadastradado, que tal editar seu perfil? Isso vai melhorar seu alcance e aumentar seu número de clientes! Vamos lá? 😄
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Agora não</button>
                                    <a href="editarPerfil_cuidador.php"><button id="btnmodal" type="button" class="btn btn-primary">Vamos lá!</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <div class="sobre">
                    <section>
                        <h2 style="margin-left: -30px">Experiencias</h2>
                        <?php echo "<p>" . $row_usuario['descExp'] . "</p>" ?>
                    </section>
                </div>
                <?php if (($row_usuario['site'] != NULL) || ($row_usuario['facebook'] != NULL) || ($row_usuario['instagram'] != NULL)) { ?>
                    <div class="sobre">
                        <section>
                            <h2 style="margin-left: -30px">Outros contatos</h2>
                            <?php if ($row_usuario['site'] != NULL) {
                                echo "<p>Meu Site: " . $row_usuario['site'] . "</p>";
                            } else {
                                echo "<p type='hidden'></p>";
                            } ?>
                            <?php if ($row_usuario['instagram'] != NULL) {
                                echo "<p>Meu Instagram: " . $row_usuario['instagram'] . "</p>";
                            } else {
                                echo "<p type='hidden'></p>";
                            } ?>
                            <?php if ($row_usuario['facebook'] != NULL) {
                                echo "<p padding-bottom: 20px; margin-bottom: 20px;>Meu Facebook: " . $row_usuario['facebook'] . "</p>";
                            } else {
                                echo "<p type='hidden'></p>";
                            } ?>
                        </section>
                    </div>
                <?php } else {
                        echo "<section type='hidden'></section>";
                    } ?>

            <?php } ?>
            </main>
        </div>

        <footer style="margin-top: 10px">
            <p>
                <a href="https://www.facebook.com/centropaulasouza" target="_blank">
                    <img src="img/face.png" width="23px">
                    Facebook
                </a>
                <a href="https://www.instagram.com/centropaulasouza/?hl=pt-br" target="_blank">
                    <img src="img/Insta.png" width="23px">
                    Instagram
                </a>
                <a href="https://twitter.com/paulasouzasp?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor" target="_blank">
                    <img src="img/twitter.png" width="23px">
                    Twitter
                </a>
            </p>

            <p>
                <a href="index.html"><img src="img/anjos_da_guarda_logo_sf.png" width="200px" right="100px"></a>
            </p>

            <p id="nomes">
                ©Anjos da Guarda - Grupo 4: <br><br>
                Bruno Munaretti Fenerich<br>
                Flávio Augusto Alves Fernande<br>
                João Paulo Freitas Halcsik Silva<br>
                Lucas Vidal Gimenes dos Santos<br>
                Mateus de Oliveira Andrade<br>
                Nilo Matuki Zibetti<br>

            </p>
        </footer>

</body>

</html>