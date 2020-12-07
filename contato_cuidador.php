<?php
include_once("conexao.php");
session_start();
ob_start();


$cuidador = "SELECT c.*, e.`relacao`
            FROM cuidador AS c 
            JOIN especialidades AS e
            ON e.`id_espec` = c.`espec`
            WHERE id = '" . $_SESSION['id'] . "' ";
$query_busca = mysqli_query($conn, $cuidador);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/hamburguer.css" />
    <link rel="shortcut icon" href="img/anjos_da_guarda_logo_favicon.png">
    <script type="text/javascript" src="js/animacao_hamb.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="js/personalizado.js"></script>
    <title>Fale conosco</title>
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
                <img src="img/anjos_da_guarda_logo_sf" width="225px">
            </a>

            <a id="setinha" href="perfilPro.php">
                <img src="img/arrow.svg" alt="" height="12px">
                Voltar para o meu perfil
            </a>
        </header>

        <?php while ($row_usuario = mysqli_fetch_assoc($query_busca)) { ?>
            <form name=form method="POST" action="">

                <h1>Converse conosco!</h1>
                <?php
                if (isset($_SESSION['msg'])) {
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }

                ?>

                <!--FORMULÁRIO DE CADASTRO - DADOS BÁSICOS-->
                <fieldset>
                    <legend>
                        <h2>Formulário de Contato</h2>
                        <h6>Preenchimento Obrigatório (*)</h6>
                    </legend>

                    <div class="field-group">
                        <div class="field">
                            <label for="nome">Nome *</label>
                            <input type="text" id="nome" name="nome" minlenght="1" placeholder="Insira seu nome" value="<?php echo "" . $row_usuario['nome'] . " " . $row_usuario['sobrenome'] . "" ?>" required>
                        </div>
                        <div class="field">
                            <label for="email">E-mail *</label>
                            <input type="text" name="email" placeholder="Insira aqui o seu email de contato" value="<?php echo $row_usuario['email'] ?>" required>
                        </div>
                    </div>
                    <div class="field">

                        <select id="tipo" name="tipo" required name="assunto">
                            <option value="" disabled selected>Selecione qual o assunto que será abordado</option>
                            <option value="1">Eu quero fazer uma denúncia.</option>
                            <option value="2">Eu quero dar dicas de melhorias.</option>
                            <option value="3">Eu quero relatar um bug/defeito na aplicação.</option>
                            <option value="4">Outra</option>
                        </select>

                    </div>

                    <div class="field">
                        <label for="msg">Escreva sua mensagem *</label>
                        <textarea name="x" style="resize: none" id="msg" rows="10" placeholder="Escreva aqui sua mensagem"></textarea>
                    </div>
                    <br>

                    <h6>A mensagem será lida por um de nossos funcionários. A resposta poderá demorar até 3 dias úteis para
                        ser respondida.</h6>
                    <input class="button" name="btnEnvia" type="submit" value="Enviar mensagem"></input>

                    <script>
                        $(function() {

                            var placeholders = {
                                '1': 'Insira o nome completo do cliente, o telefone e o por quê da denúncia.',
                                '2': 'Conte para nós, o que você acha que podemos melhorar?',
                                '3': 'Conte detalhadamente qual o defeito você encontrou e em qual página da aplicação.',
                                '4': 'Conte detalhadamente sobre o que você quer nos contar.'
                            };

                            $('#tipo').on('change', function() {
                                var placeholder = placeholders[$(this).val()] || 'Escreva aqui sua mensagem';
                                $('textarea').attr('placeholder', placeholder);
                            });
                        });
                    </script>

                </fieldset>
            </form>
    </div>
<?php } ?>
</body>


</html>