<?php
App::uses('UsersController', 'Controller');
App::uses('User', 'Model');
App::uses('CakeEmail', 'Utility');

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
        
        public $User;
        
        public function setUp()
        {
            $this->User = ClassRegistry::init('User');
        }
        
        
        public function userData()
        {
            return array('User' => array(
                        'group_id' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'surname' => 'Lorem ipsum dolor sit amet',
			'email' => 'andre@redsuns.com.br',
			'username' => 'andre@redsuns.com.br',
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
        
        
        public function testLogin() 
        {
            $data = array('User' => array('username' => 'andrecardosodev@gmail.com', 'password' => 'andre'));
            
            $this->testAction('/users/login', array('data' => $data, 'method' => 'post'));
        }
        
        
        public function testLogout() 
        {
            $this->testAction('/users/logout');
            $this->assertNotEqual($this->headers, null);
        }
        

	public function testIndex() 
        {
            $result = $this->testAction('/users/index');
            
            $this->assertEquals('Andre', $this->vars['users'][0]['User']['name']);
	}


	public function testView() 
        {
            $result = $this->testAction('/users/view/1');
            
            $this->assertEquals('Andre', $this->vars['user']['User']['name']);
	}
        
        
        /**
        * @expectedException NotFoundException
        */
	public function testViewWithException() 
        {
            $result = $this->testAction('/users/view/ass');
	}
        

	public function testAdd() 
        {
            $start = $this->User->find('count');    
            $data = $this->userData();
            
            $this->testAction('/users/add', array('data' => $data, 'method' => 'post'));
            
            $end = $this->User->find('count');
            
            $this->assertEqual(($start+1), $end);
	}
        
       
        public function testFailAdd() 
        {
            $start = $this->User->find('count');    
            $data = $this->userData();
            $data['User']['password_confirm'] = 'asdas';
            
            $this->testAction('/users/add', array('data' => $data, 'method' => 'post'));
            
            $end = $this->User->find('count');
            
            $this->assertEqual($start, $end);
	}

        
        public function testIfEditUserIsAccessible()
        {
            $data = $this->userData();
            
            $this->testAction('/users/edit/1', array('data' => $data, 'method' => 'get'));
            
            $this->assertNotEqual(null, $this->vars['groups']);
        }
        
        
	public function testEdit() 
        {
            $user = $this->User->read(null, 1);
            
            $data = $this->userData();
            $data['User']['id'] = 1;
            $data['User']['name'] = 'Editado';
            
            $this->testAction('/users/edit/1', array('data' => $data, 'method' => 'put'));
            
            $editedUser= $this->User->read(null, 1);
            
            $this->assertNotEqual(null, $this->headers['Location']);
            $this->assertNotEqual($editedUser['User']['name'], $user['User']['name']);
	}
        
        
        public function testEditFail()
        {
            $start = $this->User->find('count');
            
            $data = $this->userData();
            $data['User']['name'] = null;
            
            $this->testAction('/users/edit/1', array('data' => $data, 'method' => 'post'));
            
            $end = $this->User->find('count');
            
            $this->assertEqual($start, $end);
        }
        
        
        /**
         * @expectedException NotFoundException
         */
        public function testEditWithException() 
        {
            $this->testAction('/users/edit/asds');
        }

        
        public function testDelete() 
        {
            $start = $this->User->find('count');
            
            $this->testAction('/users/delete/1', array('data' => array('User.id' => 1), 'method' => 'post'));
            $this->assertNotEqual($this->headers, null);
            
            $end = $this->User->find('count');
            
            $this->assertEqual(($start-1), $end);
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
            $start = $this->User->find('count');    
            $data = $this->userData();
            $data['User']['send_email'] = false;
            
            $this->testAction('/admin/users/add', array('data' => $data, 'method' => 'post'));
            
            $end = $this->User->find('count');
            
            $this->assertNotEqual(null, $this->vars['groups']);
            $this->assertEqual(($start+1), $end);
	}
        
        
        public function testAdminAddFail()
        {
            $start = $this->User->find('count');
            $data = $this->userData();
            $data['User']['name'] = null;
            
            $this->testAction('/admin/users/add', array('data' => $data, 'method' => 'post'));
            
            $end = $this->User->find('count');
            
            $this->assertEqual($start, $end);
        }
        
        
        /**
         * @expectedException SocketException
         */
        public function testAdminAddSendingEmail() 
        {
            $data = $this->userData();
            $data['User']['send_email'] = 1;
            
            $this->testAction('/admin/users/add', array('data' => $data, 'method' => 'post'));
	}
        
        
        public function testAdminAddWithErrors() 
        {
            $start = $this->User->find('count');    
            $data = $this->userData();
            $data['User']['send_email'] = false;
            $data['User']['password_confirm'] = 'asdas';
            
            $this->testAction('/admin/users/add', array('data' => $data, 'method' => 'post'));
            
            $end = $this->User->find('count');
            $this->assertEqual($start, $end);
	}
        
        
        public function testAdminDelete() 
        {
            $start = $this->User->find('count');
            $this->testAction('/admin/users/delete/1', array('data' => array('User.id' => 1), 'method' => 'post'));
            $end = $this->User->find('count');
            
            $this->assertEqual(($start-1), $end);
        }
        
        
        /**
         * @expectedException NotFoundException
         */
        public function testAdminDeleteWithException() 
        {
            $this->testAction('/admin/users/delete/asds');
        }
        
}
