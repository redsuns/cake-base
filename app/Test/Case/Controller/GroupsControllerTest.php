<?php
App::uses('GroupsController', 'Controller');

/**
 * GroupsController Test Case
 *
 */
class GroupsControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.group',
		'app.user'
	);

/**
 * testIndex method
 *
 * @return void
 */
	public function testIndex() {
            $result = $this->testAction('/groups/index');
            
            $this->assertEquals('Administrator', $this->vars['groups'][0]['Group']['name']);
	}

/**
 * testView method
 *
 * @return void
 */
	public function testView() {
            $result = $this->testAction('/groups/view/1');
            
            $this->assertEquals('Administrator', $this->vars['group']['Group']['name']);
	}
        
        /**
         * @expectedException NotFoundException
         */
        public function testViewWithException() {
            $this->testAction('/groups/view/asdas');
        }

/**
 * testAdd method
 *
 * @return void
 */
	public function testAdd() {
            $data = array('Group' => array('name' => 'Admin'));
            
            $this->testAction('/groups/add', array('data' => $data, 'method' => 'post'));
            
            $this->assertNotEqual($this->headers, null);
	}

        
/**
 * testEdit method
 *
 * @return void
 */
	public function testEdit() {
            $data = array('Group' => array('name' => 'Test'));
            
            $this->testAction('/groups/edit/1', array('data' => $data, 'method' => 'put'));
            
            $this->assertNotEqual($this->headers, null);
	}
        
        /**
         * @expectedException NotFoundException
         */
        public function testEditWithExeption() {
            $this->testAction('/groups/edit/asdsa');
        }

        
        public function testDelete() {
            $this->testAction('/groups/delete/1', array('data' => array('Group.id' => 1), 'method' => 'post'));
            $this->assertNotEqual($this->headers, null);
        }
        
        /**
         * @expectedException NotFoundException
         */
        public function testDeleteWithExeption() {
            $this->testAction('/groups/delete/asdsa');
        }
}
