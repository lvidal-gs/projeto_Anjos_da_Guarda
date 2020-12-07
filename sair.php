<?php
session_start();
unset($_SESSION['id'], $_SESSION['nome'], $_SESSION['email'] );

$_SESSION['msg'] = "<p style='background: #B2D0EC; border-width: 0.5px; border-style: solid;
border-color: #1F4E78; border-radius: 3px; color: #1F4E78; padding: 8px 8px 8px 12px'>Deslogado com sucesso. 😉</p> <br>";
header("Location: login.php");