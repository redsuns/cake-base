<?php
App::uses('UsersController', 'Controller');

/**
 * UsersController Test Case
 *
 */
class UsersControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.user',
		'app.group'
	);
        
        
        public function userData()
        {
            return array('User' => array(
                        'group_id' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'surname' => 'Lorem ipsum dolor sit amet',
			'email' => 'andre@redsuns.com.br',
			'username' => 'Lorem ipsum dolor sit amet',
                        'password' => '123',
                        'password_confirm' => '123',
			'address' => 'Lorem ipsum dolor sit amet',
			'addr_number' => 1,
			'addr_complement' => 'Lorem ipsum dolor sit amet',
			'addr_district' => 'Lorem ipsum dolor sit amet',
			'addr_city' => 'Lorem ipsum dolor sit amet',
			'addr_state' => 'PR',
			'addr_country' => 'Lorem ipsum dolor sit amet',
			'addr_zip_code' => 'Lorem ip',
			'phone' => 'Lorem ipsum ',
			'cellphone' => 'Lorem ipsum d',
                ));
        }

        public function login()
        {
            $data = array('User' => array('username' => 'andrecardosodev@gmail.com', 'password' => 'andre'));
            
            $this->testAction('/users/login', array('data' => $data, 'method' => 'post'));
        }
        
        
        public function testLogin() {
            $data = array('User' => array('username' => 'andrecardosodev@gmail.com', 'password' => 'andre'));
            
            $this->testAction('/users/login', array('data' => $data, 'method' => 'post'));
        }
        
        public function testLogout() {
            $this->testAction('/users/logout');
            $this->assertNotEqual($this->headers, null);
        }
        
/**
 * testIndex method
 *
 * @return void
 */
	public function testIndex() {;
            $result = $this->testAction('/users/index');
            
            $this->assertEquals('Andre', $this->vars['users'][0]['User']['name']);
            $this->assertNoErrors();
	}

/**
 * testView method
 *
 * @return void
 */
	public function testView() {
            $result = $this->testAction('/users/view/1');
            
            $this->assertEquals('Andre', $this->vars['user']['User']['name']);
	}
        
        
        /**
 * testView method
 *
 * @expectedException NotFoundException
 */
	public function testViewWithException() {
            $result = $this->testAction('/users/view/ass');
            
            $this->assertEquals('Andre', $this->vars['user']['User']['name']);
	}

/**
 * testAdd method
 *
 * @return void
 */
	public function testAdd() 
        {
                
            $data = $this->userData();
            
            $this->testAction('/users/add', array('data' => $data, 'method' => 'post'));
            
            $this->assertNotEqual($this->headers, null);
	}
        
       
        public function testFailAdd() 
        {
                
            $data = $this->userData();
            $data['User']['password_confirm'] = 'asdas';
            
            $this->testAction('/users/add', array('data' => $data, 'method' => 'post'));
            
            $this->assertNotEqual($this->headers, null);
	}

        
        public function testIfEditUserIsAccessible()
        {
            $data = $this->userData();
            
            $this->testAction('/users/edit/1', array('data' => $data, 'method' => 'get'));
            
            $this->assertNotEqual(null, $this->vars['groups']);
        }
        
/**
 * testEdit method
 *
 * @return void
 */
	public function testEdit() 
        {
            
            $data = $this->userData();
            
            $this->testAction('/users/edit/1', array('data' => $data, 'method' => 'put'));
            
            $this->assertNotEqual(null, $this->headers['Location']);
	}
        
        
        /**
         * @expectedException NotFoundException
         */
        public function testEditWithException() {
            $this->testAction('/users/edit/asds');
        }

        
        public function testDelete() {
            $this->testAction('/users/delete/1', array('data' => array('User.id' => 1), 'method' => 'post'));
            $this->assertNotEqual($this->headers, null);
        }
        
        
        /**
         * @expectedException NotFoundException
         */
        public function testDeleteWithException() {
            $this->testAction('/users/delete/asds');
        }
        
        public function testAdminLogin()
        {
            $data = array('User' => array('username' => 'andrecardosodev@gmail.com', 'password' => 'andre'));
            
            $this->testAction('/admin/users/login', array('data' => $data, 'method' => 'post'));
            $this->assertNoErrors();
        }
        
        public function testAdminLogout()
        {
            $this->testAction('/admin/users/logout');
            $this->assertNoErrors();
        }
        
        public function testAdminIndex() 
        {
            $this->login();
            
            $this->testAction('/admin/users');
            
            $this->assertNotEquals(null, $this->vars['users']);
            $this->assertNoErrors();
	}
        
        public function testAdminAdd() 
        {
                
            $data = $this->userData();
            $data['User']['send_email'] = false;
            
            $this->testAction('/admin/users/add', array('data' => $data, 'method' => 'post'));
            
            
            $this->assertNoErrors();
            $this->assertNotEqual(null, $this->vars['groups']);
	}
        
        /**
         * @expectedException SocketException
         */
        public function testAdminAddSendingEmail() 
        {
                
            $data = $this->userData();
            $data['User']['send_email'] = 1;
            
            $this->testAction('/admin/users/add', array('data' => $data, 'method' => 'post'));
            
            
            $this->assertNoErrors();
            $this->assertNotEqual(null, $this->vars['groups']);
	}
        
        
        public function testAdminAddWithErrors() 
        {
                
            $data = $this->userData();
            $data['User']['send_email'] = false;
            $date['User']['password_confirm'] = 'asdas';
            
            $this->testAction('/admin/users/add', array('data' => $data, 'method' => 'post'));
            
            $this->assertNoErrors();
	}
        
        public function testAdminDelete() {
            $this->testAction('/admin/users/delete/1', array('data' => array('User.id' => 1), 'method' => 'post'));
            $this->assertNoErrors();
        }
        
        
        /**
         * @expectedException NotFoundException
         */
        public function testAdminDeleteWithException() {
            $this->testAction('/admin/users/delete/asds');
        }
        
        
}
