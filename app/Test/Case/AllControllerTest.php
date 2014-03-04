<?php 
App::uses('CakeTestSuite', 'TestSuite');

class AllControllerTest extends CakeTestSuite {
    public static function suite() {
        $suite = new CakeTestSuite('All Controller Tests');
        $suite->addTestDirectory(TESTS . 'Case' . DS . 'Controller');
        return $suite;
    }
}
