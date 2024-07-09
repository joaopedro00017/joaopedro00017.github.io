<?php
$ses_logado = "N";
session_start();
if (isset($_SESSION["ses_logado"])) {
    $ses_logado = $_SESSION["ses_logado"];
} 
if($ses_logado == "S") {
    busca_cpf();
} else { 
    print("Acesso não Autorizado");
    header("Refresh: 1;url=index.php",true,401);
}
function busca_cpf() {
    $achou = false;
    $str_cpf="";
    $nome="";
    $telefone="";  
    if (isset($_GET["cpf"])) {
        $cpf = trim($_GET["cpf"]);
        $arq = fopen("dados/ARQ_CADASTRO.TXT","r");
        if ($arq) { 
            while (!feof($arq)) {
                $registro = fgets($arq);
                $reg_cpf = trim(substr($registro,0,11));
                if ($cpf == $reg_cpf) {
                    $achou = true;
                    $cpf01=substr($reg_cpf,0,3);
                    $cpf02=substr($reg_cpf,3,3);
                    $cpf03=substr($reg_cpf,6,3);
                    $cpf04=substr($reg_cpf,9,2);
                    $str_cpf=$cpf01.".".$cpf02.".".$cpf03."-".$cpf04;
                    $nome=trim(substr($registro,11,40));   
                    $telefone=trim(substr($registro,51,15));
                    break;
                }
            }        
        }        
    }     
    if ($achou) {   
        require_once("html/exclusao.html");
    } else {
        print("Acesso não Autorizado");
        header("Refresh: 1;url=index.php",true,401);
    }
}
?>