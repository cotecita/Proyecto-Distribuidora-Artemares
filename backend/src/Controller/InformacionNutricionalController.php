<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * InformacionNutricional Controller
 *
 * @property \App\Model\Table\InformacionNutricionalTable $InformacionNutricional
 */
class InformacionNutricionalController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->InformacionNutricional->find();
        $informacionNutricional = $this->paginate($query);

        $this->set(compact('informacionNutricional'));
    }

    /**
     * View method
     *
     * @param string|null $id Informacion Nutricional id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $informacionNutricional = $this->InformacionNutricional->get($id, contain: []);
        $this->set(compact('informacionNutricional'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $informacionNutricional = $this->InformacionNutricional->newEmptyEntity();
        if ($this->request->is('post')) {
            $informacionNutricional = $this->InformacionNutricional->patchEntity($informacionNutricional, $this->request->getData());
            if ($this->InformacionNutricional->save($informacionNutricional)) {
                $this->Flash->success(__('The informacion nutricional has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The informacion nutricional could not be saved. Please, try again.'));
        }
        $this->set(compact('informacionNutricional'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Informacion Nutricional id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $informacionNutricional = $this->InformacionNutricional->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $informacionNutricional = $this->InformacionNutricional->patchEntity($informacionNutricional, $this->request->getData());
            if ($this->InformacionNutricional->save($informacionNutricional)) {
                $this->Flash->success(__('The informacion nutricional has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The informacion nutricional could not be saved. Please, try again.'));
        }
        $this->set(compact('informacionNutricional'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Informacion Nutricional id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $informacionNutricional = $this->InformacionNutricional->get($id);
        if ($this->InformacionNutricional->delete($informacionNutricional)) {
            $this->Flash->success(__('The informacion nutricional has been deleted.'));
        } else {
            $this->Flash->error(__('The informacion nutricional could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
