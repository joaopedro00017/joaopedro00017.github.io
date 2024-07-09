<?php
$segundos=5;
$url="index.php";
session_start();
if (isset($_SESSION["ses_logado"])) {
    unset($_SESSION["ses_logado"]);
    require_once("html/sair.html");
} else {
    header("Location: index.php");
}
?>