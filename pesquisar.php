<?php include_once("conexao.php");
session_start();
ob_start();


//PEGA O VALOR NA URL
$pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;

$valor_uf = $_GET['filtro_uf'];
$valor_cidade = $_GET['filtro_cidade'];
$valor_nome = $_GET['filtro_nome'];
$valor_zona = $_GET['filtro_zona'];
$valor_nece = $_GET['filtro_nece'];

if ($valor_nece == 0) {
}
$cuidador = "SELECT c.*, e.`relacao`
            FROM cuidador AS c 
            JOIN especialidades AS e
            ON e.`id_espec` = c.`espec`
            WHERE nome LIKE '%$valor_nome%'
            AND uf LIKE '%$valor_uf%'
              AND cidade LIKE '%$valor_cidade%'
              AND zona LIKE '%$valor_zona%'
              AND espec LIKE '%$valor_nece%'
            ";

$query_busca = mysqli_query($conn, $cuidador);
//CONTA O TANTO DE CUIDADORES
$total_cuidador = mysqli_num_rows($query_busca);
//TOTAL DE ITENS POR PAG
$quantidade_por_pagina = 4;
//CALCULA O TANTO DE PAGINAS
$num_pagina = ceil($total_cuidador / $quantidade_por_pagina);
$inicio = ($quantidade_por_pagina * $pagina) - $quantidade_por_pagina;

$resultado = "SELECT c.*, e.`relacao`
              FROM cuidador AS c 
              JOIN especialidades AS e
              ON e.`id_espec` = c.`espec` 
              WHERE nome LIKE '%$valor_nome%'
              AND uf LIKE '%$valor_uf%'
              AND cidade LIKE '%$valor_cidade%'
              AND zona LIKE '%$valor_zona%'
              AND espec LIKE '%$valor_nece%'
              ORDER BY nome ASC
              LIMIT $inicio, $quantidade_por_pagina";
$query_resultado = mysqli_query($conn, $resultado);
$total_cuidadores =  mysqli_num_rows($query_resultado);

?>

<!doctype html>
<html lang="pt-br">

<head>
    <title>Busca de Cuidador</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/busca.css">
    <link rel="stylesheet" href="css/hamburguer.css" />
    <link rel="shortcut icon" href="img/anjos_da_guarda_logo_favicon.png">
    <script type="text/javascript" src="js/animacao_hamb.js"></script>

</head>

