<?php
session_start();
include_once("conexao.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

if(!empty($id)){
	$result_usuario = "DELETE FROM cuidador WHERE id='$id'";
	$resultado_usuario = mysqli_query($conn, $result_usuario);
	if(mysqli_affected_rows($conn)){
		$_SESSION['msg'] = "<p style='background: #B2D0EC; border-width: 0.5px; border-style: solid;
		border-color: #1F4E78; border-radius: 3px; color: #1F4E78; padding: 8px 8px 8px 12px'>Usuário apagado com sucesso! 😥</p><br>";
		header("Location: login.php");
	}else{
		$_SESSION['msg'] = "<p style='background: #FFC7CE; border-width: 0.5px; border-style: solid;
		border-color: #7A0006; border-radius: 3px; color: #7A0006; padding: 8px 8px 8px 12px'>Erro ao apagar o usuário</p>";
		header("Location: editarPerfil_cuidador.php");
	}
}
