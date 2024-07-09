<?php
session_start();
if (isset($_SESSION["ses_logado"])) {
    $arq = fopen("dados/ARQ_CADASTRO.TXT","r");
    if ($arq) {
        $lista = array();
        $i=0;    
        while(!feof($arq)) {
            $registro = fgets($arq);
            $lista[$i]=array();
            $lista[$i][0]=trim(substr($registro,0,11));
            $lista[$i][1]=trim(substr($registro,11,40));
            $lista[$i][2]=trim(substr($registro,51,15));  
            $i++;
        }
    }
    require_once("html/consulta.html");
} else {
    header("Location: index.php");
}
?>