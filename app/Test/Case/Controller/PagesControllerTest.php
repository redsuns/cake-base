<?php

App::uses('PagesController', 'Controller');
App::uses('EmailComponent', 'Controller/Component');


/**
 * @group App
 */
class PagesControllerTest extends ControllerTestCase
{

    public $fixtures = array(
        'app.node',
        'app.user',
        'app.group'
    );
    
    
    public function testIfIndexIsAccessible()
    {
        $this->testAction('/');
    }
    
    public function testIfContactIsAccessible()
    {
        $this->testAction('/contato', array('method' => 'get'));
    }
    
    
    public function testIfIsSendingContact()
    {
        $data = array('Contact' => array(
            'name' => 'teste',
            'email' => 'andrecardosodev@gmail.com',
            'subject' => 'teste',
            'message' => 'teste'
        ));
        
        $email = $this->generate('Pages', array('components' => array('Email' => array('sendContactEmail')))); 

        $email->Email->expects($this->once())->method('sendContactEmail')->will($this->returnValue(true));
        
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
    
    
    public function testIfIsSendingEmail()
    {
        $contactData = array(
            'Contact' => array(
                'email' => 'teste@teste.com.br',
                'subject' => 'teste',
                'name' => 'teste',
                'message' => 'twste')
        );
        
        $contact = $this->generate('Pages', array('components' => array('Email' => array('sendContactEmail')))); 

        $contact->Email->expects($this->once())->method('sendContactEmail')->will($this->returnValue(true));
        
        $this->testAction('/contato', array('data' => $contactData, 'method' => 'post'));
        
        $this->assertNotNull($this->headers['Location']);
    }

}
