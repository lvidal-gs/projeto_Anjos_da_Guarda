<?php
session_start();
ob_start();
$btnCadastro = filter_input(INPUT_POST, 'btnCadastro', FILTER_SANITIZE_STRING);

if ($btnCadastro) {
    include_once 'conexao.php';
    $escolha = filter_input(INPUT_POST, 'tipo-cadastro', FILTER_SANITIZE_STRING);
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    $dados['senha'] = password_hash($dados['senha'], PASSWORD_DEFAULT); //CRIPTOGRAFA A A SENHA
    $sexo = filter_input(INPUT_POST, 'sexo', FILTER_SANITIZE_STRING);
    $data = $_POST['data'];
    $data = date("Y-m-d", strtotime(str_replace('/', '-', $data)));

    if ($escolha == 'P') {
        $busca = "SELECT * FROM cuidador";
        $busca_query = mysqli_query($conn, $busca);
        if (isset($busca_query)) {
            $row_usuario = mysqli_fetch_assoc($busca_query);
            if ($dados['email'] === $row_usuario['email']) {
                $_SESSION['msg'] = " <p style='background: #FFC7CE; border-width: 0.5px; border-style: solid;
                border-color: #7A0006; border-radius: 3px; color: #7A0006; padding: 8px 8px 8px 12px; margin-top:20px; margin-bottom: -30px'>Esse e-mail já está cadastrado.</p>";
            } elseif ($dados['cpf'] === $row_usuario['cpf']) {
                $_SESSION['msg'] = " <p style='background: #FFC7CE; border-width: 0.5px; border-style: solid;
                border-color: #7A0006; border-radius: 3px; color: #7A0006; padding: 8px 8px 8px 12px; margin-top:20px; margin-bottom: -30px'>Esse número de CPF já está cadastrado.</p>";
            } elseif ($dados['telefone'] === $row_usuario['telefone']) {
                $_SESSION['msg'] = " <p style='background: #FFC7CE; border-width: 0.5px; border-style: solid;
        border-color: #7A0006; border-radius: 3px; color: #7A0006; padding: 8px 8px 8px 12px; margin-top:20px; margin-bottom: -30px'>Esse telefone já está cadastrado.</p>";
            } else {
                //QUERY DADOS CADASTRAIS
                $usuario = "INSERT INTO  cuidador
                VALUES(
                DEFAULT,
                DEFAULT,
                '" . $dados['nome'] . "',
                '" . $dados['sobrenome'] . "', 
                '" . $dados['cpf'] . "',
                '$sexo',
                '$data',
                '" . $dados['email'] . "',
                '" . $dados['senha'] . "',
                '" . $dados['telefone'] . "',
                NULL,
                NULL,
                DEFAULT,
                DEFAULT, 
                NULL,
                NULL,
                NULL,
                NULL,
                NULL,
                NULL,
                NULL,
                NULL,
                NULL,
                NULL,
                DEFAULT,
                DEFAULT,
                DEFAULT,
                now(),
                NULL)";
                
                $query_usuario = mysqli_query($conn, $usuario);
                if (mysqli_insert_id($conn)) {
                    header("Location: sucessoCuidador.php");
                } else {
                    $_SESSION['msg'] = " <p style='background: #FFC7CE; border-width: 0.5px; border-style: solid;
                    border-color: #7A0006; border-radius: 3px; color: #7A0006; padding: 8px 8px 8px 12px; margin-top:20px; margin-bottom: -30px'>Erro ao cadastrar o usuário! Não foi possivel conectar-se à base de dados.</p>";
                }
            }
        }
    } elseif ($escolha == 'C') {
        $busca = "SELECT * FROM clientes";
        $busca_query = mysqli_query($conn, $busca);
        if (isset($busca_query)) {
            $row_usuario = mysqli_fetch_assoc($busca_query);
            if ($dados['email'] === $row_usuario['email']) {
                $_SESSION['msg'] = " <p style='background: #FFC7CE; border-width: 0.5px; border-style: solid;
                border-color: #7A0006; border-radius: 3px; color: #7A0006; padding: 8px 8px 8px 12px; margin-top:20px; margin-bottom: -30px'>Esse e-mail já está cadastrado.</p>";
            } elseif ($dados['cpf'] === $row_usuario['cpf']) {
                $_SESSION['msg'] = " <p style='background: #FFC7CE; border-width: 0.5px; border-style: solid;
                border-color: #7A0006; border-radius: 3px; color: #7A0006; padding: 8px 8px 8px 12px; margin-top:20px; margin-bottom: -30px'>Esse número de CPF já está cadastrado.</p>";
            } elseif ($dados['telefone'] === $row_usuario['telefone']) {
                $_SESSION['msg'] = " <p style='background: #FFC7CE; border-width: 0.5px; border-style: solid;
        border-color: #7A0006; border-radius: 3px; color: #7A0006; padding: 8px 8px 8px 12px; margin-top:20px; margin-bottom: -30px'>Esse telefone já está cadastrado.</p>";
            } else {
                //QUERY DADOS CADASTRAIS
                $usuario = "INSERT INTO  clientes
                VALUES(
                DEFAULT,
                DEFAULT,
                '" . $dados['nome'] . "',
                '" . $dados['sobrenome'] . "', 
                '" . $dados['cpf'] . "',
                '$sexo',
                '$data',
                '" . $dados['email'] . "',
                '" . $dados['senha'] . "',
                '" . $dados['telefone'] . "',
                DEFAULT,
                NULL,
                NULL,
                NULL,
                NULL,
                NULL,
                NULL,
                NULL,
                NULL,
                DEFAULT,
                DEFAULT,
                DEFAULT,
                now(),
                NULL)";
                
                $query_usuario = mysqli_query($conn, $usuario);

                if (mysqli_insert_id($conn)) {
                    header("Location: sucessoCliente.php");
                } else {
                    $_SESSION['msg'] = " <p style='background: #FFC7CE; border-width: 0.5px; border-style: solid;
                    border-color: #7A0006; border-radius: 3px; color: #7A0006; padding: 8px 8px 8px 12px; margin-top:20px; margin-bottom: -30px'>Erro ao cadastrar o usuário! Não foi possivel conectar-se à base de dados.</p>";
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

    
    <link rel="stylesheet" href="css/styles.css">

    <script type="text/javascript" src="js/validaform.js"></script>
    <script type="text/javascript" src="js/valida_cpf.js"></script>




    <title>Cadastro de Usuário</title>
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
                            <input checked type="radio" name="tipo-cadastro" id="op1" class="hidden" value="P" />
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
                            <input checked type="radio" name="sexo" id="opt1" class="hidden" value="M" />
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

            <p class="sublink">Já é cadastrado? <a href="login.php">Clique aqui</a>.</p>
            <input style="margin-left: 170px" class="button" onclick="return validar()" name="btnCadastro" type="submit" value="Cadastrar-se"></input><br><br>

            </fieldset>
            <h6>
                Ao clicar em “Cadastrar-se”, você aceita os Termos de Uso da Anjos da Guarda e confirma que leu a Política de Privacidade. Você também concorda em receber mensagens em seu e-mail, inclusive automáticas, provenientes da companhia e de suas afiliadas para fins informativos e/ou de marketing, no número que informou. A aceitação do recebimento de mensagens de marketing não é condição para usar os serviços da Anjos da Guarda. Você compreende que, para cancelar o recebimento, pode cancelá-los via e-mail.

    </div>


    </form>
</body>
</div>

</html>