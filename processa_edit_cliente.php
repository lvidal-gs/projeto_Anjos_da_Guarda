<?php
session_start();
include_once("conexao.php");

$id = $_SESSION['id'];
$nece = filter_input(INPUT_POST, 'nece', FILTER_SANITIZE_NUMBER_INT);
$sobre = filter_input(INPUT_POST, 'sobre', FILTER_SANITIZE_STRING);
$requisitos = filter_input(INPUT_POST, 'requisitos', FILTER_SANITIZE_STRING);
$obs = filter_input(INPUT_POST, 'obs', FILTER_SANITIZE_STRING);
$cep = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_STRING);
$uf = filter_input(INPUT_POST, 'uf', FILTER_SANITIZE_STRING);
$cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);
$rua = filter_input(INPUT_POST, 'rua', FILTER_SANITIZE_STRING);
$bairro = filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_STRING);
$numero = filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_STRING);
$comp = filter_input(INPUT_POST, 'comp', FILTER_SANITIZE_STRING);

//MANIPULAÇÃO DA IMAGEM
$imagem = filter_input(INPUT_POST, 'imagem', FILTER_SANITIZE_STRING);
$extensao = strtolower(substr($_FILES['imagem']['name'], -4));
$new_name = md5(time()) . $extensao;
$dir = 'uploads/';
move_uploaded_file($_FILES['imagem']['tmp_name'], $dir.$new_name);


$editar = "UPDATE clientes SET
imagem = '$new_name',
necessidade = '$nece',
descServ = '$sobre',
descNece = '$requisitos',
descObs = '$obs',
cep = '$cep',
uf = '$uf',
cidade = '$cidade',
bairro = '$bairro',
rua = '$rua',
numero = '$numero',
comp = '$comp',
modified = now()
WHERE id = '$id'";

$query_editar = mysqli_query($conn, $editar);

if(mysqli_affected_rows($conn)){
    $_SESSION['msg'] = $msg = "<p style='background: #B2D0EC; border-width: 0.5px; border-style: solid;
    border-color: #1F4E78; border-radius: 3px; color: #1F4E78; padding: 8px 8px 8px 12px'>Alterações salvas com sucesso! 🥳</p> <br>";
    header("Location: editarPerfil_cliente.php");
}else{
    $msg = " <p style='background: #FFC7CE; border-width: 0.5px; border-style: solid;
    border-color: #7A0006; border-radius: 3px; color: #7A0006; padding: 8px 8px 8px 12px; margin-top:20px; margin-bottom: -30px'>Falha ao realizar alterações.</p>";
    header("Location: editarPerfil_cliente.php?id=$id");

}