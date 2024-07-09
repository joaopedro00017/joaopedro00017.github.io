<?php
$ses_logado = "N";
session_start();
if (isset($_SESSION["ses_logado"])) {
    $ses_logado = $_SESSION["ses_logado"];
}
if ($ses_logado == "S") { 
    print("Usuário já autorizado, redirecionando para menu...");
    header("Refresh: 1;url=menu.php",true,302);    
} else { 
    $_SESSION["ses_logado"]="N";
    require_once("html/index.html");
}
?>