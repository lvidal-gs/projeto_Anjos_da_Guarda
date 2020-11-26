<?php
session_start();
ob_start();

?>

<!DOCTYPE html>
<html>

<head lang="en">
    <meta charset="UTF-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/anjos_da_guarda_logo_favicon.png" />

    <link rel="stylesheet" href="css/styles.css">

    <title>Editar - Meu Perfil</title>
</head>

<body>
<nav>
        <a href="index.php"> <img style="align-self: center;" src="img/anjos_da_guarda_logo_nomeLateral.png" width="290px" style="margin-right: -200px;"> </a>

        
        <div>
            <?php
            echo "<teste style='color: var(--nav-color); font-weight: bolder;font-size: 15px;'>Bem-vindo(a) Cuidador(a) ".$_SESSION['nome']."!</teste>";
            ?>
            <a href="sair.php" class="botao">
                <strong>Sair</strong>
            </a>
        </div>

    </nav>
    <br><br><br><br>
    <div id="cad-pro">
       
        <form enctype="multipart/form-data" action="validaEditar.php" method="post">
            <legend>
                <h1>Editar - Meu perfil</h1>
                <h6>Preenchimento Obrigatório (*)</h6>
            </legend>


            <h2>Escolha sua melhor foto de perfil</h2><br>
            <div class="field-group">
                <div class="field">
                    <input id="imagem" name="imagem" type="file" accept="image/*" onchange="previewImagem()" />
                </div>
                <div class="field">
                    <img src="img/default_photo.png" id="preview" style="width: 150px; height: 150px; border-radius: 100%" /></div>

            </div>

            <h2>Dados Profissionais</h2>
            <br>
            <div class="field-group">
                <div class="field">
                    <label for="espec">Minha especialidade *</label>
                    <select name="select">
                        <option value="0" selected>Nenhuma</option>
                        <option value="1">Enfermaria</option>
                        <option value="2">Cuidador de Idosos</option>
                        <option value="3">Cuidador de Crianças</option>
                        <option value="4">Cuidador de PcD's</option>
                        <option value="5">Cuidador de PcNE's</option>
                        <option value="6">Tratamento de feridos</option>
                    </select>
                </div>

                <div class="field">
                    <label for="zona">Zona de Atuação <t style="font-size:10pt;">(Até 30 caracteres)</t> *</label>
                    <input type="text" maxlength="30" placeholder="Ex.: Zona Sul e Grande Centro" required>
                </div>
            </div>


            <label for="">Minhas redes sociais</label><br>
            <div class="field">
                <label for="meuLink">Meu site: </label>
                <input type="text" id="meuLink" name="meuLink" placeholder="URL de Perfil do seu domínio">
            </div>
            <div class="field">
                <label for="instaLink">Instagram: </label>
                <input type="text" id="instaLink" name="instaLink" placeholder="URL de Perfil do Instagram">
            </div>
            <div class="field">
                <label for="faceLink">Facebook: </label>
                <input type="text" id="faceLink" name="faceLink" placeholder="URL de Perfil do Facebook">
            </div>



            <h2>Descrição de Perfil</h2>
            <h6>Caso algum campo não obrigatório não seja preenchido, ele não será mostrado no perfil</h6><br>
            <div class="field">
                <label required for="sobre">Sobre mim <t style="font-size:10pt;">(Até 400 caracteres)</t></label>
                <textarea name="sobre" style="resize: none" id="sobre" rows="8" placeholder="Fale um pouco sobre você"></textarea>
            </div>
            <div class="field">
                <label for="formacao">Formação Academica <t style="font-size:10pt;">(Até 400 caracteres)</t></label>
                <textarea name="formacao" style="resize: none" id="formacao" rows="8" placeholder="Se você tiver algum tipo de curso profissionalizante ou formação acadêmica, conte-nos"></textarea>
            </div>
            <div class="field">
                <label for="exp">Minhas experências <t style="font-size:10pt;">(Até 400 caracteres)</t></label>
                <textarea name="exp" style="resize: none" id="exp" rows="8" placeholder="Descreva um pouco sobre sua experiência na área"></textarea>

            </div>
            <div class="field">

            </div>
            <div class="field">

            </div>

            <input class="button" name="btnEdita" type="submit" value="Salvar alterações" style="margin-top: -30px; margin-bottom: -25px;"></input><br><br>

        </form>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <script>
            function previewImagem() {
                var imagem = document.querySelector('input[name=imagem]').files[0];
                var preview = document.querySelector('img#preview');

                var reader = new FileReader();

                reader.onloadend = function() {
                    preview.src = reader.result;
                }

                if (imagem) {
                    reader.readAsDataURL(imagem);
                } else {
                    preview.src = "";
                }
            }
        </script>
    </div>
</body>

</html>