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
    <link rel="stylesheet" href="css/busca.css">
    <link rel="stylesheet" href="css/hamburguer.css" />
    <link rel="shortcut icon" href="img/anjos_da_guarda_logo_favicon.png">
    <script type="text/javascript" src="js/animacao_hamb.js"></script>

    <title>Cuidador - Meu Perfil</title>
</head>

<body>

    <nav>
        <header>
            <a href="index.php"><img src="img/anjos_da_guarda_logo_nomeLateral.png"></a>

            <div>
            <?php while ($row_usuario = mysqli_fetch_assoc($query_busca)) { ?>
                <?php if ($_SESSION['imagem'] == NULL) { ?>
                    <li><img style="display: relative; border-width: 2px; border-style: solid;  border-color: var(--nav-color); margin-right: -800px; width: 60px; height: 60px; border-radius: 100%;" src="img/default_photo.png" alt="image"></li>
                <?php } else if( $_SESSION['imagem'] != NULL){ ?>
                    <li> <img id="foto" style="display: relative; border-width: 2px; border-style: solid;  border-color: var(--nav-color); margin-right: -800px; width: 60px; height: 60px; border-radius: 100%;" src="<?php echo "uploads/" . $row_usuario['imagem'] . " " ?>" style="" /></li>
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
                        <li><a href="perfilPro.php">Meu Perfil</a></li>
                        <li><a href="editarPerfil_cuidador.php">Editar perfil</a></li>
                        <li><a href="contato.php">Fale Conosco</a></a></li>
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
                            <img src="img/default_photo.png" alt="image">
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

                            <h3 style='color: var(--text-color); font-size: 12pt;'><?php echo "Especialidade: " . $row_usuario['relacao'] . "."; ?></h3><br>

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
                            <h1 style="margin-left: -30px">Sobre</h1>
                            <?php echo "<p> " . $row_usuario['descSobre'] . "</p>" ?>
                        </section>


                    </div>
                    <div class="sobre">
                        <section>
                            <h1 style="margin-left: -30px">Formação Acadêmica</h1>
                            <?php echo "<p>" . $row_usuario['descForm'] . "</p>" ?>
                        </section>
                    </div>

                    <div class="sobre">
                        <section>
                            <h1 style="margin-left: -30px">Experiencias</h1>
                            <?php echo "<p>" . $row_usuario['descExp'] . "</p>" ?>
                        </section>
                    </div>
                    <?php if (($row_usuario['site'] != NULL) || ($row_usuario['facebook'] != NULL) || ($row_usuario['instagram'] != NULL)) { ?>
                        <div id="contato" class="sobre">
                            <section>
                                <h1 style="margin-left: -30px">Outros contatos</h1>
                                <?php if ($row_usuario['site'] != NULL) {
                                    echo "<p>Meu Site: " . $row_usuario['site'] . "</p><br>";
                                } else {
                                    echo "<p type='hidden'></p>";
                                } ?>

                                <?php if ($row_usuario['instagram'] != NULL) {
                                    echo "<p>Meu Instagram: " . $row_usuario['instagram'] . "</p><br>";
                                } else {
                                    echo "<p type='hidden'></p>";
                                } ?>

                                <?php if ($row_usuario['facebook'] != NULL) {
                                    echo "<p>Meu Facebook: " . $row_usuario['facebook'] . "</p><br>";
                                } else {
                                    echo "<p type='hidden'></p>";
                                } ?>
                            </section>
                        </div>
                    <?php } else {
                        echo "<div id='contato' type='hidden'></div>";
                    } ?>

                <?php } ?>
            </main>
        </div>

</body>

</html>