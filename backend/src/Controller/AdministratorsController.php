<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Administrators Controller
 *
 * @property \App\Model\Table\AdministratorsTable $Administrators
 */
class AdministratorsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Administrators->find();
        $administrators = $this->paginate($query);

        $this->set(compact('administrators'));
    }

    /**
     * View method
     *
     * @param string|null $id Administrator id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $administrator = $this->Administrators->get($id, contain: []);
        $this->set(compact('administrator'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $administrator = $this->Administrators->newEmptyEntity();
        if ($this->request->is('post')) {
            $administrator = $this->Administrators->patchEntity($administrator, $this->request->getData());
            if ($this->Administrators->save($administrator)) {
                $this->Flash->success(__('The administrator has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The administrator could not be saved. Please, try again.'));
        }
        $this->set(compact('administrator'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Administrator id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $administrator = $this->Administrators->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $administrator = $this->Administrators->patchEntity($administrator, $this->request->getData());
            if ($this->Administrators->save($administrator)) {
                $this->Flash->success(__('The administrator has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The administrator could not be saved. Please, try again.'));
        }
        $this->set(compact('administrator'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Administrator id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $administrator = $this->Administrators->get($id);
        if ($this->Administrators->delete($administrator)) {
            $this->Flash->success(__('The administrator has been deleted.'));
        } else {
            $this->Flash->error(__('The administrator could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
