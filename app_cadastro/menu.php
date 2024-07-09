<?php
$ses_logado = "N";
session_start();
if (isset($_SESSION["ses_logado"])) {
    $ses_logado = $_SESSION["ses_logado"];
} 
if($ses_logado == "S") {
    require_once("html/menu.html");
} else { 
    header("Location: index.php");
}
?>