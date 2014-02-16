<?php
App::uses('AppController', 'Controller');
App::uses('CakeTime', 'Utility');

/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController 
{

    public $helpers = array('BrazilianStates');
    public $uses = array('User', 'Group');
    public $components = array('Email');
    
    
    /**
     * 
     */
    public function login() {
        if ( $this->request->is('post') ) {
            if ( $this->Auth->login() ) {
                $this->Session->setFlash(__('Logged with success'), 'default', array('class' => 'alert alert-succes'));
                $this->redirect($this->Auth->redirectUrl());
            }
            $this->Session->setFlash(__('Invalid login'), 'default', array('class' => 'alert alert-error'));
        }
    }
    
    
    
    /**
     * 
     */
    public function logout() {
        $this->Auth->logout();
        $this->redirect($this->Auth->redirectUrl());
    }
    
    /**
     * 
     */
    public function admin_login() {
        $this->layout = 'admin_login';
        
        if ( $this->request->is('post') ) {
            if ( $this->Auth->login() ) {
                $this->Session->setFlash('<p>'.__('Logged with success').'</p>', 'default', array('class' => 'notification msgsuccess'));
                $this->redirect('/admin/pages/index/home');
            }
            $this->Session->setFlash('<p>'.__('Invalid login').'</p>', 'default', array('class' => 'notification msgerror'));
        }
    }
    
    
    
    /**
     * 
     */
    public function admin_logout() {
        $this->Auth->logout();
        $this->redirect($this->Auth->redirectUrl());
    }
    
    
    /**
     * index method
     *
     * @return void
     */
    public function admin_index()
    {
        $this->User->recursive = 0;
        $this->paginate = array(
            'order' => array('created' => 'desc'),
            'conditions' => array('Group.id NOT' => 1));
        
        $this->set('users', $this->paginate('User'));
    }
    
    /**
     * 
     */
    public function admin_add() 
    {    
		if ($this->request->is('post')) {
                        
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash('<p>'.__('The user has been saved').'</p>', 'default', array('class' => 'notification msgsuccess'));
                                
                                if ( 1 == $this->request->data[$this->modelClass]['send_email'] ) {

                                    $this->Group->recursive = -1;
                                    $this->request->data['User']['group'] = $this->Group->read(null, $this->request->data['User']['group_id']);

                                    $this->Email->sendUserRegisterEmail($this->request->data, 'admin');
                                }
                                
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('<p>'.__('The user could not be saved. Please, try again.').'</p>', 'default', array('class' => 'notification msgerror'));
			}
		}
                
		$groups = $this->User->Group->find('list', array(
                    'conditions' => array(
                        'Group.id NOT' => 1
                    ),
                    'order' => array(
                        'name' => 'ASC'
                    )
                ));
		$this->set(compact('groups'));
	}
        
        /**
         * 
         * @param string $id
         * @throws NotFoundException
         */
        public function admin_delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash('<p>'.__('User deleted').'</p>', 'default', array('class' => 'notification msgsuccess'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('<p>'.__('User was not deleted').'</p>', 
                        'default', array('class' => 'notification msgerror'));
		$this->redirect(array('action' => 'index'));
	}
    
        /**
         * index method
         *
         * @return void
         */
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

        /**
         * view method
         *
         * @throws NotFoundException
         * @param string $id
         * @return void
         */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

        /**
         * add method
         *
         * @return void
         */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'), 'default', array('class' => 'alert alert-success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-error'));
			}
		}
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
	}

        /**
         * edit method
         *
         * @throws NotFoundException
         * @param string $id
         * @return void
         */
	public function edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'), 'default', array('class' => 'alert alert-success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'), 
                                        'default', array('class' => 'alert alert-error'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
	}

        /**
         * delete method
         *
         * @throws NotFoundException
         * @param string $id
         * @return void
         */
	public function delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('User deleted'), 'default', array('class' => 'alert alert-success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('User was not deleted'), 
                        'default', array('class' => 'alert alert-error'));
		$this->redirect(array('action' => 'index'));
	}
}
