<?php
App::uses('Node', 'Model');

/**
 * Node Test Case
 *
 */
class NodeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.node'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Node = ClassRegistry::init('Node');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Node);

		parent::tearDown();
	}
        
        
        
        public function testIfValidationForEmptyTypeWasCalled()
        {
            $this->Node->set(array('type' => ''));
            
            $result = $this->Node->validates(array('fieldList' => array('type')));
            
            $this->assertFalse($result, 'Permitiu cadastro sem definir o tipo do node');
        }
        
        
        public function testIfvalidationForEmptyLocationWasCalled()
        {
            $this->Node->set(array('location' => ''));
            
            $result = $this->Node->validates(array('fieldList' => array('location')));
            
            $this->assertFalse($result, 'Permitiu cadastro sem definir definir onde o mesmo estará disposto');
        }

}
