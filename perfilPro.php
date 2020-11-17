<?php
    session_start();
if(!empty($_SESSION['id'])){
    echo "Olá ".$_SESSION['nome'].", bem vindo! <br>";
    echo "<a href='sair.php'>Sair</a>";
}else{
    $_SESSION['msg'] = "<p style='color: red'> Faça seu login corretamente! >:( </p><br>";
    header("Location: loginPro.php");
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

    <title>Meu Perfil</title>
</head>
<body>
    
</body>
</html>
