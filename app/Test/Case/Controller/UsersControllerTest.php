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

        
        public function testLogin() {
            $data = array('User' => array('username' => 'andre@redsuns.com.br', 'password' => '123'));
            
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
            
            $this->assertEquals('Lorem ipsum dolor sit amet', $this->vars['users'][0]['User']['name']);
	}

/**
 * testView method
 *
 * @return void
 */
	public function testView() {
            $result = $this->testAction('/users/view/1');
            
            $this->assertEquals('Lorem ipsum dolor sit amet', $this->vars['user']['User']['name']);
	}
        
        
        /**
 * testView method
 *
 * @expectedException NotFoundException
 */
	public function testViewWithException() {
            $result = $this->testAction('/users/view/ass');
            
            $this->assertEquals('Lorem ipsum dolor sit amet', $this->vars['user']['User']['name']);
	}

/**
 * testAdd method
 *
 * @return void
 */
	public function testAdd() {
                $data = array('User' => array(
                        'group_id' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'surname' => 'Lorem ipsum dolor sit amet',
			'email' => 'andre@redsuns.com.br',
			'username' => 'Lorem ipsum dolor sit amet',
                        'password' => '123',
			'address' => 'Lorem ipsum dolor sit amet',
			'addr_number' => 1,
			'addr_complement' => 'Lorem ipsum dolor sit amet',
			'addr_district' => 'Lorem ipsum dolor sit amet',
			'addr_city' => 'Lorem ipsum dolor sit amet',
			'addr_state' => 'PR',
			'addr_country' => 'Lorem ipsum dolor sit amet',
			'addr_zip_code' => 'Lorem ip',
			'phone' => 'Lorem ipsum ',
			'celphone' => 'Lorem ipsum d',
                ));
            
            $this->testAction('/users/add', array('data' => $data, 'method' => 'post'));
            
            $this->assertNotEqual($this->headers, null);
	}

        
/**
 * testEdit method
 *
 * @return void
 */
	public function testEdit() {
            $data = array('User' => array(
                'group_id' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'surname' => 'Lorem ipsum dolor sit amet',
			'email' => 'andre@redsuns.com.br',
			'username' => 'Lorem ipsum dolor sit amet',
                        'password' => '123',
			'address' => 'Lorem ipsum dolor sit amet',
			'addr_number' => 1,
			'addr_complement' => 'Lorem ipsum dolor sit amet',
			'addr_district' => 'Lorem ipsum dolor sit amet',
			'addr_city' => 'Lorem ipsum dolor sit amet',
			'addr_state' => 'PR',
			'addr_country' => 'Lorem ipsum dolor sit amet',
			'addr_zip_code' => 'Lorem ip',
			'phone' => 'Lorem ipsum ',
			'celphone' => 'Lorem ipsum d',
                ));
            
            $this->testAction('/users/edit/1', array('data' => $data, 'method' => 'put'));
            
            $this->assertNotEqual($this->headers, null);
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

}
