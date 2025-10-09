<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Administrador Controller
 *
 * @property \App\Model\Table\AdministradorTable $Administrador
 */
class AdministradorController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Administrador->find();
        $administrador = $this->paginate($query);

        $this->set(compact('administrador'));
    }

    /**
     * View method
     *
     * @param string|null $id Administrador id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $administrador = $this->Administrador->get($id, contain: []);
        $this->set(compact('administrador'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $administrador = $this->Administrador->newEmptyEntity();
        if ($this->request->is('post')) {
            $administrador = $this->Administrador->patchEntity($administrador, $this->request->getData());
            if ($this->Administrador->save($administrador)) {
                $this->Flash->success(__('The administrador has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The administrador could not be saved. Please, try again.'));
        }
        $this->set(compact('administrador'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Administrador id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $administrador = $this->Administrador->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $administrador = $this->Administrador->patchEntity($administrador, $this->request->getData());
            if ($this->Administrador->save($administrador)) {
                $this->Flash->success(__('The administrador has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The administrador could not be saved. Please, try again.'));
        }
        $this->set(compact('administrador'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Administrador id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $administrador = $this->Administrador->get($id);
        if ($this->Administrador->delete($administrador)) {
            $this->Flash->success(__('The administrador has been deleted.'));
        } else {
            $this->Flash->error(__('The administrador could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
