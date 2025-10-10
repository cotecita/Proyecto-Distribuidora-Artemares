<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Receta Controller
 *
 * @property \App\Model\Table\RecetaTable $Receta
 */
class RecetaController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Receta->find();
        $receta = $this->paginate($query);

        $this->set(compact('receta'));
    }

    /**
     * View method
     *
     * @param string|null $id Receta id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $receta = $this->Receta->get($id, contain: ['Producto']);
        $this->set(compact('receta'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $receta = $this->Receta->newEmptyEntity();
        if ($this->request->is('post')) {
            $receta = $this->Receta->patchEntity($receta, $this->request->getData());
            if ($this->Receta->save($receta)) {
                $this->Flash->success(__('The receta has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The receta could not be saved. Please, try again.'));
        }
        $producto = $this->Receta->Producto->find('list', limit: 200)->all();
        $this->set(compact('receta', 'producto'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Receta id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $receta = $this->Receta->get($id, contain: ['Producto']);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $receta = $this->Receta->patchEntity($receta, $this->request->getData());
            if ($this->Receta->save($receta)) {
                $this->Flash->success(__('The receta has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The receta could not be saved. Please, try again.'));
        }
        $producto = $this->Receta->Producto->find('list', limit: 200)->all();
        $this->set(compact('receta', 'producto'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Receta id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $receta = $this->Receta->get($id);
        if ($this->Receta->delete($receta)) {
            $this->Flash->success(__('The receta has been deleted.'));
        } else {
            $this->Flash->error(__('The receta could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
