<?php
session_start();
unset($_SESSION['id'], $_SESSION['nome'], $_SESSION['email'] );

$_SESSION['msg'] = "<p style='color: var(--title-color)'>Deslogado com sucesso.</p> <br>";
header("Location: loginPro.php");