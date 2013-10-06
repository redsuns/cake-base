<?php
class DATABASE_CONFIG {

	public $default = array(
		'datasource' => 'Database/Mysql',
		'persistent' => false,
		'host' => 'localhost',
		'login' => 'root',
		'password' => 'masterkey',
		'database' => 'cake',
		'prefix' => '',
		'encoding' => 'utf8'
	);
        
        public $test = array(
		'datasource' => 'Database/Sqlite',
		'database' => ':memory:',
	);
}
