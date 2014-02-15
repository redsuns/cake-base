<?php
App::uses('User', 'Model');

/**
 * User Test Case
 *
 */
class UserTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.user',
		'app.group'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->User = ClassRegistry::init('User');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->User);

		parent::tearDown();
	}
        
        public function userData()
        {
            return array('User' => array(
                        'group_id' => 1,
                        'name' => 'Andre',
                        'surname' => 'Cardoso',
                        'email' => 'andrecardosodev@gmail.com',
                        'username' => 'andrecardosodev@gmail.com',
                        'password' => 'andre',
                        'password_confirm' => 'andre',
                        'address' => 'Rua teste',
                        'addr_number' => 1234,
                        'addr_complement' => '',
                        'addr_district' => 'Cajuru',
                        'addr_city' => 'Curitiba',
                        'addr_state' => 'PR',
                        'addr_country' => 'Brasil',
                        'addr_zip_code' => '88888-888',
                        'phone' => '(99) 9999-9999',
                        'cellphone' => '(99) 9999-9999'
                )
		);
        }
        
        
        public function testNotEmptyGroupId() {
            $this->User->set(array('group_id' => ''));
            
            $result = $this->User->validates(array('fieldList' => array('group_id')));
            
            $this->assertFalse($result, 'Permitiu cadastro sem vínculo');
        }
        
        
        public function testNotEmptyName() {
            $this->User->set(array('name' => ''));
            
            $result = $this->User->validates(array('fieldList' => array('name')));
            
            $this->assertFalse($result, 'Permitiu cadastro de usuário sem nome');
        }
        
        
        public function testNotEmptySurName() {
            $this->User->set(array('surname' => ''));
            
            $result = $this->User->validates(array('fieldList' => array('surname')));
            
            $this->assertFalse($result, 'Permitiu cadastro de usuário sem Sobrenome');
        }
        
        
        public function testNotEmptyEmail() {
            $this->User->set(array('email' => ''));
            
            $result = $this->User->validates(array('fieldList' => array('email')));
            
            $this->assertFalse($result, 'Permitiu cadastro de usuário sem email');
        }
        
        
        public function testNotInvalidEmail() {
            $this->User->set(array('email' => 'asdsads'));
            
            $result = $this->User->validates(array('fieldList' => array('email')));
            
            $this->assertFalse($result, 'Permitiu cadastro de usuário com email inválido');
        }
        
        
        public function testNotEmptyUsername() {
            $this->User->set(array('username' => ''));
            
            $result = $this->User->validates(array('fieldList' => array('username')));
            
            $this->assertFalse($result, 'Permitiu cadastro de usuário sem login');
        }
        
        
        public function testNotEmptyPassword() {
            $this->User->set(array('password' => ''));
            
            $result = $this->User->validates(array('fieldList' => array('password')));
            
            $this->assertFalse($result, 'Permitiu cadastro de usuário sem senha');
        }
        
        
        public function testNotEmptyPasswordConfirm() {
            $this->User->set(array('password_confirm' => ''));
            
            $result = $this->User->validates(array('fieldList' => array('password_confirm')));
            
            $this->assertFalse($result, 'Permitiu cadastro de usuário sem confirmação de senha');
        }
        
        
        public function testNotEmptyCompareDiffPasswords() {
            $this->User->set(array('password_confirm' => '123', 'password' => '1s23'));
            
            $result = $this->User->validates(array('fieldList' => array('password_confirm')));
            
            $this->assertFalse($result, 'Permitiu cadastro de usuário sem confirmação de senha');
        }
        
        
        public function testNotEmptyCompareEqualPasswords() {
            $this->User->set(array('password_confirm' => '123', 'password' => '123'));
            
            $result = $this->User->validates(array('fieldList' => array('password_confirm')));
            
            $this->assertTrue($result, 'Não validou as senhas');
        }
        
        
        public function testNotEmptyAddress() {
            $this->User->set(array('address' => ''));
            
            $result = $this->User->validates(array('fieldList' => array('address')));
            
            $this->assertFalse($result, 'Permitiu cadastro de usuário sem endereço');
        }
       
        
        public function testNotEmptyAddressNumber() {
            $this->User->set(array('addr_number' => ''));
            
            $result = $this->User->validates(array('fieldList' => array('addr_number')));
            
            $this->assertFalse($result, 'Permitiu cadastro de usuário sem número');
        }
        
        
        public function testNotAddressNumberNotANumber() {
            $this->User->set(array('addr_number' => 'ewqwq'));
            
            $result = $this->User->validates(array('fieldList' => array('addr_number')));
            
            $this->assertFalse($result, 'Não validou o número');
        }
        
        
        public function testNotEmptyDistrict() {
            $this->User->set(array('addr_district' => ''));
            
            $result = $this->User->validates(array('fieldList' => array('addr_district')));
            
            $this->assertFalse($result, 'Permitiu cadastro de usuário sem bairro');
        }
        
        
        public function testNotEmptyCity() {
            $this->User->set(array('addr_city' => ''));
            
            $result = $this->User->validates(array('fieldList' => array('addr_city')));
            
            $this->assertFalse($result, 'Permitiu cadastro de usuário sem cidade');
        }
        
        
        public function testNotEmptyState() {
            $this->User->set(array('addr_state' => ''));
            
            $result = $this->User->validates(array('fieldList' => array('addr_state')));
            
            $this->assertFalse($result, 'Permitiu cadastro de usuário sem estado');
        }
        
        
        public function testNotEmptyCountry() {
            $this->User->set(array('addr_country' => ''));
            
            $result = $this->User->validates(array('fieldList' => array('addr_country')));
            
            $this->assertFalse($result, 'Permitiu cadastro de usuário sem país');
        }
        
       
        public function testNotEmptyZipCode() {
            $this->User->set(array('addr_zip_code' => ''));
            
            $result = $this->User->validates(array('fieldList' => array('addr_zip_code')));
            
            $this->assertFalse($result, 'Permitiu cadastro de usuário sem CEP');
        }
        
       
        public function testNotEmptyPhone() {
            $this->User->set(array('phone' => ''));
            
            $result = $this->User->validates(array('fieldList' => array('phone')));
            
            $this->assertFalse($result, 'Permitiu cadastro de usuário sem telefone');
        }
        
         
        public function testFullEnroll() {
            
            $this->User->create();
            
            $this->User->save($this->userData());
            
            $result = $this->User->validates();
            
            $this->assertTrue($result, 'Não realizou o cadastro');
            
        }
        
        public function testEditUser() 
        {
            
            $data = $this->userData();
            $firsName = $data['User']['name'];
           
            $this->User->create();
            $this->User->save($data);
            
            $data['User']['id'] = 1;
            $data['User']['name'] = 'Teste';
            $data['User']['password'] = '';
            $data['User']['password_confirm'] = '';
            
            $this->User->create();
            $this->User->save($data);
            
            $result = $this->User->read(null, $data['User']['id']);
            
            $this->assertNotEqual($firsName, $result['User']['name']);
            $this->assertEqual($data['User']['name'], $result['User']['name']);
            
        }
        
        
        /**
         * 
         */
        public function testPassRecover() {
            $pass = $this->User->passRecover();
            
            $this->assertNotEqual($pass, null, 'Não gerou nova senha');
        }
        

}
