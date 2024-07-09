<?php
print("Acessando http://127.0.0.1:3504/menu.php\n");
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://127.0.0.1:3504/menu.php");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
for ($i=0;$i<10;$i++) { 
    $ret = curl_exec($ch);
    $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    if ($status == 200) {
        print(($i+1)." - Acessou o webservice\n");
    } else {
        print(($i+1)." - Erro ".$status." ao acessar\n");
    }
}
// Limpando biblioteca da memoria
curl_close($ch);
?>