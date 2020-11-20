

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/anjos_da_guarda_logo_favicon.png" />

    <script type="text/javascript" src="js/end_viacep.js"></script>

    <link rel="stylesheet" href="css/styles.css">

    <title>Meu Perfil</title>
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
    </div>

    <main>
        <div class="dados">
            <img src="img/414b4e357225d55c6b59c36376637324.jpg" alt="">
            <div class="info">
                <h1>Dino Silva Sauro</h1>
                <h4>Não é a mamãe</h4>
                <h4>Vila dos dinossauros, próximo ao centro</h4>
            </div>
            <div class="contact">
                <h3>Whatsapp: (11)94002-8922</h3>
                <h3>E-mail: dino.sauro@gmail.com</h3>
            </div>
        </div>

        <div class="sobre">
            <section>
                <h1>Sobre</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo sequi ipsa quod dolore officia ipsam aperiam architecto totam est! Neque ipsam harum saepe cupiditate repellendus quo pariatur ipsa ad excepturi.</p>
            </section>
        </div>

        <div class="sobre">
            <section>
                <h1>Formação</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id rerum provident magnam omnis ex sit dicta, tempora, at nisi ratione quisquam officiis animi harum doloribus facilis deleniti totam. Aliquam, quibusdam?</p>
            </section>
        </div>

        <div class="sobre">
            <section>
                <h1>Experiencia</h1>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Culpa obcaecati nostrum magni aliquam tempora provident a voluptate. Voluptatem placeat maxime, perferendis in deserunt esse ipsa ea aliquam, eligendi iusto nihil?</p>
            </section>
        </div>
    </main>
    
    

    
</body>
</html>

<style>
    main{
        background-color: white;
        min-height: 600px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-evenly;
        border: solid 1.75px #3980a8;
        box-shadow: none;
    }

    .dados{
        margin: 10px 10px;
        display: flex;
        align-items: center;
        justify-content: space-evenly;
    }

    .dados img{
        margin: 10px 10px;
        width: 200px;
        padding: 5px 5px;
        border: solid 2px black;
        border-radius: 10px;
        background-color: white;
        justify-self: flex-start;
    }

    .dados .info{
        margin: 10px 10px;
        flex: 2;
    }

    .dados .contact{
        justify-self: flex-end;
        margin: 10px 10px;
    }

    .sobre{
        margin: 10px 10px;
        align-self: center;
    }
</style>

