<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $assunto = $_POST['assunto'];
    $mensagem = $_POST['mensagem'];

    if ($btnEnvia) {
        $to = "lucasvidal.gs@gmail.com";
        $subject = "$assunto";
        $message = "<strong>Nome:</strong> $nome <br><br> <strong>E-mail:</strong> $email<br><br> <strong>Assunto:</strong> $assunto <br><br> <strong>Mensagem:</strong> $mensagem";
        $header = "MIME-Version: 1.0\n";
        $header .= "Content-type: text/html; charset=iso-8859-1\n";
        $header .= "From: $email\n";
        mail($to, $subject, $message, $header);
        echo "<js onclick='return validaContato()'></js>";
    }
    ?>
    <script type="text/javascript" src="js/validarContato.js"></script>
</body>

</html>