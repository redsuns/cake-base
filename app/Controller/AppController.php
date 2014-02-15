<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
    
    public $components = array('Session', 'Auth' => array('authorize' => 'Controller'), 'DebugKit.Toolbar', 'Redirects');
    public $helpers = array('Js');
    
    
    public function beforeFilter() 
    {
        $this->Redirects->apply($this->request->url);
        
        $this->Auth->authenticate = array('Blowfish' => array(
                'userModel' => 'User'
        ));
        
        $this->Auth->loginAction = array(
            'controller' => 'users',
            'action' => 'login'
        );
        
        $this->Auth->deny();
        $whiteList = array();
        

//        if ( $this->Auth->user() ) {
//            $this->Auth->allow();
//        } else {
//            $this->Auth->allow($whiteList);
//        }
        $this->Auth->allow();
        
        $this->Auth->authError = 'Suas permissões não concedem acesso ao recurso solicitado.';
        
        if ( $this->Auth->user() && !$this->isAuthorized() ) {
            $this->Session->setFlash($this->Auth->authError, 'default', array('class' => 'alert alert-error'));
            $this->redirect('/');
        }
        
        if ( $this->params['prefix'] == 'admin' ) {
            $this->layout = 'admin';
        }
        
        $this->set('keywords', '');
        $this->set('description', '');
        
        parent::beforeFilter();
    }
    
    
    /**
     * 
     * @return boolean
     */
    public function isAuthorized() 
    {
        // Any registered user can access public functions
        if (empty($this->request->params['admin'])) {
            return true;
        }

        // Only admins can access admin functions
        if (isset($this->request->params['admin'])) {
            return (bool)($this->Auth->user('group_id') === '1');
        }

        // Default deny
        return false;
    }
    
}