<body>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <header>
        <a href="index.php"><img src="img/anjos_da_guarda_logo_nomeLateral.png"></a>
        <div>
            <?php if ($_SESSION['imagem'] == NULL) { ?>
                <li style="list-style: none;"><img id="foto" style="list-style: none; display: relative; border-width: 2px; border-style: solid;  border-color: var(--nav-color); margin-right: -800px; width: 60px; height: 60px; border-radius: 100%;" src="img/default_photo.png" alt="image"></li>
            <?php } else { ?>
                <li style="list-style: none;"> <img id=" foto" style="list-style: none; display: relative; border-width: 2px; border-style: solid;  border-color: var(--nav-color); margin-right: -800px;width: 60px; height: 60px; border-radius: 100%;" src="<?php echo "uploads/" . $_SESSION['imagem'] . " " ?>" />
                </li>
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
                    <li><a href="telaBusca.php">Buscar Cuidador</a></li>
                    <li><a href="perfilCliente.php">Meu Perfil</a></li>
                    <li><a href="editarPerfil_cliente.php">Editar perfil</a></li>
                    <li><a href="contato.php">Fale Conosco</a></a></li>
                    <li><a href="sair.php">Sair</a></li>
                </ul>
            </nav>
        </div>

        <div class="menu-bg" id="menu-bg"></div>
    </header>

    <div id="busca" style="margin-top: 100px; " class="container theme-showcase" role="main">
        <h1 style="margin-top: 20px; ">Busque um cuidador</h1>
        <h3>Veja aquele que melhor se adapte às suas necessidades</h3> <br>

        <!-- BOTAO FILTRO MODAL -->
        <button id="btnvisu" type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#staticBackdrop">
            Filtros de Pesquisa
        </button><br>


        <!-- JANELA MODAL -->
        <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="staticBackdropLabel">Pesquisa com Filtros</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h4 class="text-center text-wrap">Aplique um filtro de pesquisa para melhorar seus resultados</h4>
                        <h6 class="text-center text-wrap" style="color: var(--text-color)">O preenchimento dos campos não são obrigatórios</h6> <br>

                        <form action="pesquisar.php" method="GET">
                            <div class="form-group">
                                <label for="uf">Insira uma UF:</label>
                                <input type="text" name='filtro_uf' class="form-control text-center" maxlength="2" placeholder="Insira uma UF">
                            </div>

                            <div class="form-group">
                                <label for="uf">Insira uma cidade: </label>
                                <input type="text" name="filtro_cidade" class="form-control text-center" placeholder="Insira o nome da cidade">
                            </div>

                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Nome do cuidador: </label>
                                <input type="text" name="filtro_nome" class="form-control text-center" placeholder="Insira o nome do cuidador" id="recipient-name">
                            </div>

                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Zona de Atuação: </label>
                                <input type="text" name="filtro_zona" class="form-control text-center" placeholder="Insira a área de atuação" id="recipient-name">
                            </div>

                            <div class="field">
                                <label for="nece" class="col-form-label">Especialidade:</label>
                                <select name="filtro_nece" placeholder="Teste">
                                    <option value="" selected>Nenhum valor selecionado</option>
                                    <option value="1">Preciso de enfermeiros autônomos</option>
                                    <option value="2">Preciso de um cuidador de idosos</option>
                                    <option value="3">Preciso de um cuidador de crianças/babysitter</option>
                                    <option value="4">Preciso de um cuidador de PcD's</option>
                                    <option value="5">Preciso de um cuidador de PcNE's</option>
                                    <option value="6">Preciso de um tratador de feridos</option>
                                    <option value="8">Outra</option>
                                </select>

                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Fechar</button>
                        <button id="btnmodal" type="submit" class="btn btn-primary">Aplicar filtro</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- AQUI É O LAYOUT DE COMO SERÃO EXIBIDOS OS CUIDADORES-->
        <?php while ($row_usuario = mysqli_fetch_assoc($query_resultado)) { ?>
            <div class="card mb-3" style="width: 85%;">
                <div class="row no-gutters">
                    <div style="margin-top: 4px; margin-left: 4px;" class="col-4">
                        <?php if ($row_usuario['imagem'] == NULL) { ?>
                            <img src="img/default_photo.png" alt="image" class="card-img" style="width: 190px; height: 190px; margin: 35px 0 0 25px; padding: 5px 5px;border: solid 2px var(--primary-color);border-radius: 100%;background-color: #fff;" />
                        <?php } else { ?>
                            <img id="preview" src="<?php echo "uploads/" . $row_usuario['imagem'] . " " ?>" class="card-img" style="width: 190px; height: 190px; margin: 35px 0 0 25px; padding: 5px 5px; border: solid 2px var(--primary-color);border-radius: 100%;background-color: #fff;" />
                        <?php } ?>
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <h4 class="card-title"><?php echo "" . $row_usuario['nome'] . " " . $row_usuario['sobrenome'] . ""; ?></h4>
                            <p class="card-text"> <span style="font-weight: bolder;color: var(--title-color);">Especialidade: </span>
                                <?php echo $row_usuario['relacao']; ?></p>
                            <p class="card-text"> <span style="font-weight: bolder;color: var(--title-color);">Zona de atuação: </span>
                                <?php echo $row_usuario['zona']; ?></p>
                            <p class="card-text"> <span style="font-weight: bolder;color: var(--title-color);">Sobre mim:</span>
                                <?php if ($row_usuario['resumo'] == NULL) { ?>
                                    <?php echo "Nada informado"; ?>
                                <?php } else { ?>
                                    <?php echo $row_usuario['resumo']; ?>
                                <?php } ?>
                            </p>


                            <?php if ($row_usuario['modified'] == NULL) { ?>
                                <h5 style='color: var(--text-color); font-size: 8pt; margin-top: 15px;'> Ultima modificação: Nunca foi modificado.</h5>
                            <?php } else { ?>
                                <h5 style='color: var(--title-color); font-size: 8pt; margin-top: 15px;'>
                                    <?php echo "Ultima modificação: " . $row_usuario['modified'] . "."; ?></h5>
                            <?php } ?>

                            <a id="btnvisu" href="perfilPro.php?id_user=<?php echo $row_usuario['id']; ?>" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#staticBackdrop<?php echo $row_usuario['id']; ?>">Visualizar perfil</a>

                        </div>
                    </div>
                </div>
            </div>

            <!-- PÁGINA MODAL CUIDADOR-->
            <div class="modal fade" id="staticBackdrop<?php echo $row_usuario['id']; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title text-center" id="staticBackdropLabel">Perfil de Profissional</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <main class="container-modal">
                                <div class="dados">
                                    <?php if ($row_usuario['imagem'] == NULL) { ?>
                                        <img src="img/default_photo.png" style="width: 210px; height: 210px; border-radius: 100%; border-width: 2px; border-style: solid;  border-color: var(--primary-color);" alt="image">
                                    <?php } else { ?>
                                        <img id="preview" src="<?php echo "uploads/" . $row_usuario['imagem'] . " " ?>" style="width: 210px; height: 210px; border-radius: 100%; border-width: 2px; border-style: solid;  border-color: var(--primary-color);" />
                                    <?php } ?>

                                    <div class="info">
                                        <h1><?php echo "" . $row_usuario['nome'] . " " . $row_usuario['sobrenome'] . ""; ?> </h1>

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

                                        <?php if ($row_usuario['modified'] == NULL) { ?>
                                            <h5 style='color: var(--primary-color); font-size: 10pt; margin-top: 15px;'> Ultima modificação: Nunca foi modificado.</h5>
                                        <?php } else { ?>
                                            <h5 style='color: var(--title-color); font-size: 10pt; margin-top: 15px;'>
                                                <?php echo "Ultima modificação: " . $row_usuario['modified'] . "."; ?></h5>
                                        <?php } ?>


                                    </div>
                                </div>

                                <div class="sobre">
                                    <section>
                                        <h2 style="margin-left: -30px">Sobre</h2>
                                        <?php echo "<p style='font-size: 14pt;'> " . $row_usuario['descSobre'] . "</p style='font-size: 14pt;'>" ?>
                                    </section>
                                </div>

                                <div class="sobre">
                                    <section>
                                        <h2 style="margin-left: -30px">Formação Acadêmica</h2>
                                        <?php echo "<p style='font-size: 14pt;'>" . $row_usuario['descForm'] . "</p style='font-size: 14pt;'>" ?>
                                    </section>
                                </div>

                                <div class="sobre">
                                    <section>
                                        <h2 style="margin-left: -30px">Experiencias</h2>
                                        <?php echo "<p style='font-size: 14pt;'>" . $row_usuario['descExp'] . "</p style='font-size: 14pt;'>" ?>
                                    </section>
                                </div>
                                <?php if (($row_usuario['site'] != NULL) || ($row_usuario['facebook'] != NULL) || ($row_usuario['instagram'] != NULL)) { ?>
                                    <div id="contato" class="sobre">
                                        <section>
                                            <h2 style="margin-left: -30px">Outros contatos</h2>
                                            <?php if ($row_usuario['site'] != NULL) {
                                                echo "<p style='font-size: 14pt;'>Meu Site: " . $row_usuario['site'] . "</p style='font-size: 14pt;'><br>";
                                            } else {
                                                echo "<p style='font-size: 14pt;' type='hidden'></p style='font-size: 14pt;'>";
                                            } ?>

                                            <?php if ($row_usuario['instagram'] != NULL) {
                                                echo "<p style='font-size: 14pt;'>Meu Instagram: " . $row_usuario['instagram'] . "</p style='font-size: 14pt;'><br>";
                                            } else {
                                                echo "<p style='font-size: 14pt;' type='hidden'></p style='font-size: 14pt;'>";
                                            } ?>

                                            <?php if ($row_usuario['facebook'] != NULL) {
                                                echo "<p style='font-size: 14pt;'>Meu Facebook: " . $row_usuario['facebook'] . "</p style='font-size: 14pt;'><br>";
                                            } else {
                                                echo "<p style='font-size: 14pt;' type='hidden'></p style='font-size: 14pt;'>";
                                            } ?>
                                        </section>
                                    </div>
                                <?php } else {
                                    echo "<section id='contato' type='hidden'></section>";
                                } ?>

                                <?php
                                echo "<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css'>
                      <a id='whats' href='https://wa.me/55" . $row_usuario['telefone'] . "' style='text-decoration: none;position:fixed;width:230px;height:50px;bottom:40px;right:40px;background-color:#075e54;color:#ece5dd;border-radius:50px;text-align:center;font-size:30px;box-shadow: 1px 1px 2px #888; margin-top: -25px;
                      z-index:1000;' target='_blank'><i style='margin-top:8px' class='fa fa-whatsapp'></i> <j  style='font-size: 12pt; font-weight: bolder' >Me chame no Whatsapp!</j>
                      </a>"
                                ?>
                            </main>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark" data-dismiss="modal">Fechar</button>

                            <a target="_blank" style="text-decoration: none; color: white;" href="<?php echo "https://wa.me/55" . $row_usuario['telefone'] . "" ?>"><button id="btnmodal" type="button" class="btn btn-primary">Contatar Cuidador
                                </button></a>



                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>


        <?php
        $pag_ant = $pagina - 1;
        $pag_post = $pagina + 1
        ?>
        <nav style="margin: 15px 0 15px 0" class="text-center" aria-label="Paginação Busca">
            <ul class="pagination">
                <?php if ($pag_ant != 0) { ?>
                    <li class="page-item"><a style="color: var(--primary-color);" class="page-link" href="pesquisar.php?pagina=<?php echo $pag_ant; ?>&pesquisar=<?php echo $pag_ant; ?>">
                            <span aria-hidden="true">&laquo;</span> Anterior</a></li>
                <?php } else { ?>
                    <li class="page-item"><a class="page-link" style="color: var(--primary-color);"><span aria-hidden="true">&laquo;</span> Anterior</a></li>
                <?php } ?>


                <?php for ($i = 1; $i < $num_pagina + 1; $i++) { ?>
                    <li aria-current="page" class="page-item"><a style="color: var(--primary-color);" class="page-link" href="pesquisar.php?pagina=<?php echo $i; ?>&pesquisar=<?php echo $i; ?>"><?php echo $i; ?> <span class="sr-only">(current)</span></a></li>
                <?php } ?>

                <?php if ($pag_post <= $num_pagina) { ?>
                    <li class="page-item"><a style="color: var(--primary-color);" class="page-link" href="pesquisar.php?pagina=<?php echo $pag_post; ?>&pesquisar=<?php echo $pag_post; ?>" aria-label="Next">Próximo <span aria-hidden="true">&raquo;</span></a></li>
                <?php } else { ?>
                    <li class="page-item"><a style="color: var(--primary-color);" class="page-link" aria-label="Next">Próximo <span aria-hidden="true">&raquo;</span></a></li>
                <?php } ?>


                </li>
            </ul>
        </nav>
    </div>
    <footer>
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