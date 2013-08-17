<?php
/**
 * Script para adicionar a base customizada do CakePHP em um novo projeto
 * 
 * @version 1 - 28/06/2013
 * @author Andre Cardoso <andrecardosodev@gmail.com>
 * 
 */


$init = new InitBase();

if ( isset($argv[1]) ) {

    switch ($argv[1]) {
        case 'help':
            $init->help();
            break;
        case 'version':
            $init->version();
            break;
        default:
            if ( is_dir($argv[1]) ) {
                $init->execute($argv[1]);
            } else {
                echo "\nERRO: O caminho digitado '" . $argv[1] . "' não foi localizado\n";
                echo "por favor informe um caminho válido\n";
                $init->available();
            }
            break;
    }
} else {
    $init->available();
}


class InitBase {
    
    private $caminhoCopiaArquivos;
    private $version;


    /**
     * 
     * @param string $destino
     */
    public function __construct() {
        $this->version = '1 - 28/06/2013';
    }
    
    /**
     * 
     */
    public function version() {
        echo "\n\n-----------------------------------------\n";
        echo "Cake Base Init versão " . $this->version . "\n";
        echo "-----------------------------------------\n\n";
    }
    
    /**
     * 
     */
    public function help() {
        
        $help = "\n\n-----------------------------------------";
        $help .= "\n\n";
        $help .= "Digite o caminho completo em que seu projeto se encontra";
        $help .= "\npara copiar os arquivos base.";
        $help .= "\n\n\n";
        $help .= "-----------------------------------------";
        $help .= "\n\n\n";
           
        echo $help;
    }
    
    /**
     * Exibido quando nada for digitado
     */
    public function available() {
        echo "\nCOMANDOS DISPONÍVEIS\n";
        echo "------------------------------------------------------------------------------";
        echo "\n* help                -- Exibe a ajuda deste utilitário\n";
        echo "* version             -- Exibe a versão deste utilitário\n";
        echo "* /caminho/completo   -- Copia os arquivos base para o diretório fornecido\n";
        echo "------------------------------------------------------------------------------\n\n";
    }
    
    
    
    public function execute($destino) {
        $this->caminhoCopiaArquivos = $destino;
        
        echo "\nEXECUTANDO CÓPIA E CONFIGURAÇÕES DO CAKE BASE\n\n";
        
        $this->__copiaArquivos();
        $this->__habilitaPlugins();
        $this->__aplicarPermissoes();
        
        echo "\nPROCESSO FINALIZADO!\n\n";
    }
    
    
    /**
     * 
     */
    private function __copiaArquivos() {
        
        echo "\n-- Copiando Models ";
        exec("cp -fr app/Model " . $this->caminhoCopiaArquivos . "/app/");
        echo "-- Ok\n";

        echo "\n-- Copiando Controllers ";
        exec("cp -fr app/Controller " . $this->caminhoCopiaArquivos . "/app/");
        echo "-- Ok\n";

        echo "\n-- Copiando Views ";
        exec("cp -fr app/View " . $this->caminhoCopiaArquivos . "/app/");
        echo "-- Ok\n";

        echo "\n-- Copiando Css ";
        exec("cp -fr app/webroot/css/* " . $this->caminhoCopiaArquivos . "/app/webroot/css/");
        echo "-- Ok\n";

        echo "\n-- Copiando Js ";
        exec("cp -fr app/webroot/js/* " . $this->caminhoCopiaArquivos . "/app/webroot/js/");
        echo "-- Ok\n";

        echo "\n-- Copiando Coverage ";
        exec("cp -fr app/webroot/coverage " . $this->caminhoCopiaArquivos . "/app/webroot/");
        echo " -- Ok\n";

        echo "\n-- Copiando Testes ";
        exec("cp -fr app/Test " . $this->caminhoCopiaArquivos . "/app/");
        echo "-- Ok\n";


        echo "\n-- Copiando Schema e database model ";
        exec("cp -fr app/Config/Schema/base.mwb " . $this->caminhoCopiaArquivos . "/app/Config/Schema/");
        exec("cp -fr app/Config/Schema/schema.php " . $this->caminhoCopiaArquivos . "/app/Config/Schema/");
        exec("cp -fr app/Config/Schema/schema.sql " . $this->caminhoCopiaArquivos . "/app/Config/Schema/");
        echo "-- Ok\n";

    }
    
    
    /**
     * 
     */
    private function __habilitaPlugins() {
        echo "\n-- Copiando Plugins ";
        exec("cp -fr app/Plugin " . $this->caminhoCopiaArquivos . "/app/");
        echo "-- Ok\n";
        
         echo "\n-- Habilitando plugins ";
        $bootstrap = fopen($this->caminhoCopiaArquivos . "/app/Config/bootstrap.php", "a");
        fwrite($bootstrap, "\nCakePlugin::loadAll();\n");
        fclose($bootstrap);
        echo "-- Ok\n";
    }
    
    
    /**
     * 
     */
    private function __aplicarPermissoes() {
        echo "\n-- Aplicando permissões ";
        exec("chmod -R 777 " . $this->caminhoCopiaArquivos);
        echo "-- Ok\n";
    }
    
}
