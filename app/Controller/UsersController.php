<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {

    
    /**
     * 
     */
    public function login() {
        if ( $this->request->is('post') ) {
            if ( $this->Auth->login() ) {
                $this->Session->setFlash('Login realizado com sucesso!', 'default', array('class' => 'alert alert-succes'));
                $this->redirect($this->Auth->redirectUrl());
            }
            $this->Session->setFlash('Dados de login inválidos, por favor tente novamente.', 'default', array('class' => 'alert alert-error'));
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
				$this->Session->setFlash('Cadastro realizado com sucesso!', 'default', array('class' => 'alert alert-success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('Não foi possível realizar o cadastro, por favor tente novamente.', 'default', array('class' => 'alert alert-error'));
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
				$this->Session->setFlash('Dados editados com sucesso!', 'default', array('class' => 'alert alert-success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('Não foi possível editar os dados, por favor tente novamente.', 
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
			$this->Session->setFlash('Perfil removido com sucesso!', 'default', array('class' => 'alert alert-success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Não foi possível remover o seu perfil, por favor tente novamente.', 
                        'default', array('class' => 'alert alert-error'));
		$this->redirect(array('action' => 'index'));
	}
}
