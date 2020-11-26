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
    <div id="cad-pro">
        <header>

            <a href="index.php">
                <img src="img/anjos_da_guarda_logo_sf" width="225px">
            </a>

            <a href="index.php">
                <img src="img/arrow.svg" alt="" height="12px" collor="#2274a5">
                Voltar para home
            </a>
        </header>
        <form enctype="multipart/form-data" action="validaEditar.php" method="post">
            <legend>
                <h1>Editar - Meu perfil</h1>
                <h6>Preenchimento Obrigatório (*)</h6>
            </legend>


            <h2>Escolha sua melhor foto de perfil</h2><br>
            <div class="field-group">
                <div class="field">
                    <input width="50%" id="imagem" name="imagem" type="file" accept="image/*" onchange="previewImagem()" />
                </div>
                <div class="field">
                    <img src="img/default_photo.png" id="preview" style="width: 150px; height: 150px; border-radius: 100%" /></div>

            </div>

            <div class="field">
                <label for="espec">Minha Necessidade *</label>
                <select name="select">
                    <option value="0" selected>Nenhuma</option>
                    <option value="1">Preciso de enfermeiros autônomos</option>
                    <option value="2">Preciso de um cuidador de idosos</option>
                    <option value="3">Preciso de um cuidador de crianças/babysitter</option>
                    <option value="4">Preciso de um cuidador de PcD's</option>
                    <option value="5">Preciso de um cuidador de PcNE's</option>
                    <option value="6">Preciso de um tratador de feridos</option>
                </select>
            </div>

            <h2>Descrição de Perfil</h2>
            <h6>Caso algum campo não obrigatório não seja preenchido, ele não será mostrado no perfil</h6><br>
            <div class="field">
                <label for="sobre">Descrição de Serviço <t style="font-size:10pt;">(Até 400 caracteres)</t> *</label>
                <textarea required name="sobre" style="resize: none" id="sobre" rows="8" placeholder="Fale um pouco sobre o serviço cujo precisa"></textarea>
            </div>
            <div class="field">
                <label for="formacao">Requisitos necessários <t style="font-size:10pt;">(Até 400 caracteres)</t></label>
                <textarea  name="formacao" style="resize: none" id="formacao" rows="8" placeholder="Quais os requisitos que você quer que seu cuidador atenda? (Ex.: Ter experiencia de 5 anos na área de cuidados, ter disponibilidade aos finais de semana, etc.)"></textarea>
            </div>
            <div class="field">
                <label for="exp">Observações <t style="font-size:10pt;">(Até 400 caracteres)</t></label>
                <textarea name="exp" style="resize: none" id="exp" rows="8" placeholder="Coloque aqui mais detalhes do serviço"></textarea>

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