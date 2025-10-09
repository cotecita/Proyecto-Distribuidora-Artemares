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
     * @param string|null $id Recetum id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $recetum = $this->Receta->get($id, contain: ['Producto']);
        $this->set(compact('recetum'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $recetum = $this->Receta->newEmptyEntity();
        if ($this->request->is('post')) {
            $recetum = $this->Receta->patchEntity($recetum, $this->request->getData());
            if ($this->Receta->save($recetum)) {
                $this->Flash->success(__('The recetum has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The recetum could not be saved. Please, try again.'));
        }
        $producto = $this->Receta->Producto->find('list', limit: 200)->all();
        $this->set(compact('recetum', 'producto'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Recetum id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $recetum = $this->Receta->get($id, contain: ['Producto']);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $recetum = $this->Receta->patchEntity($recetum, $this->request->getData());
            if ($this->Receta->save($recetum)) {
                $this->Flash->success(__('The recetum has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The recetum could not be saved. Please, try again.'));
        }
        $producto = $this->Receta->Producto->find('list', limit: 200)->all();
        $this->set(compact('recetum', 'producto'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Recetum id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $recetum = $this->Receta->get($id);
        if ($this->Receta->delete($recetum)) {
            $this->Flash->success(__('The recetum has been deleted.'));
        } else {
            $this->Flash->error(__('The recetum could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
