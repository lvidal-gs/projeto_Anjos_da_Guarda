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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/anjos_da_guarda_logo_favicon.png" />
    <link rel="stylesheet" href="css/hamburguer.css" />
    <link rel="stylesheet" href="css/style.css">

    <script type="text/javascript" src="js/end_viacep.js"></script>
    <script type="text/javascript" src="js/script_preview.js"></script>
    <script type="text/javascript" src="js/animacao_hamb.js"></script>

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
                        <li><a href="editarPerfil_cuidador.php">Editar perfil</a></li>
                        <li><a href="contato.php">Fale Conosco</a></a></li>
                        <li><a href="sair.php">Sair</a></li>
                    </ul>
                </nav>
            </div>

            <div class="menu-bg" id="menu-bg"></div>
            <a href="index.php">
                <img src="img/anjos_da_guarda_logo_sf" width="225px">
            </a>

            <a id="setinha" href="index.php">
                <img src="img/arrow.svg" alt="" height="12px">
                Voltar para home
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
                        <input width="50%" id="imagem" name="imagem" type="file" accept="image/*" onchange="previewImagem()" />
                    </div>
                    <div class="field">
                    <?php if ($row_usuario['imagem'] == NULL) { ?>
                    <img id="previw" style="width: 150px; height: 150px; border-radius: 100%; border-width: 2px; border-style: solid;  border-color: var(--primary-color);" src="img/default_photo.png" alt="image">
                <?php } else { ?>
                    <img id="preview" src="<?php echo "uploads/".$row_usuario['imagem']." "?>" style="width: 150px; height: 150px; border-radius: 100%; border-width: 2px; border-style: solid;  border-color: var(--primary-color);" /></li>
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
                        <option value="6">Eu sou enfermeiro(a) autonomo(a)</option>
                        <option value="3">Eu sou cuidador de idosos</option>
                        <option value="4">Eu sou cuidador de crianças/babysitter</option>
                        <option value="2">Eu sou cuidador de PcD's</option>
                        <option value="1">Eu sou cuidador de PcNE's</option>
                        <option value="5">Eu sou um tratador de feridos</option>
                        <option value="10">Outra</option>
                    </select>
                </div>
                <div class="field">
                    <label for="zona">Zona de Atuação <t style="font-size:10pt;">(Até 30 caracteres)</t> *</label>
                    <?php if($row_usuario['zona'] == NULL){?>
                    <input name="zona" type="text" maxlength="30" placeholder="Ex.: Zona Sul e Grande Centro" required>
                    <?php }else{
                       echo "<input type='text' maxlength='30' required name='zona' value='".$row_usuario['zona']."'>";
                    }?>
                </div>

                <div class="field">
                    <label>Resumo <t style="font-size:10pt;">(Até 50 caracteres)</t> *</label>
                    <?php if($row_usuario['resumo'] == NULL){?>
                    <input name="resumo" type="text" maxlength="50" placeholder="Ex.: Tenho experiência na área há 5 anos" required>
                    <?php }else{
                       echo "<input type='text' maxlength='50' required name='resumo' value='".$row_usuario['resumo']."'>";
                    }?>
                </div>


                <h3>Meus Links</h3>
                <div class="field">
                    <label for="meuLink">Meu site: </label>
                    <?php if($row_usuario['site'] == NULL){?>
                        <input type="text" id="meuLink" name="meuLink" placeholder="URL de Perfil do seu domínio">
                    <?php }else{
                       echo "<input type='text' id='meuLink' name='meuLink' value='".$row_usuario['site']."'>";
                    }?>
                </div>

                <div class="field">
                    <label for="instaLink">Instagram: </label>
                    <?php if($row_usuario['instagram'] == NULL){?>
                        <input type="text" id="instaLink" name="instaLink" placeholder="URL de Perfil do Instagram">
                    <?php }else{
                        echo "<input type='text' id='instaLink' name='instaLink' value='".$row_usuario['instagram']."'>";
                    }?>
                </div>


                <div class="field">
                    <label for="faceLink">Facebook: </label>
                    <?php if($row_usuario['facebook'] == NULL){?>
                    <input type="text" id="faceLink" name="faceLink" placeholder="URL de Perfil do Facebook">
                    <?php }else{
                        echo "<input type='text' id='faceLink' name='faceLink' value='".$row_usuario['facebook']."'>";
                    }?>
                </div>
                <br>
                <fieldset>
                    <h2 style="margin-top: -40px;">Descrição de Perfil</h2><br>
                    <div class="field">
                        <label for="sobre">Sobre Mim<t style="font-size:10pt;">(Até 400 caracteres)</t> </label>
                        <textarea maxlength="400" name="sobre" style="resize: none" id="sobre" rows="8" placeholder="Fale um pouco sobre o serviço cujo precisa" value="af"><?php echo $row_usuario['descSobre']; ?></textarea>
                    </div>

                    <div class="field">
                        <label for="formacao">Formação Acadêmica <t style="font-size:10pt;">(Até 400 caracteres)</t></label>
                        <textarea maxlength="400" name="forma" style="resize: none" id="formacao" rows="8" placeholder="Quais os requisitos que você quer que seu cuidador atenda? (Ex.: Ter experiencia de 5 anos na área de cuidados, ter disponibilidade aos finais de semana, etc.)"><?php echo $row_usuario['descForm']; ?></textarea>
                    </div>

                    <div class="field">
                        <label for="exp">Experiências <t style="font-size:10pt;">(Até 400 caracteres)</t></label>
                        <textarea name="exp" maxlength="400" style="resize: none" id="exp" rows="8" placeholder="Coloque aqui mais detalhes do serviço"><?php echo $row_usuario['descExp']; ?></textarea>
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
                            echo "<input name='cep' type='text' id='cep'  maxlength='9' minlength='8' onblur='pesquisacep(this.value);' required value='" . $row_usuario['cep'] . "'/>";
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
                                echo "<input name='uf' type='text' id='uf' maxlength='2' required value='" . $row_usuario['uf'] . "'/>";
                            }
                            ?>
                        </div>


                        <div class="field">
                            <label>Cidade *</label>
                            <?php
                            if ($row_usuario['cidade'] == NULL) {
                                echo "<input name='cidade' type='text' id='cidade' minlength='3' required placeholder='Insira o nome da sua cidade'/>";
                            } else {
                                echo "<input name='cidade' type='text' id='cidade' minlength='3' required value='" . $row_usuario['cidade'] . "'/>";
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
                            echo "<input name='rua' type='text' id='rua' minlength='3' required value='" . $row_usuario['rua'] . "'/>";
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
                                echo "<input name='bairro' type='text' id='bairro' minlength='3' required value='" . $row_usuario['bairro'] . "'/>";
                            }
                            ?>
                        </div>

                        <div class="field">
                            <label>Número </label>
                            <?php
                            if ($row_usuario['numero'] == NULL) {
                                echo "<input name='numero' type='text' id='numero' placeholder='Insira o numero do seu imóvel'/>";
                            } else {
                                echo "<input name='numero' type='text' id='numero' value='" . $row_usuario['numero'] . "'/>";
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
                            echo "<input name='comp' type='text' id='comp'  maxlenght='45' value='" . $row_usuario['comp'] . "'/>";
                        }
                        ?>

                    </div>

                    <div class="field-group" style="margin-left: 30px;">
                        <input class="button" name="btnEdita" type="submit" value="Salvar alterações" style="margin-top: 50px; margin-bottom: -30px;"></input>
                        <input class="button" name="btnLimpa" type="reset" value="Restaurar padrão" style="background: var(--title-color);margin-top: 50px; margin-bottom: -30px; "></input>
                    </div>


        </form>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <script>

        </script>
    </div>
</body>

</html>