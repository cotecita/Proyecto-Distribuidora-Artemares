<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * CashBalances Controller
 *
 * @property \App\Model\Table\CashBalancesTable $CashBalances
 */
class CashBalancesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->CashBalances->find();
        $cashBalances = $this->paginate($query);

        $this->set(compact('cashBalances'));
    }

    /**
     * View method
     *
     * @param string|null $id Cash Balance id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cashBalance = $this->CashBalances->get($id, contain: []);
        $this->set(compact('cashBalance'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cashBalance = $this->CashBalances->newEmptyEntity();
        if ($this->request->is('post')) {
            $cashBalance = $this->CashBalances->patchEntity($cashBalance, $this->request->getData());
            if ($this->CashBalances->save($cashBalance)) {
                $this->Flash->success(__('The cash balance has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cash balance could not be saved. Please, try again.'));
        }
        $this->set(compact('cashBalance'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Cash Balance id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cashBalance = $this->CashBalances->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cashBalance = $this->CashBalances->patchEntity($cashBalance, $this->request->getData());
            if ($this->CashBalances->save($cashBalance)) {
                $this->Flash->success(__('The cash balance has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cash balance could not be saved. Please, try again.'));
        }
        $this->set(compact('cashBalance'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Cash Balance id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cashBalance = $this->CashBalances->get($id);
        if ($this->CashBalances->delete($cashBalance)) {
            $this->Flash->success(__('The cash balance has been deleted.'));
        } else {
            $this->Flash->error(__('The cash balance could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
