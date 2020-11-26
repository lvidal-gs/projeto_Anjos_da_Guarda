<?php
session_start();
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/anjos_da_guarda_logo_favicon.png" />
    <link rel="stylesheet" href="css/styles.css">

    <script type="text/javascript" src="js/validarContato.js"></script>
    <title>Anjos da Guarda</title>
</head>

<body>


    <nav>
        <a href="index.php"> <img src="img/anjos_da_guarda_logo_nomeLateral.png" width="300px"> </a>
        <span>
            <ul>
                <li><a href="#cliente">Cliente</a></li>
                <li><a href="#cuidador">Cuidador</a></li>
                <li><a href="#sobre">Sobre</a></li>
                <li><a href="#cad-pro">Contato</a></li>
            </ul>
        </span>
        <div>
            <a href="login.php" class="botao" id="login">
                <strong>Login</strong>
            </a>
            <a href="cadastro.php" class="botao">
                <strong>Cadastre-se</strong>
            </a>
        </div>

    </nav>
?>
    <header id="home">
        <div class="core">
            <div class="funcionalidade">
                <h1>CUIDADORES</h1><br>
                <h2>Cadastre-se como cuidador e divulgue seu trabalho da melhor maneira!</h2><br>
                <a href="cadastro.php" class="botao">
                    <strong>Quero me cadastrar</strong>
                </a>

            </div>
            <div class="funcionalidade">
                <h1>CLIENTES</h1><br>
                <h2>Encontre aqui um serviço personalizado que se adeque as suas necessidades!</h2><br>
                <a class="botao" href="login.php">
                    <strong>Encontre um cuidador</strong>
                </a>
            </div>
        </div>
    </header>

    <main>
        <div id="cliente" class="content">
            
            <h1>Nossos clientes</h1><br><br>
            <h2>
                Como nosso cliente você pode encontrar um cuidador que preste serviços personalizados de acordo com suas
                necessidades.
                Nossos profissionais são capacitados e possuimos diversas especialidades.
            </h2>
            <br>
            
            <div class="especialidades">
                <h2>Nossa plataforma oferece:</h2> <br>
                <img src="img/especialidades.png" alt="" width="100%">
                <br>
            </div>
            <br>
            <h2>
                Ficou interessado e quer contratar um dos nossos cuidadores? Converse agora mesmo com um dos nossos profissionais cadastrados e veja quem atende melhor suas necessidades. Não perca tempo e acabe agora mesmo com suas preocupações clicando no botão abaixo! 
            </h2>
            <br>
            <a href="" class="botao">
                <strong>Encontre um cuidador</strong>
            </a>
        </div>
        <div id="cuidador" class="content">
            <h1>Nossos Profissionais</h1><br><br>
            <h2>
                A equipe da Anjos da guarda tem todo o preparo e disponibilidade para atender e auxiliar nossos clientes
                a qualquer momento, seja pelo nosso chat ou telefone. Buscando sempre a segurança e conforto de nossos
                clientes.
            </h2>
            <br>
            <a href="cadastro.php" class="botao">
                <strong>Quero me cadastrar</strong>
            </a>
        </div>

        <div class="content" id="sobre">
            <h1>Sobre nós</h1> <br><br>
            <h2>
                A Anjos da Guarda busca assegurar a segurança e qualidade de vida de seus clientes, buscando sempre
                atender com toda a atenção de profissionais qualificados de maneira prática sem complicações e com total
                comprometimento, pois quem ama cuida.
            </h2>
        </div>

        <div id="cad-pro" class="content" name="teste">
            <h1>Fale Conosco</h1><br><br>
            <h2 style="margin-top: -20px; margin-bottom: -30px;">Precisa falar conosco? Envie-nos uma mensagem!</h2>
            <br>
            <form method="POST" action="">
                <h1 style="text-align: center; margin-top: -35px;">Contato</h1><br><br>
                <h6 style="text-align: right;">Preenchimento obrigatório (*)</h6><br>

                <div class="field-group">
                    <div class="field">
                        <label for="name">Nome *</label>
                        <input type="text" onchange="return teste()"name="nome" id="name" placeholder="Insira seu nome">
                    </div>

                    <div class="field">
                        <label for="email">E-mail *</label>
                        <input type="email" id="email" name="email" placeholder="Insira seu e-mail de contato">
                    </div>
                </div>
                <div class="field">
                    <label for="assunto">Assunto *</label>
                    <input type="text" id="assunto" name="assunto" placeholder="Insira aqui o assunto a ser tratado">
                </div>
                <br>
                <div class="field">
                    <label for="msg">Escreva sua mensagem *</label>
                    <textarea name="mensagem" style="resize: none" id="msg" rows="10" placeholder="Escreva aqui a sua mensagem!"></textarea>
                </div>
                <br>

                <h6>A mensagem será lida por um de nossos funcionários. A resposta poderá demorar até 3 dias úteis para
                ser respondida.</h6>
                <input class="button"  name="btnEnvia" type="submit" value="Enviar mensagem"></input>
            </form>
        </div>
    </main>


    <footer>
        <p>
            <a href="https://www.facebook.com/centropaulasouza" target="_blank">
                <img src="img/face.png" width="23px">
                Facebook
            </a>
            <a href="https://www.instagram.com/centropaulasouza/?hl=pt-br" target="_blank">
                <img src="img/Insta.png" width="23px">
                Instagram
            </a>
            <a href="https://twitter.com/paulasouzasp?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor"
                target="_blank">
                <img src="img/twitter.png" width="23px">
                Twitter
            </a>
        </p>

        <p>
            <a href="index.html"><img src="img/anjos_da_guarda_logo_sf.png" width="200px" right="100px"></a>
        </p>

        <p id="nomes">
            ©Anjos da Guarda - Grupo 4: <br><br>
            Bruno Munaretti Fenerich<br>
            Flávio Augusto Alves Fernande<br>
            João Paulo Freitas Halcsik Silva<br>
            Lucas Vidal Gimenes dos Santos<br>
            Mateus de Oliveira Andrade<br>
            Nilo Matuki Zibetti<br>

        </p>
    </footer>
</body>

</html>