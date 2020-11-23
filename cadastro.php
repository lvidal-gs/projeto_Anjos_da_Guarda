<?php
session_start();
ob_start();
$btnCadastro = filter_input(INPUT_POST, 'btnCadastro', FILTER_SANITIZE_STRING);

if ($btnCadastro) {
    include_once 'conexao.php';
    $escolha = filter_input(INPUT_POST, 'tipo-cadastro', FILTER_SANITIZE_STRING);
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    $dados['senha'] = password_hash($dados['senha'], PASSWORD_DEFAULT); //CRIPTOGRAFA A A SENHA
    $cep = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_NUMBER_INT);
    $rua = filter_input(INPUT_POST, 'rua', FILTER_SANITIZE_STRING);
    $bairro = filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_STRING);
    $uf = filter_input(INPUT_POST, 'uf', FILTER_SANITIZE_STRING);
    $cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);
    $numero = filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_STRING);
    $comp = filter_input(INPUT_POST, 'comp', FILTER_SANITIZE_STRING);
    $sexo = filter_input(INPUT_POST, 'sexo', FILTER_SANITIZE_STRING);
    $data = $_POST['data'];
    $data = date("Y-m-d", strtotime(str_replace('/', '-', $data)));

    if ($escolha == 'P') {
        $busca = "SELECT * FROM cuidador";
        $busca_query = mysqli_query($conn, $busca);
        if ($busca_query) {
            $row_usuario = mysqli_fetch_assoc($busca_query);
            if ($dados['email'] === $row_usuario['email']) {
                $_SESSION['msg'] = " <p style='color: red; margin-top:20px; margin-bottom: -30px'>Esse e-mail já está cadastrado.</p>";
            } else if ($dados['cpf'] === $row_usuario['cpf']) {
                $_SESSION['msg'] = " <p style='color: red; margin-top:20px; margin-bottom: -30px'>Esse cpf já está cadastrado.</p>";
            } else if ($dados['telefone'] === $row_usuario['telefone']) {
                $_SESSION['msg'] = " <p style='color: red; margin-top:20px; margin-bottom: -30px'>Esse telefone já está cadastrado.</p>";
            } else {
                $result_usuario = "INSERT INTO  cuidador(nome, sobrenome, cpf, sexo, nascimento, email, senha, telefone, cep, rua,bairro, cidade, uf, numero, comp, created, nivel, espec)
            VALUES(
                '" . $dados['nome'] . "',
                '" . $dados['sobrenome'] . "', 
                '" . $dados['cpf'] . "',
                '$sexo',
                '$data',
                '" . $dados['email'] . "',
                '" . $dados['senha'] . "',
                '" . $dados['telefone'] . "',
                '$cep',
                '$rua',
                '$bairro',
                '$cidade',
                '$uf',
                '$numero',
                '$comp',
                now(),
                DEFAULT,
                '6')";

                $resultado = mysqli_query($conn, $result_usuario);
                if (mysqli_insert_id($conn)) {
                    header("Location: sucessoCuidador.php");
                } else {
                    $_SESSION['msg'] = " <p style='color: red; margin-top:20px; margin-bottom: -30px'>Erro ao cadastrar o usuário! Contate nosso suporte agora mesmo!</p>";
                }
            }
        }
    }else if ($escolha == 'C'){
        $busca = "SELECT * FROM clientes";
        $busca_query = mysqli_query($conn, $busca);
        if ($busca_query) {
            $row_usuario = mysqli_fetch_assoc($busca_query);
            if ($dados['email'] === $row_usuario['email']) {
                $_SESSION['msg'] = " <p style='color: red; margin-top:20px; margin-bottom: -30px'>Esse e-mail já está cadastrado.</p>";
            } else if ($dados['cpf'] === $row_usuario['cpf']) {
                $_SESSION['msg'] = " <p style='color: red; margin-top:20px; margin-bottom: -30px'>Esse cpf já está cadastrado.</p>";
            } else if ($dados['telefone'] === $row_usuario['telefone']) {
                $_SESSION['msg'] = " <p style='color: red; margin-top:20px; margin-bottom: -30px'>Esse telefone já está cadastrado.</p>";
            } else {
                $result_usuario = "INSERT INTO  clientes(nome, sobrenome, cpf, sexo, nascimento, email, senha, telefone, cep, rua,bairro, cidade, uf, numero, comp, created, nivel)
            VALUES(
                '" . $dados['nome'] . "',
                '" . $dados['sobrenome'] . "', 
                '" . $dados['cpf'] . "',
                '$sexo',
                '$data',
                '" . $dados['email'] . "',
                '" . $dados['senha'] . "',
                '" . $dados['telefone'] . "',
                '$cep',
                '$rua',
                '$bairro',
                '$cidade',
                '$uf',
                '$numero',
                '$comp',
                now(),
                '2')";

                $resultado = mysqli_query($conn, $result_usuario);
                if (mysqli_insert_id($conn)) {
                    header("Location: sucessoCliente.php");
                } else {
                    $_SESSION['msg'] = " <p style='color: red; margin-top:20px; margin-bottom: -30px'>Erro ao cadastrar o usuário! Contate nosso suporte agora mesmo!</p>";
                }
            }
        }
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



    <title>Cadastro de Cuidador</title>
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

        <form name=form method="POST" action="">

            <h1>Cadastre-se na nossa plataforma!</h1>
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

            <!--FORMULÁRIO DE CADASTRO - DADOS BÁSICOS-->
            <fieldset>

                <legend>
                    <h2>Dados Básicos</h2>
                    <h6>Preenchimento Obrigatório (*)</h6>
                </legend>

                <div class="field">
                    <label for="sexo">Eu quero me cadastrar como *</label>
                    <div class="cntr">

                        <label for="op1" class="radio" required>
                            <input type="radio" name="tipo-cadastro" id="op1" class="hidden" value="P" />
                            <span class="label"></span>Profissional - Cuidador
                        </label>

                        <label for="op2" class="radio">
                            <input type="radio" name="tipo-cadastro" id="op2" class="hidden" value="C" />
                            <span class="label"></span>Cliente
                        </label>
                    </div>
                </div>

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

            <fieldset>
                <legend>
                    <h2>Endereço</h2>
                    <h6>Aviso: Este formulário se auto-completa</h6>
                </legend>


                <div class="field">
                    <label for="cep">CEP *</label>
                    <input name="cep" type="text" id="cep" placeholder="Insira o seu número de CEP" maxlength="9" minlength="8" onblur="pesquisacep(this.value);" required /></label>
                </div>

                <div class="field">
                    <label>Rua *</label>
                    <input name="rua" type="text" id="rua" minlength="3" placeholder="Insira o nome da sua rua" required />
                </div>

                <div class="field-group">
                    <div class="field">
                        <label>Bairro *</label>
                        <input name="bairro" type="text" id="bairro" minlenght="3" placeholder="Insira o nome do seu bairro" required />
                    </div>

                    <div class="field">
                        <label>Cidade *</label>
                        <input name="cidade" type="text" id="cidade" minlength="3" placeholder="Insira o nome da sua cidade" required />
                    </div>
                </div>

                <div class="field-group">
                    <div class="field">
                        <label>Estado *</label>
                        <input name="uf" type="text" id="uf" placeholder="Insira sua UF" maxlength="2" required />
                    </div>

                    <div class="field">
                        <label>Número </label>
                        <input name="numero" type="text" id="numero" placeholder="Insira o número do imóvel">
                    </div>

                </div>

                <div class="field">
                    <label>Complemento</label>
                    <input name="comp" type="text" id="complemento" maxlenght="45" placeholder="Ex.: Apto. Nº5, Bloco 2">
                </div>

                <p class="sublink">Já é cadastrado? <a href="login.php">Clique aqui</a>.</p>
                <input class="button" onclick="return validar()" name="btnCadastro" type="submit" value="Cadastrar-se"></input><br><br>

                <h6>
                    Ao clicar em “Cadastrar-se”, você aceita os Termos de Uso da Anjos da Guarda e confirma que leu a Política de Privacidade. Você também concorda em receber mensagens em seu e-mail, inclusive automáticas, provenientes da companhia e de suas afiliadas para fins informativos e/ou de marketing, no número que informou. A aceitação do recebimento de mensagens de marketing não é condição para usar os serviços da Anjos da Guarda. Você compreende que, para cancelar o recebimento, pode cancelá-los via e-mail.
                </h6>

    </div>
    </fieldset>


    </form>
</body>
</div>

</html>