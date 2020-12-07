<?php
session_start();
include_once("conexao.php");
$id = $_SESSION['id'];
$cuidador = "SELECT c.*, e.`relacao`, e.`especialidade` 
             FROM cuidador c 
             JOIN especialidades e 
             ON e.`id_espec` = c.`espec` 
             WHERE id = '" . $_SESSION['id'] . "'";
$query_busca = mysqli_query($conn, $cuidador);
$row_usuario = mysqli_fetch_assoc($query_busca);
?>

<!DOCTYPE html>
<html>

<head lang="pt-br">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="shortcut icon" href="img/anjos_da_guarda_logo_favicon.png" />
    <link rel="stylesheet" href="css/hamburguer.css" />
    <link rel="stylesheet" href="css/style.css">

    <script type="text/javascript" src="js/end_viacep.js"></script>
    <script type="text/javascript" src="js/script_preview.js"></script>
    <script type="text/javascript" src="js/animacao_hamb.js"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


    <title>Editar - Meu Perfil</title>
</head>

<body>

    <div id="cad-pro">
        <header>
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
            <a href="index.php">
            <img src="img/anjos_da_guarda_logo_sf.png" width="225px">
            </a>

            <a id="setinha" href="perfilPro.php">
                <img src="img/arrow.svg" alt="" height="12px">
                Voltar para o meu perfil
            </a>
        </header>
        <form action="processa_edit_cuidador.php" enctype="multipart/form-data" method="POST">
            <legend>
                <h1>Editar - Meu perfil</h1>
                <h6>Preenchimento Obrigatório (*)</h6>
            </legend>
            <?php
            if (isset($_SESSION['msg'])) {
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
            ?>
            <fieldset>

                <input type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>">

                <h3 style="margin-top: -70px;">Escolha sua melhor foto de perfil</h3><br>
                <div class="field-group">
                    <div class="field">                                           
                        <input width="50%" id="imagem" name="imagem" type="file" accept="image/*" onchange="previewImagem()"/>
                    </div>
                    <div class="field">
                        <?php if ($row_usuario['imagem'] == NULL) { ?>
                            <img id="preview" style="width: 150px; height: 150px; border-radius: 100%; border-width: 2px; border-style: solid;  border-color: var(--primary-color);" src="img/default_photo.png" alt="image">
                        <?php } else { ?>
                            <img id="preview" src="<?php echo "uploads/" . $row_usuario['imagem'] . " " ?>" style="width: 150px; height: 150px; border-radius: 100%; border-width: 2px; border-style: solid;  border-color: var(--primary-color);" />
                        <?php } ?>

                    </div>

                </div>

                <h2>Dados Básicos</h2>
                <div class="field">
                    <label for="nome">Meu Nome <t style="font-size: 8pt;">(Somente leitura)</t></label>
                    <input style="background: darkgray; color: black;" type="text" name='nome' value="<?php echo "" . $row_usuario['nome'] . " " . $row_usuario['sobrenome'] . ""; ?> " readonly />
                </div>

                <div class="field">
                    <label for="nece">Minha Especialidade *</label>
                    <select name="espec">
                        <option style="color: var(--title-color); text-width: 900;" value="<?php echo $row_usuario['espec'] ?>" selected><?php echo $row_usuario['especialidade'] ?> (atual)</option>
                        <option value="6">Eu sou enfermeiro autonomo</option>
                        <option value="3">Eu sou cuidador de idosos</option>
                        <option value="4">Eu sou cuidador de crianças/babysitter</option>
                        <option value="2">Eu sou cuidador de PcD's</option>
                        <option value="1">Eu sou cuidador de PcNE's</option>
                        <option value="5">Eu sou um tratador de feridos</option>
                        <option value="10">Outro</option>
                    </select>
                </div>
                <div class="field">
                    <label for="zona">Zona de Atuação <t style="font-size:10pt;">(Até 70 caracteres)</t> *</label>
                    <?php if ($row_usuario['zona'] == NULL) { ?>
                        <input name="zona" type="text" maxlength="70" placeholder="Ex.: Zona Sul e Grande Centro" required>
                    <?php } else {
                        echo "<input type='text' maxlength='70'  placeholder='Ex.: Zona Sul e Grande Centro'required name='zona' value='" . $row_usuario['zona'] . "'>";
                    } ?>
                </div>

                <div class="field">
                    <label>Resumo <t style="font-size:10pt;">(Até 50 caracteres)</t> *</label>
                    <?php if ($row_usuario['resumo'] == NULL) { ?>
                        <input name="resumo" type="text" maxlength="50" placeholder="Ex.: Tenho experiência na área há 5 anos" required>
                    <?php } else {
                        echo "<input type='text' maxlength='50' placeholder='Ex.: Tenho experiência na área há 5 anos' required  name='resumo' value='" . $row_usuario['resumo'] . "'>";
                    } ?>
                </div>
                <!-- MODAL PREVIEW -->
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Visualizar card atual
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Preview atual de Card</h5>
                            </div>
                            <div class="modal-body">
                                <div class="card mb-3" style="width: 100%;">
                                    <div class="row no-gutters">
                                        <div style="margin-top: 4px; margin-left: 4px;" class="col-4">
                                            <?php if ($row_usuario['imagem'] == NULL) { ?>
                                                <img src="img/default_photo.png" alt="image" class="card-img" style="width: 190px; height: 190px; margin: 10px 0 0 25px; padding: 5px 5px;border: solid 2px var(--primary-color);border-radius: 100%;background-color: #fff;" />
                                            <?php } else { ?>
                                                <img id="preview" src="<?php echo "uploads/" . $row_usuario['imagem'] . " " ?>" class="card-img" style="width: 190px; height: 190px; margin: 10px 0 0 25px; padding: 5px 5px; border: solid 2px var(--primary-color);border-radius: 100%;background-color: #fff;" />
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
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <br><br>
                <h3>Meus Links</h3>
                <div class="field">
                    <label for="meuLink">Meu site: </label>
                    <?php if ($row_usuario['site'] == NULL) { ?>
                        <input type="text" id="meuLink" name="meuLink" placeholder="URL de Perfil do seu domínio">
                    <?php } else {
                        echo "<input type='text' id='meuLink' name='meuLink' value='" . $row_usuario['site'] . "'>";
                    } ?>
                </div>

                <div class="field">
                    <label for="instaLink">Instagram: </label>
                    <?php if ($row_usuario['instagram'] == NULL) { ?>
                        <input type="text" id="instaLink" name="instaLink" placeholder="URL de Perfil do Instagram">
                    <?php } else {
                        echo "<input type='text' id='instaLink' placeholder='URL de Perfil do Instagram' name='instaLink' value='" . $row_usuario['instagram'] . "'>";
                    } ?>
                </div>


                <div class="field">
                    <label for="faceLink">Facebook: </label>
                    <?php if ($row_usuario['facebook'] == NULL) { ?>
                        <input type="text" id="faceLink" name="faceLink" placeholder="URL de Perfil do Facebook">
                    <?php } else {
                        echo "<input type='text' id='faceLink' placeholder='URL de Perfil do Facebook' name='faceLink' value='" . $row_usuario['facebook'] . "'>";
                    } ?>
                </div>
                <br>
                <fieldset>
                    <h2 style="margin-top: -40px;">Descrição de Perfil</h2><br>
                    <div class="field">
                        <label for="sobre">Sobre Mim<t style="font-size:10pt;">(Até 400 caracteres)</t> </label>
                        <textarea maxlength="400" name="sobre" style="resize: none" id="sobre" rows="8" placeholder="Fale um pouco sobre você" value="af"><?php echo $row_usuario['descSobre']; ?></textarea>
                    </div>

                    <div class="field">
                        <label for="formacao">Formação Acadêmica <t style="font-size:10pt;">(Até 400 caracteres)</t></label>
                        <textarea maxlength="400" name="forma" style="resize: none" id="formacao" rows="8" placeholder="Conte-nos sobre sua formação. "><?php echo $row_usuario['descForm']; ?></textarea>
                    </div>

                    <div class="field">
                        <label for="exp">Experiências <t style="font-size:10pt;">(Até 400 caracteres)</t></label>
                        <textarea name="exp" maxlength="400" style="resize: none" id="exp" rows="8" placeholder="Coloque aqui algumas de suas experiências"><?php echo $row_usuario['descExp']; ?></textarea>
                    </div>
                </fieldset>

                <fieldset>
                    <legend>
                        <h2>Endereço</h2>
                        <h6>Aviso: Este formulário se auto-completa</h6>
                    </legend>


                    <div class="field">
                        <label for="cep">CEP *</label>
                        <?php
                        if ($row_usuario['cep'] == NULL) {
                            echo "<input name='cep' type='text' id='cep'  maxlength='9' minlength='8' onblur='pesquisacep(this.value);' required placeholder='Insira o seu número de CEP'/>";
                        } else {
                            echo "<input name='cep' type='text' id='cep' placeholder='Insira o seu número de CEP' maxlength='9' minlength='8' onblur='pesquisacep(this.value);' required value='" . $row_usuario['cep'] . "'/>";
                        }
                        ?>

                        </label>
                    </div>

                    <div class="field-group">

                        <div class="field">
                            <label>Estado *</label>
                            <?php
                            if ($row_usuario['uf'] == NULL) {
                                echo "<input name='uf' type='text' id='uf' maxlength='2' required placeholder='Insira sua UF'/>";
                            } else {
                                echo "<input name='uf' type='text' id='uf' maxlength='2' placeholder='Insira sua UF' required value='" . $row_usuario['uf'] . "'/>";
                            }
                            ?>
                        </div>


                        <div class="field">
                            <label>Cidade *</label>
                            <?php
                            if ($row_usuario['cidade'] == NULL) {
                                echo "<input name='cidade' type='text' id='cidade' minlength='3' required placeholder='Insira o nome da sua cidade'/>";
                            } else {
                                echo "<input name='cidade' type='text' id='cidade' minlength='3' Insira o nome da sua cidade required value='" . $row_usuario['cidade'] . "'/>";
                            }
                            ?>
                        </div>
                    </div>

                    <div class="field">
                        <label>Rua *</label>
                        <?php
                        if ($row_usuario['rua'] == NULL) {
                            echo "<input name='rua' type='text' id='rua' minlength='3' required placeholder='Insira o nome da sua rua'/>";
                        } else {
                            echo "<input name='rua' type='text' id='rua' minlength='3' placeholder='Insira o nome da sua rua' required value='" . $row_usuario['rua'] . "'/>";
                        }
                        ?>
                    </div>

                    <div class="field-group">
                        <div class="field">
                            <label>Bairro *</label>
                            <?php
                            if ($row_usuario['bairro'] == NULL) {
                                echo "<input name='bairro' type='text' id='bairro' minlength='3' required placeholder='Insira o nome do seu bairro'/>";
                            } else {
                                echo "<input name='bairro'  placeholder='Insira o nome do seu bairro' type='text' id='bairro' minlength='3' required value='" . $row_usuario['bairro'] . "'/>";
                            }
                            ?>
                        </div>

                        <div class="field">
                            <label>Número </label>
                            <?php
                            if ($row_usuario['numero'] == NULL) {
                                echo "<input name='numero' type='text' id='numero' placeholder='Insira o numero do seu imóvel'/>";
                            } else {
                                echo "<input name='numero' type='text' placeholder='Insira o numero do seu imóvel' id='numero' value='" . $row_usuario['numero'] . "'/>";
                            }
                            ?>
                        </div>
                    </div>

                    <div class="field">
                        <label>Complemento</label>
                        <?php
                        if ($row_usuario['comp'] == NULL) {
                            echo "<input name='comp' type='text' id='comp'  maxlenght='45' placeholder='Ex.: Apto. Nº5, Bloco 2'/>";
                        } else {
                            echo "<input name='comp' type='text' id='comp'  maxlenght='45' placeholder='Ex.: Apto. Nº5, Bloco 2' value='" . $row_usuario['comp'] . "'/>";
                        }
                        ?>

                    </div>

                    <div class="field-group" style="margin-left: 30px;">
                        <input class="button" name="btnEdita" type="submit" value="Salvar alterações" style="margin-top: 50px; margin-bottom: -30px;"></input>
                        <input class="button" name="btnLimpa" type="reset" value="Restaurar padrão" style="background: var(--title-color);margin-top: 50px; margin-bottom: -30px; "></input>
                    </div>


        </form>

    </div>

    <?php echo "<a href='proc_apagar_cuidador.php?id=".$row_usuario['id']."' class='btn btn-dark btn-sm' data-confirm='data-confirm='Tem certeza de que deseja excluir o seu perfil? Essa é uma ação irreversível!'>Eu quero excluir minha conta.</a>"; ?>

    <script src="js/personalizado.js"></script>	

    <style>
        a.btn.btn-dark.btn-sm {
            margin: 0 0 20px 10px;
        }
    </style>


</html>