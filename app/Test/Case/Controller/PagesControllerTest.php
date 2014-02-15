<?php

App::uses('PagesController', 'Controller');


class PagesControllerTest extends ControllerTestCase
{

    public $fixtures = array(
        'app.node'
    );
    
    
    public function setUp()
    {
        
    }
    
    public function tearDown()
    {
        
    }
    
    public function testIfIndexIsAccessible()
    {
        $this->testAction('/');
        $this->assertNoErrors();
    }
    
    public function testIfContactIsAccessible()
    {
        $this->testAction('/contato', array('method' => 'get'));
        $this->assertNoErrors();
    }
    
    
    /**
     * @expectedException SocketException
     */
    public function testIfIsSendingContact()
    {
        $data = array('Contact' => array(
            'name' => 'teste',
            'email' => 'andrecardosodev@gmail.com',
            'subject' => 'teste',
            'message' => 'teste'
        ));
        
        $this->testAction('/contato', array('data' => $data, 'method' => 'post'));
    }
    
    
    public function testIfIsAbleToReadContentToFixedPages()
    {
        $this->testAction('/sobre');
        $this->assertNoErrors();
        $this->assertNotNull($this->vars['content']);
    }
    
    
    public function testIfAdminIndexIsAccessible()
    {
        $this->testAction('/admin/pages/index');
        $this->assertNoErrors();
        $this->assertNotNull($this->vars['title_for_layout']);
    }
    
    public function testIfAdminIndexIsGettingRequestedPage()
    {
        $this->testAction('/admin/pages/index/sobre');
        $this->assertNoErrors();
        $this->assertNotNull($this->vars['title_for_layout']);
        $this->assertEqual('Sobre', $this->vars['title_for_layout']);
    }
    
    
    public function testIfAdminIndexIsAbleToSaveModifiedPage()
    {
        $data = array('Node' => array(
            'type' => 'page',
            'location' => 'sobre',
            'main' => 'Teste'
        ));
        
        $this->testAction('/admin/pages/index/sobre', array('data' => $data, 'method' => 'post'));
        $this->assertNoErrors();
    }
    
    
    
    public function testIfAdminIndexIsAbleToRejectInvalidPageLocation()
    {
        $data = array('Node' => array(
            'type' => 'page',
            'location' => null,
            'main' => 'Teste'
        ));
        
        $this->testAction('/admin/pages/index/sobre', array('data' => $data, 'method' => 'post'));
        $this->assertNoErrors();
    }

}
