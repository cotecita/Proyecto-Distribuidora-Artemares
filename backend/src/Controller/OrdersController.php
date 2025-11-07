<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Orders Controller
 *
 * @property \App\Model\Table\OrdersTable $Orders
 */
class OrdersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Orders->find();
        $orders = $this->paginate($query);

        $this->set(compact('orders'));
    }

    /**
     * View method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $order = $this->Orders->get($id, contain: ['Products']);
        $this->set(compact('order'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $order = $this->Orders->newEmptyEntity();

        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $errors = [];

            // Solo procesamos los productos seleccionados por el usuario
            if (!empty($data['products'])) {
                foreach ($data['products'] as $id => $prod) {
                    if (empty($prod['id'])) {
                        continue;
                    }
                    $quantity = $prod['_joinData']['quantity'] ?? null;

                    if (empty($quantity) || !is_numeric($quantity) || $quantity <= 0) {
                        $errors[] = "La cantidad para el producto seleccionado no es válida.";
                        continue;
                    }

                    $product = $this->Orders->Products->get($id);

                    // Validamos stock
                    if ($quantity > $product->stock) {
                        $errors[] = "El producto '{$product->name}' no tiene suficiente stock (disponible: {$product->stock}).";
                    }
                }
            } else {
                $errors[] = "No se seleccionó ningún producto.";
            }

            // Si hay errores, mostramos mensajes y no guardamos
            if (!empty($errors)) {
                foreach ($errors as $err) {
                    $this->Flash->error($err);
                }
            } else {
                // No hay errores, guardamos el pedido tal como el usuario lo seleccionó
                $order = $this->Orders->patchEntity($order, $data, [
                    'associated' => ['Products._joinData']
                ]);

                if ($this->Orders->save($order)) {
                    $this->Flash->success(__('El pedido se ha creado correctamente.'));
                    return $this->redirect(['action' => 'index']);
                }

                $this->Flash->error(__('No se pudo guardar el pedido. Intenta nuevamente.'));
            }
        }

        $products = $this->Orders->Products->find('all')->toArray();
        $this->set(compact('order', 'products'));
    }



    /**
     * Edit method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $order = $this->Orders->get($id, contain: ['Products']);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $order = $this->Orders->patchEntity($order, $this->request->getData());
            if ($this->Orders->save($order)) {
                $this->Flash->success(__('The order has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The order could not be saved. Please, try again.'));
        }
        $products = $this->Orders->Products->find('list', limit: 200)->all();
        $this->set(compact('order', 'products'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $order = $this->Orders->get($id);
        if ($this->Orders->delete($order)) {
            $this->Flash->success(__('The order has been deleted.'));
        } else {
            $this->Flash->error(__('The order could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
