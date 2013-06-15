<?php
App::uses('Group', 'Model');

/**
 * Group Test Case
 *
 */
class GroupTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.group',
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Group = ClassRegistry::init('Group');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Group);

		parent::tearDown();
	}
        
        
        /**
         * 
         */
        public function testEmptyName() {
            $this->Group->set(array('name' => ''));
            
            $result = $this->Group->validates(array('fieldList' => array('name')));
            
            $this->assertFalse($result, 'Permitiu nome em branco');
        }
        
        
        /**
         * 
         */
        public function testFullEnroll() {
            $this->Group->save(array('name' => 'Partner'));
            
            $result = $this->Group->validates();
            
            $this->assertTrue($result, 'Não realizaou o cadastro do perfil');
        }

}
