<?php
session_start();
ob_start();
$btnCadastro = filter_input(INPUT_POST, 'btnCadastro', FILTER_SANITIZE_STRING);
if ($btnCadastro) {
    include_once 'conexao.php';
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    //var_dump($dados); //mostra o array criado
    $sexo_dados = filter_input(INPUT_POST, 'sexo', FILTER_SANITIZE_STRING);
    $dados['senha'] = password_hash($dados['senha'], PASSWORD_DEFAULT);
    $data = $_POST['data'];
    $data = date("Y-m-d", strtotime(str_replace('/', '-', $data)));

    $result_usuario =
        "INSERT INTO  clientes(
        nome,
        sobrenome, 
        cpf, 
        sexo,
        nascimento,
        email, 
        senha, 
        telefone, 
        created) VALUES(
        '" . $dados['nome'] . "',
        '" . $dados['sobrenome'] . "', 
        '" . $dados['cpf'] . "',
        '$sexo_dados',
        '$data',
        '" . $dados['email'] . "',
        '" . $dados['senha'] . "',
        '" . $dados['telefone'] . "',
        now())";

    $resultado = mysqli_query($conn, $result_usuario);
    if (mysqli_insert_id($conn)) {
        header("Location: cadSucess.php");
    } else {
        $_SESSION['msg'] =  " <p style='color: red; margin-top:20px; margin-bottom: -30px'>Erro ao cadastrar o usuário! Verifique se preencheu todos os campos corretamente.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/anjos_da_guarda_logo_favicon.png" />

    <script type="text/javascript" src="js/end_viacep.js"></script>
    <link rel="stylesheet" href="css/styles.css">

    <script type="text/javascript" src="js/validaform.js"></script>
    <script type="text/javascript" src="js/valida_cpf.js"></script>

    <title>Cadastro de Cliente</title>
</head>


<body>
    <div id="cad-pro">
        <header>

            <a href="index.html">
                <img src="img/anjos_da_guarda_logo_sf" width="225px">
            </a>

            <a href="index.html">
                <img src="img/arrow.svg" alt="" height="12px" collor="#2274a5">
                Voltar para home
            </a>
        </header>

        <form method="POST" action="">

            <h1>Cadastre-se como cliente!</h1>
            <?php
            if (isset($_SESSION['msg'])) {
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }

            if (isset($_SESSION['msgCad'])) {
                echo $_SESSION['msgCad'];
                unset($_SESSION['msgCad']);
            }
            ?>

            <fieldset>

                <legend>
                    <h2>Dados Básicos</h2>
                    <h6>Preenchimento Obrigatório (*)</h6>
                </legend>

                <!--FORMULÁRIO DE CADASTRO - DADOS BÁSICOS-->

                <div class="field-group">
                    <div class="field">
                        <label for="nome">Nome *</label>
                        <input type="text" name="nome" maxlength="40" minlength="3" placeholder="Insira seu nome" required>
                    </div>

                    <div class="field">
                        <label for="sobrenome">Sobrenome *</label>
                        <input type="text" name="sobrenome" maxlength="40" minlength="3" placeholder="Insira seu sobrenome" required>
                    </div>
                </div>

                <div class="field">
                    <label for="email">E-mail *</label>
                    <input type="text" name="email" maxlength="50" minlength="8" placeholder="Insira seu melhor e-mail" required>
                </div>

                <div class="field">
                    <label for="sexo">Sexo *</label>
                    <div class="cntr">

                        <label for="opt1" class="radio" required>
                            <input type="radio" name="sexo" id="opt1" class="hidden" value="M" />
                            <span class="label"></span>Masculino
                        </label>

                        <label for="opt2" class="radio">
                            <input type="radio" name="sexo" id="opt2" class="hidden" value="F" />
                            <span class="label"></span>Feminino
                        </label>

                        <label for="opt3" class="radio">
                            <input type="radio" name="sexo" id="opt3" class="hidden" value="O" />
                            <span class="label"></span>Outro
                        </label>

                        <label for="opt4" class="radio">
                            <input type="radio" name="sexo" id="opt4" class="hidden" value="U" />
                            <span class="label"></span>Prefiro não declarar
                        </label>
                    </div>
                </div>
                <div class="field-group">
                    <div class="field">
                        <label for="data">Data de Nascimento *</label>
                        <input type="date" name="data" placeholder="" required>
                    </div>
                    <div class="field">
                        <label for="CPF">CPF * <t style="font-size: 8pt;">(somente números)</t></label>
                        <input type="text" id="cpf" name="cpf" minlenght="1" maxlength="11" placeholder="Insira seu CPF" onchange="validacao()" required>
                    </div>
                </div>

                <div class="field">
                    <label for="whatsapp">Tel. Whatsapp (DDD)+(Tel.) * <t style="font-size: 8pt;">(somente números)</t></label>
                    <input type="text" name="telefone" maxlength="11" minlength="9" placeholder="Insira o seu número de WhatsApp" required>
                </div>
                <div class="field-group">
                    <div class="field">
                        <label for="senha">Digite sua senha * <t style="font-size: 8pt;">(min. 6 caract.)</t></label>
                        <input type="password" name="senha" minlength="6" placeholder="Insira uma senha" required>
                    </div>

                    <div class="field">
                        <label for="senha_confirma">Digite sua senha novamente *</label>
                        <input type="password" name="senha_confirma" minlength="6" placeholder="Insira sua senha novamente" required>
                    </div>
                </div>
            </fieldset>

            <p class="sublink">Já é cadastrado? <a href="loginPro.php">Clique aqui</a>.</p>
            <input class="button" onclick="return validar()" name="btnCadastro" type="submit" value="Cadastrar-se"></input><br><br>

            <h6>
                Ao clicar em “Cadastrar-se”, você aceita os Termos de Uso da Anjos da Guarda e confirma que leu a Política de Privacidade. Você também concorda em receber mensagens em seu e-mail, inclusive automáticas, provenientes da companhia e de suas afiliadas para fins informativos e/ou de marketing, no número que informou. A aceitação do recebimento de mensagens de marketing não é condição para usar os serviços da Anjos da Guarda. Você compreende que, para cancelar o recebimento, pode cancelá-los via e-mail.
            </h6>

    </div>
    </fieldset>


    </form>
</body>
</html>