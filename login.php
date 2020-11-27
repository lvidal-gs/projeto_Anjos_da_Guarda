<?php
session_start();
ob_start();

?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="shortcut icon" href="img/anjos_da_guarda_logo_favicon.png" />
    <title>Área de Login</title>
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

        <form method="POST" action="validaLogin.php">
            <h1>Área de Login</h1>
            <h3>Escolha como quer acessar a plataforma </h3><br>
            <div style="margin-bottom: -40px;" class="field-group">
                <label for="sexo">
                    <h4>Fazer login como: </h4>
                </label>
                <div class="">
                    <label for="op1" class="radio" required>
                        <input type="radio" name="escolha" id="op1" class="hidden" value="P" />
                        <span class="label"></span>Sou um profissional/cuidador
                    </label>

                    <label for="op2" class="radio">
                        <input type="radio" name="escolha" id="op2" class="hidden" value="C" />
                        <span class="label"></span>Sou cliente
                    </label>
                </div>
            </div>
            <fieldset>
                <?php
                if (isset($_SESSION['msg'])) { //se existir
                    echo ($_SESSION['msg']); //printa a mensagem contida na variavel criada
                    unset($_SESSION['msg']);
                }

                ?>

                <div class="field">
                    <label for="email">E-mail</label>
                    <input name="email" type="email" autocomplete="on" placeholder="Insira aqui seu e-mail">
                </div>

                <div class="field">
                    <label for="password">Senha</label>
                    <input name="senha" type="password" autocomplete="off" placeholder="Insira aqui sua senha">
                </div>
            </fieldset>

            <p class="sublink">Ainda não é cadastrado? <a href="cadastro.php">Clique aqui</a>.</p>
            <p class="sublink">Esqueceu sua senha? <a href="#">Clique aqui</a>.</p>
            <input style ="margin-bottom: -25px" class="button" name="btnLogin" type="submit" value="Entrar"></input>
        </form>
    </div>
</body>

</html>