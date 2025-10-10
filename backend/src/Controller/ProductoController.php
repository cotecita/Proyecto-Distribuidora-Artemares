<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Producto Controller
 *
 * @property \App\Model\Table\ProductoTable $Producto
 */
class ProductoController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Producto->find();
        $producto = $this->paginate($query);

        $this->set(compact('producto'));
    }

    /**
     * View method
     *
     * @param string|null $id Producto id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $producto = $this->Producto->get($id, contain: ['Receta']);
        $this->set(compact('producto'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $producto = $this->Producto->newEmptyEntity();
        if ($this->request->is('post')) {
            $producto = $this->Producto->patchEntity($producto, $this->request->getData());
            if ($this->Producto->save($producto)) {
                $this->Flash->success(__('The producto has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The producto could not be saved. Please, try again.'));
        }

        // Aquí obtenemos las categorías como 'id => nombre'
        $categoria = $this->Producto->Categoria->find('list', [
            'keyField' => 'id_categoria',
            'valueField' => 'nombre'
        ])->order(['nombre' => 'ASC']);
        
        $this->set(compact('producto', 'categoria'));

        $receta = $this->Producto->Receta->find('list', limit: 200)->all();
        $this->set(compact('producto', 'receta'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Producto id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $producto = $this->Producto->get($id, contain: ['Receta']);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $producto = $this->Producto->patchEntity($producto, $this->request->getData());
            if ($this->Producto->save($producto)) {
                $this->Flash->success(__('The producto has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The producto could not be saved. Please, try again.'));
        }

        $categoria = $this->Producto->Categoria->find('list', [
            'keyField' => 'id_categoria',
            'valueField' => 'nombre'
        ])->order(['nombre' => 'ASC']);
        
        $this->set(compact('producto', 'categoria'));

        $receta = $this->Producto->Receta->find('list', limit: 200)->all();
        $this->set(compact('producto', 'receta'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Producto id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $producto = $this->Producto->get($id);
        if ($this->Producto->delete($producto)) {
            $this->Flash->success(__('The producto has been deleted.'));
        } else {
            $this->Flash->error(__('The producto could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
