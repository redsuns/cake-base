<?php
App::uses('AppController', 'Controller');
/**
 * Groups Controller
 *
 * @property Group $Group
 */
class GroupsController extends AppController {

    
    public function admin_index() {
            $this->Group->recursive = 0;
            $this->set('groups', $this->paginate());
    }
    
    
    public function admin_add() {
		if ($this->request->is('post')) {
			$this->Group->create();
			if ($this->Group->save($this->request->data)) {
				$this->Session->setFlash('<p>Perfil adicionado</p>', 'default', array('class' => 'notification msgsuccess'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('<p>Não foi possível adicionar o perfil, por favor tente novamente.</p>', 'default', array('class' => 'notification msgerror'));
			}
		}
	}
        
        
        public function admin_delete($id = null) {
		$this->Group->id = $id;
		if (!$this->Group->exists()) {
			throw new NotFoundException(__('Invalid group'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Group->delete()) {
			$this->Session->setFlash('<p>Perfil removido com sucesso!</p>', 'default', array('class' => 'notification msgsuccess'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('<p>Não foi possível remover o perfil</p>', 'default', array('class' => 'notification msgerror'));
		$this->redirect(array('action' => 'index'));
	}
    
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Group->recursive = 0;
		$this->set('groups', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Group->exists($id)) {
			throw new NotFoundException(__('Invalid group'));
		}
		$options = array('conditions' => array('Group.' . $this->Group->primaryKey => $id));
		$this->set('group', $this->Group->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Group->create();
			if ($this->Group->save($this->request->data)) {
				$this->Session->setFlash('Perfil adicionado', 'default', array('class' => 'alert alert-success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('Não foi possível adicionar o perfil, por favor tente novamente.', 'default', array('class' => 'alert alert-error'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Group->exists($id)) {
			throw new NotFoundException(__('Invalid group'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Group->save($this->request->data)) {
				$this->Session->setFlash('Perfil editado com sucesso!', 'default', array('class' => 'alert alert-success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('Não foi possível editar o perfil, por favor tente novamente.', 'default', array('class' => 'alert alert-error'));
			}
		} else {
			$options = array('conditions' => array('Group.' . $this->Group->primaryKey => $id));
			$this->request->data = $this->Group->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Group->id = $id;
		if (!$this->Group->exists()) {
			throw new NotFoundException(__('Invalid group'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Group->delete()) {
			$this->Session->setFlash('Perfil removido com sucesso!', 'default', array('class' => 'alert alert-success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Não foi possível remover o perfil', 'default', array('class' => 'alert alert-error'));
		$this->redirect(array('action' => 'index'));
	}
}
