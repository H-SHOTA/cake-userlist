<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * UserMasters Controller
 *
 * @property \App\Model\Table\UserMastersTable $UserMasters
 */
class UserMastersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->viewBuilder()->layout('layout');
        
        $this->set('title', 'ユーザー管理TOP');

        $this->loadModel('DepartmentMasters');
        
        $query = $this->DepartmentMasters->find()->contain(['SectionMasters']);
        $sections = $this->paginate($query);
        $this->set(compact('sections'));

        $userMasters = $this->UserMasters->find('all');
        $this->set(compact('userMasters'));
        $this->set('_serialize', ['userMasters', 'sections']);
    }

    /**
     * View method
     *
     * @param string|null $id User Master id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $userMaster = $this->UserMasters->get($id, [
            'contain' => []
        ]);

        $this->set('userMaster', $userMaster);
        $this->set('_serialize', ['userMaster']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $userMaster = $this->UserMasters->newEntity();
        if ($this->request->is('post')) {
            $userMaster = $this->UserMasters->patchEntity($userMaster, $this->request->data);
            if ($this->UserMasters->save($userMaster)) {
                $this->Flash->success(__('The user master has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user master could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('userMaster'));
        $this->set('_serialize', ['userMaster']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User Master id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $userMaster = $this->UserMasters->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userMaster = $this->UserMasters->patchEntity($userMaster, $this->request->data);
            if ($this->UserMasters->save($userMaster)) {
                $this->Flash->success(__('The user master has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user master could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('userMaster'));
        $this->set('_serialize', ['userMaster']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User Master id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $userMaster = $this->UserMasters->get($id);
        if ($this->UserMasters->delete($userMaster)) {
            $this->Flash->success(__('The user master has been deleted.'));
        } else {
            $this->Flash->error(__('The user master could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
