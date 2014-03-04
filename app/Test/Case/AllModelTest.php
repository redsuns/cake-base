<?php 
App::uses('CakeTestSuite', 'TestSuite');

class AllModelTest extends CakeTestSuite {
    public static function suite() {
        $suite = new CakeTestSuite('All Model Tests');
        $suite->addTestDirectoryRecursive(TESTS . 'Case' . DS . 'Model');
        
        return $suite;
    }
}
