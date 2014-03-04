<?php

/**
 * CakePHP Helper
 * 
 */
class BrazilianStatesHelper extends AppHelper
{

   
    protected $states = array(
        'AC' => 'Acre',
        'AL' => 'Alagoas',
        'AP' => 'Amapá',
        'AM' => 'Amazonas',
        'BA' => 'Bahia',
        'CE' => 'Ceará',
        'DF' => 'Distrito Federal',
        'ES' => 'Espírito Santo',
        'GO' => 'Goiás',
        'MA' => 'Maranhão',
        'MT' => 'Mato Grosso',
        'MS' => 'Mato Grosso do Sul',
        'MG' => 'Minas Gerais',
        'PA' => 'Pará',
        'PB' => 'Paraíba',
        'PR' => 'Paraná',
        'PE' => 'Pernambuco',
        'PI' => 'Piauí',
        'RJ' => 'Rio de Janeiro',
        'RN' => 'Rio Grande do Norte',
        'RS' => 'Rio Grande do Sul',
        'RO' => 'Roraima',
        'SC' => 'Santa Catarina',
        'SP' => 'São Paulo',
        'TO' => 'Tocantins'
    );
    

    /**
     * 
     * @return array
     */
    public function getCombo()
    {
        return $this->states;
    }
    
    /**
     * 
     * @param string $uf
     * @return string|null
     * @throws InvalidArgumentException
     */
    public function getState( $uf = null )
    {
        if( empty($uf) ) {
            throw new NotFoundException(__('Invalid State'));
        }
        
        if ( array_key_exists($uf, $this->states) ) {
            return $this->states[$uf];
        }
        
        return null;
    }
    
    /**
     * 
     * @param string $stateName
     * @return string|null
     * @throws NotFoundException
     */
    public function getStateByName( $stateName = null )
    {
        if ( empty($stateName) ) {
            throw new NotFoundException(__('Invalid State'));
        }
        
        $states = array_flip($this->states);
        
        if ( array_key_exists($stateName, $states) ) {
            return $states[$stateName];
        }
        
        return null;
    }

}
