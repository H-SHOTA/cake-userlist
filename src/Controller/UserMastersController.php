<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * UserMasters Controller
 *
 * @property \App\Model\Table\UserMastersTable $UserMasters
 */
class UserMastersController extends AppController
{

    private function getUserList($departmentcd, $deleteflg)
    {
        $userMasters =  $this->UserMasters->find()
                        ->hydrate(false)
                        ->join([
                            'c' => [
                                'table' => 'department_masters',
                                'type' => 'INNER',
                                'conditions' => 'c.departmentcd = UserMasters.departmentcd',
                            ],
                            'd' => [
                                'table' => 'section_masters',
                                'type' => 'LEFT',
                                'conditions' => 'c.sectioncd = d.sectioncd',
                            ],
                        ])->select([
                            "uid" => "UserMasters.uid",
                            "familyname" => "UserMasters.familyname",
                            "firstname" => "UserMasters.firstname",
                            "mailaddress" => "UserMasters.mailaddress",
                            "deleteflg" => "UserMasters.deleteflg",
                            "departmentcd" => "c.departmentcd",
                            "departmentname" => "c.departmentname",
                            "sectionname" => 'd.sectionname'
                        ]);
        $conditions = array();
        (!empty($departmentcd))?($conditions[] = 'c.departmentcd='.$departmentcd):'';
        ($deleteflg == 'on')?'':$conditions[] = 'UserMasters.deleteflg=0';
        return $userMasters->where($conditions);
    }
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

        $userMasters = $this->getUserList(
            $this->request->data('department'), $this->request->data('containDlt'));

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
        $this->autoRender = false;
        $this->viewBuilder()->layout('layout');
        if ($this->request->is('post')) {
            if (!is_null($this->request->data('confirm'))) {
                $this->set('title', 'ユーザー登録確認');
                $this->loadModel('DepartmentMasters');
                $query = $this->DepartmentMasters
                    ->find()
                        ->hydrate(false)
                    ->contain(['SectionMasters'])
                    ->where('departmentcd='.$this->request->data('department'));
                $section = $this->paginate($query);
                $this->set('data', $this->request->data);
                $this->set('section', $section->first());
                $this->render('confirm');  
            } elseif (!is_null($this->request->data('regist'))) {
                $this->set('title', 'ユーザー登録完了');
                $table = TableRegistry::get('user_masters');
                // 新しいクエリを始めます。
                $query = $table->find();
                
                $data =[
                        'uid' => ($query->select(['max' => $query->func()->max('uid')])->first()['max'] + 1), 
                        'departmentcd' => $this->request->data('department'),
                        'familyname' => $this->request->data('sei'),
                        'firstname' => $this->request->data('mei'),
                        'familykana' => $this->request->data('seiKana'),
                        'firstkana' => $this->request->data('meiKana'),
                        'mailaddress' => $this->request->data('mailaddress'),
                        'deleteflg' => (($this->request->data('deleteflg') == 'delete')?'1':'0'),
                        'insdate' => date('Y-m-d H:i:s'),
                        'lastupdate' => date('Y-m-d H:i:s')
                    ];
                $query->insert( ['uid', 
                     'departmentcd',
                     'familyname',
                     'firstname',
                     'familykana',
                     'firstkana',
                     'mailaddress',
                     'deleteflg',
                     'insdate',
                     'lastupdate']);
                $query->values($data);
                $query->execute();
                
                $this->loadModel('DepartmentMasters');
                $query = $this->DepartmentMasters
                    ->find()
                        ->hydrate(false)
                    ->contain(['SectionMasters'])
                    ->where('departmentcd='.$this->request->data('department'));
                $section = $this->paginate($query);
                $this->set('data', $this->request->data);
                $this->set('section', $section->first());
                $this->render('confirm');  
            }
        } else {
            $this->set('title', 'ユーザー新規登録');
            $this->loadModel('DepartmentMasters');
             
            $query = $this->DepartmentMasters->find()->contain(['SectionMasters']);
            $sections = $this->paginate($query);

            $this->set('sections', $sections);
            $this->render('edit');  
        }
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
