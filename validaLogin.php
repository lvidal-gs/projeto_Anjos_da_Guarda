<?php
session_start();
include_once("conexao.php");
$btnLogin = filter_input(INPUT_POST, 'btnLogin', FILTER_SANITIZE_STRING);

if ($btnLogin) { //se o botão for acionado...
    $escolha = filter_input(INPUT_POST, 'escolha', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

    if ((!empty($email)) and (!empty($senha)) and (!empty($escolha))) {
        if ($escolha == 'P') {
            $result_usuario = "SELECT * FROM cuidador WHERE email = '$email' LIMIT 1";
            $resultado = mysqli_query($conn, $result_usuario);
            if ($resultado) { //se for TRUE
                $row_usuario = mysqli_fetch_assoc($resultado);
                if (password_verify($senha, $row_usuario['senha'])) { //lê-se: SE A SENHA DIGITADA FOR IGUAL A DO BANCO, FAÇA...
                    $_SESSION['id'] = $row_usuario['id'];
                    $_SESSION['nome'] = $row_usuario['nome'];
                    $_SESSION['sobrenome'] = $row_usuario['sobrenome'];
                    $_SESSION['email'] =  $row_usuario['email'];
                    $_SESSION['telefone'] = $row_usuario['telefone'];
                    $_SESSION['uf'] = $row_usuario['uf'];
                    $_SESSION['cidade'] = $row_usuario['cidade'];
                    $_SESSION['bairro'] = $row_usuario['bairro'];
                    $_SESSION['nvl'] = $row_usuario['nivel'];
                    $_SESSION['espec'] = $row_usuario['espec'];

                    header("Location: perfilPro.php");
                } else {
                    $_SESSION['msg'] = "<p style='background: #FFC7CE; border-width: 0.5px; border-style: solid;
        border-color: #7A0006; border-radius: 3px; color: #7A0006; padding: 8px 8px 8px 12px'>Login ou senha incorretos.</p><br>";
                    header("Location: login.php");
                }
            } else {
                $_SESSION['msg'] = "<p style='background: #FFC7CE; border-width: 0.5px; border-style: solid;
        border-color: #7A0006; border-radius: 3px; color: #7A0006; padding: 8px 8px 8px 12px'>Usuário não encontrado</p><br>"; //cria a variavel global 
                header("Location: login.php");
            }

        } else {
            $result_usuario = "SELECT * FROM clientes WHERE email = '$email' LIMIT 1";
            $resultado = mysqli_query($conn, $result_usuario);

            if ($resultado) { //se for TRUE
                $row_usuario = mysqli_fetch_assoc($resultado);
                if (password_verify($senha, $row_usuario['senha'])) { //lê-se: SE A SENHA DIGITADA FOR IGUAL A DO BANCO, FAÇA...
                    $_SESSION['id'] = $row_usuario['id'];
                    $_SESSION['nome'] = $row_usuario['nome'];
                    $_SESSION['sobrenome'] = $row_usuario['sobrenome'];
                    $_SESSION['email'] =  $row_usuario['email'];
                    $_SESSION['telefone'] = $row_usuario['telefone'];
                    $_SESSION['uf'] = $row_usuario['uf'];
                    $_SESSION['cidade'] = $row_usuario['cidade'];
                    $_SESSION['bairro'] = $row_usuario['bairro'];
                    $_SESSION['nvl'] = $row_usuario['nivel'];

                    header("Location: perfilCliente.php");
                } else {
                    $_SESSION['msg'] = "<p style='background: #FFC7CE; border-width: 0.5px; border-style: solid;
        border-color: #7A0006; border-radius: 3px; color: #7A0006; padding: 8px 8px 8px 12px'>Login ou senha incorretos.</p><br>";
                    header("Location: login.php");
                }
            } else {
                $_SESSION['msg'] = "<p style='background: #FFC7CE; border-width: 0.5px; border-style: solid;
        border-color: #7A0006; border-radius: 3px; color: #7A0006; padding: 8px 8px 8px 12px'>Usuário não encontrado.</p><br>"; //cria a variavel global 
                header("Location: login.php");
            }
        }
    
    } else if ((empty($email)) and (!empty($senha)) and (!empty($escolha))) {
        $_SESSION['msg'] = "<p style='background: #FFC7CE; border-width: 0.5px; border-style: solid;
        border-color: #7A0006; border-radius: 3px; color: #7A0006; padding: 4px 4px 4px 8px'>Preencha o campo de e-mail.</p><br>"; //cria a variavel global 
        header("Location: login.php");

    } else if ((!empty($email)) and (empty($senha)) and (!empty($escolha))) {
        $_SESSION['msg'] = "<p style='background: #FFC7CE; border-width: 0.5px; border-style: solid;
        border-color: #7A0006; border-radius: 3px; color: #7A0006; padding: 8px 8px 8px 12px'>Preencha o campo de senha.</p><br>"; //cria a variavel global 
        header("Location: login.php");

    } else if ((!empty($email)) and (!empty($senha)) and (empty($escolha))) {
        $_SESSION['msg'] = "<p style='background: #FFC7CE; border-width: 0.5px; border-style: solid;
        border-color: #7A0006; border-radius: 3px; color: #7A0006; padding: 8px 8px 8px 12px'>Escolha o tipo de Login no sistema.</p><br>"; //cria a variavel global 
        header("Location: login.php");

    } else if ((empty($email)) or (empty($senha)) or (empty($escolha))) {
        $_SESSION['msg'] = "<p style='background: #FFC7CE; border-width: 0.5px; border-style: solid;
        border-color: #7A0006; border-radius: 3px; color: #7A0006; padding: 8px 8px 8px 12px'>Preencha todos os campos.</p><br>"; //cria a variavel global 
        header("Location: login.php");

    }

} else { //caso não...
    $_SESSION['msg'] = "<p style='background: #FFC7CE; border-width: 0.5px; border-style: solid;
        border-color: #7A0006; border-radius: 3px; color: #7A0006; padding: 8px 8px 8px 12px'></p>Página não encontrada."; //cria a variavel global 
    header("Location: loginPro.php");
}
?>

