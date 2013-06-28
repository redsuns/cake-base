<?php
/**
 * Script para adicionar a base em um novo projeto
 * 
 * v1
 */


if ( isset($argv[1]) ) {
  
    $caminhoCopiaArquivos = $argv[1];
    
    
    echo "\nCOPIANDO ARQUIVOS DO PACOTE BASE PARA O DESTINO INFORMADO\n\n";
    
    echo "\n-- Copiando Models\n";
    exec("cp -fr app/Model " . $caminhoCopiaArquivos . "/app/");
    echo "\n-- Ok\n";
    
    echo "\n-- Copiando Controllers\n";
    exec("cp -fr app/Controller " . $caminhoCopiaArquivos . "/app/");
    echo "\n-- Ok\n";
    
    echo "\n-- Copiando Views\n";
    exec("cp -fr app/View " . $caminhoCopiaArquivos . "/app/");
    echo "\n-- Ok\n";
    
    echo "\n-- Copiando Css\n";
    exec("cp -fr app/webroot/css/* " . $caminhoCopiaArquivos . "/app/webroot/css/");
    echo "\n-- Ok\n";
    
    echo "\n-- Copiando Js\n";
    exec("cp -fr app/webroot/js/* " . $caminhoCopiaArquivos . "/app/webroot/js/");
    echo "\n-- Ok\n";
    
    echo "\n-- Copiando Coverage\n";
    exec("cp -fr app/webroot/coverage " . $caminhoCopiaArquivos . "/app/webroot/");
    echo "\n-- Ok\n";
    
    echo "\n-- Copiando Testes\n";
    exec("cp -fr app/Test " . $caminhoCopiaArquivos . "/app/");
    echo "\n-- Ok\n";
    
    
    echo "\nOk\n\n";
    
    echo "Aplicando permissões necessárias \n\n";
    exec("chmod -R 777 " . $caminhoCopiaArquivos);
    echo "\nOk\n";
    
    
    echo "\n\nPROCESSO DE CÓPIA FINALIZADO!\n\n";
    
} else {
    echo "\n\nInforme o caminho completo para que os arquivos sejam copiados Ex: '/var/www/meu-projeto'\n\n";
}
exit();
