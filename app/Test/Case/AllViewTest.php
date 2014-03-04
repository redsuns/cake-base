<?php 
App::uses('CakeTestSuite', 'TestSuite');

class AllViewTest extends CakeTestSuite {
    public static function suite() {
        $suite = new CakeTestSuite('All View Tests');
        $suite->addTestDirectory(TESTS . 'Case' . DS . 'View/Helper');
        return $suite;
    }
}
