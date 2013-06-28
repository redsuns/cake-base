<?php
/**
 * Script para adicionar a base em um novo projeto
 * 
 * v1
 */


if ( isset($argv[1]) ) {
  
    $caminhoCopiaArquivos = $argv[1];
    //die($caminhoCopiaArquivos);
    
    echo "\nCopiando arquivos do pacote base para o destino final \n\n";
    
    exec("cp -fr app/Model " . $caminhoCopiaArquivos . "/app/");
    exec("cp -fr app/Controller " . $caminhoCopiaArquivos . "/app/");
    exec("cp -fr app/View " . $caminhoCopiaArquivos . "/app/");
    exec("cp -fr app/webroot/css/* " . $caminhoCopiaArquivos . "/app/webroot/css/");
    exec("cp -fr app/webroot/js/* " . $caminhoCopiaArquivos . "/app/webroot/js/");
    exec("cp -fr app/Test " . $caminhoCopiaArquivos . "/app/");
    
    echo "\nOk\n\n";
    
    echo "Aplicando permissões necessárias \n\n";
    exec("chmod -R 777 " . $caminhoCopiaArquivos);
    echo "\nOk\n";
    
    
    echo "Finalizado!";
    
} else {
    echo "\n\nInforme o caminho completo para que os arquivos sejam copiados Ex: '/var/www/meu-projeto'\n\n";
}
exit();
