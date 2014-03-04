<?php
App::uses('View', 'View');
App::uses('AppHelper', 'View/Helper');
App::uses('BrazilianStatesHelper', 'View/Helper');

/**
 * @group App
 */
class BrazilianStatesHelperTest extends CakeTestCase
{
    protected $BrazilianState;
    protected $class;
    
    public function setUp()
    {
        $view = new View();
        $this->BrazilianState = new BrazilianStatesHelper($view);
        $this->class = 'BrazilianStateHelper';
        parent::setUp();
    }
    
    public function tearDown()
    {
        unset($this->BrazilianState, $this->class);
        parent::tearDown();
    }
    
    
    public function testIfIsAnArray()
    {
        $this->assertNotNull($this->BrazilianState->getCombo());
        $this->assertArrayHasKey('PR', $this->BrazilianState->getCombo());
    }
    
    
    /**
     * @expectedException NotFoundException
     */
    public function testIfIsThrowingExceptionAsExpected()
    {
        $this->BrazilianState->getState();
    }
    
    
    public function testIfIsRetrivingOnlyOneState()
    {
        $state = $this->BrazilianState->getState('PR');
        
        $this->assertEquals('Paraná', $state);
    }
    
    
    public function testIfIsReturningNullValueOnInvalidState()
    {
        $result = $this->BrazilianState->getState('AZ');
        
        $this->assertNull($result);
    }
    
    
    public function testIfIsRetrievingStateByNameAndReturningUF()
    {
        $result = $this->BrazilianState->getStateByName('São Paulo');
        
        $this->assertNotNull($result);
        $this->assertEquals('SP', $result);
    }
    
    /**
     * @expectedException NotFoundException
     */
    public function testIfIsTrowingExceptionOnNullStateNamePassedArgument()
    {
        $this->BrazilianState->getStateByName();
    }
    
    public function testIfIsReturningNullOnNotFoundArrayKeyStateName()
    {
        $result = $this->BrazilianState->getStateByName('Curitiba');
        
        $this->assertNull($result);
    }
    
}
