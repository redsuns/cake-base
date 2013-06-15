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
		'celphone' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 15, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
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
			'created' => '2013-06-15 12:40:13',
			'modified' => '2013-06-15 12:40:13'
		),
                array(
			'id' => 2,
			'group_id' => 2,
			'name' => 'Lorem ipsum dolor sit amet',
			'surname' => 'Lorem ipsum dolor sit amet',
			'email' => 'Lorem ipsum dolor sit amet',
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
			'created' => '2013-06-15 12:40:13',
			'modified' => '2013-06-15 12:40:13'
		),
	);

}
