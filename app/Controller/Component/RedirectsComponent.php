<?php

/**
 * Realiza o redirecionamento correto de itens com erros de rastreamento 
 * via Google ou qualquer outra ferramenta, resumidamente,
 * todos os erros 404 rastreados e que tenham nexo podem ser 
 * redirecionados para seu equivalente a partir daqui
 *
 * @author Andre Cardoso aka andrebian
 */
class RedirectsComponent extends Component
{
    
    protected $permanent = array(); 
    protected $temporary = array();
    protected $controller;
    
    public function startup(\Controller $controller)
    {
        parent::startup($controller);   
    }
    
    public function initialize(\Controller $controller)
    {
        $this->controller = $controller;
        $this->permanent = array(
            'xpto' => '/' // Redireciona uma requsição de http://site.com.br/xpto para http://site.com.br/
        );
        
        $this->temporary = array(
            'asdas' => '/' // Redireciona uma requsição de http://site.com.br/asdas para http://site.com.br/
        );
    }
    
    public function apply( $url )
    {
        // movendo permanentemente
        if ( @$permanent = $this->permanent[$url] ) {
            $this->controller->redirect($permanent, 301);
        }
        
        // movendo temporariamente, em caso de ser algo que será criado
        if ( @$temporary = $this->temporary[$url] ) {
            $this->controller->redirect($temporary, 302);
        }
        return false;
    }
}
