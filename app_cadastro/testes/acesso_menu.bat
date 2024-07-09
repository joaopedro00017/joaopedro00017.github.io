@echo off
rem "Teste de acesso ao menu"
rem https://stackoverflow.com/questions/19137876/how-do-i-loop-a-batch-script-only-a-certain-amount-of-times
set loop=0
echo "Iniciando o teste"
:inicio
curl -i http://127.0.0.1:3504/menu.php
set /a loop=%loop%+1 
if "%loop%"=="10" goto fim
goto inicio

:fim
echo "Fim de teste"