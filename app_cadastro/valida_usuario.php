<?php
function validaLogin() { 
    $usuario="";
    $senha="";
    if (isset($_POST["txt_usuario"])) {
        $usuario = trim($_POST["txt_usuario"]);
    }
    if (isset($_POST["pwd_senha"])) {
        $senha = trim($_POST["pwd_senha"]);
    }
    $achou = false;
    $arq = fopen("dados/ARQ_LOGIN.TXT","r");
    if ($arq) {
        while (!feof($arq)) {
            $registro = fgets($arq);
            $reg_usuario = trim(substr($registro,5,15));
            $reg_senha   = trim(substr($registro,16,30));
            if (($usuario == $reg_usuario) && ($senha == $reg_senha)) {
                $achou = true;
                break;
            }
        }
    }
    fclose($arq);
    if ($achou) {
        session_start();
        $_SESSION["ses_logado"]="S";
        header("Location: menu.php",true);
    } else {
        print("Usuario/Senha não existe");
        header("Refresh: 1;url=index.php",true,401);
    }
} 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    validaLogin();
} else { 
    print("Usuário não autorizado");
    header("Refresh: 1;url=index.php",true,401);    
}
?>