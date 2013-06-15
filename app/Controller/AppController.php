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
    
    public $components = array('Session', 'Auth', 'Acl', 'DebugKit.Toolbar');
    
    
    public function beforeFilter() {
        
        // Mecanismo de autenticação            
        $this->Auth->authenticate = array('Blowfish' => array(
                // Configura o model e os campos
                'userModel' => 'User',
//                'fields' => array(
//                    'username' => 'email',
//                    'password' => 'senha',
//                ),
        ));
        
        
        
        $this->Auth->loginAction = array(
            'controller' => 'user',
            'action' => 'login'
        );

        
        $this->Auth->allow();

        $blackList = array();

        //$this->Auth->deny($blackList);
        
        
         // Iremos autorizar controllers e actions 
        $this->Auth->authorize = array(
            'Actions' => array('actionPath' => 'controllers')
        );

        //definindo a mensagem
        $this->Auth->authError = __('<div class="notification msgerror">
                                        <div class="alert alert-error">
                                            <p>
                                                Você precisa realizar o login 
                                                para acessar a área solicitada.
                                            </p>
                                        </div>
                                    </div>');
        
        parent::beforeFilter();
    }
    
}
