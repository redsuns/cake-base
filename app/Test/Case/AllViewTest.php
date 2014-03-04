<?php 
App::uses('CakeTestSuite', 'TestSuite');

class AllViewTest extends CakeTestSuite {
    public static function suite() {
        $suite = new CakeTestSuite('All View Tests');
        $suite->addTestDirectoryRecursive(TESTS . 'Case' . DS . 'View');
        
        return $suite;
    }
}
