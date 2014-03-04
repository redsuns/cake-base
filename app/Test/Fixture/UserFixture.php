<?php
/**
 * UserFixture
 *
 */
class UserFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'group_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'surname' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'email' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'username' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
                'password' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'address' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'addr_number' => array('type' => 'integer', 'null' => false, 'default' => null),
		'addr_complement' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'addr_district' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'addr_city' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'addr_state' => array('type' => 'string', 'null' => false, 'default' => 'PR', 'length' => 2, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'addr_country' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'addr_zip_code' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 10, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'phone' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 14, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'cellphone' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 15, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
                        'group_id' => 1,
                        'name' => 'Andre',
                        'surname' => 'Cardoso',
                        'email' => 'andrecardosodev@gmail.com',
                        'username' => 'andrecardosodev@gmail.com',
                        'password' => '$2a$10$5vi/KtPRGWFYPvhKsP0QteByyBQRS6rDLufAc5TEgKivJ/6AhkePS',
                        'address' => 'Rua teste',
                        'addr_number' => 1234,
                        'addr_complement' => '',
                        'addr_district' => 'Cajuru',
                        'addr_city' => 'Curitiba',
                        'addr_state' => 'PR',
                        'addr_country' => 'Brasil',
                        'addr_zip_code' => '88888-888',
                        'phone' => '(99) 9999-9999',
                        'cellphone' => '(99) 9999-9999',
                        'created' => '2014-02-15 00:00:00',
                        'modified' => '2014-02-15 00:00:00'
		),
                array(
			'id' => 2,
                        'group_id' => 1,
                        'name' => 'Andre',
                        'surname' => 'Cardoso',
                        'email' => 'sandrecardosodev@gmail.com',
                        'username' => 'sandrecardosodev@gmail.com',
                        'password' => '$2a$10$5vi/KtPRGWFYPvhKsP0QteByyBQRS6rDLufAc5TEgKivJ/6AhkePS',
                        'address' => 'Rua teste',
                        'addr_number' => 1234,
                        'addr_complement' => '',
                        'addr_district' => 'Cajuru',
                        'addr_city' => 'Curitiba',
                        'addr_state' => 'PR',
                        'addr_country' => 'Brasil',
                        'addr_zip_code' => '88888-888',
                        'phone' => '(99) 9999-9999',
                        'cellphone' => '(99) 9999-9999',
                        'created' => '2014-02-15 00:00:00',
                        'modified' => '2014-02-15 00:00:00'
		),
	);

}
