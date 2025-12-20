<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\I18n\FrozenDate;

/**
 * CashBalances Controller
 *
 * @property \App\Model\Table\CashBalancesTable $CashBalances
 */
class CashBalancesController extends AppController
{
    public function add()
    {
        $cashBalance = $this->CashBalances->newEmptyEntity();

        //  Calcular expected_amount SIEMPRE (GET y POST)
        $ordersTable = $this->fetchTable('Orders');
        $orders = $ordersTable->find('closedToday')->all();

        $expectedAmount = 0;
        foreach ($orders as $order) {
            foreach ($order->products as $product) {
                $expectedAmount +=
                    $product->price * $product->_joinData->quantity;
            }
        }

        // Para mostrar en la vista
        $cashBalance->expected_amount = $expectedAmount;

        if ($this->request->is('post')) {

            //  Datos ingresados por el usuario
            $cashBalance = $this->CashBalances->patchEntity(
                $cashBalance,
                $this->request->getData()
            );

            //  Reasignar expected_amount (seguridad)
            $cashBalance->expected_amount = $expectedAmount;

            //  Calcular diferencia
            $cashBalance->difference =
                $cashBalance->actual_amount - $expectedAmount;

            // Calcular estado 
            if ($cashBalance->difference == 0) {
                $cashBalance->status = 'OK';
            } else {
                $cashBalance->status = 'MISMATCH';
            }
            if (!$this->CashBalances->save($cashBalance)) {
                debug($cashBalance->getErrors());
                die;
            }
            //  Guardar
            try {
                if ($this->CashBalances->save($cashBalance)) {
                    $this->Flash->success('Cash balance saved successfully.');
                    return $this->redirect(['action' => 'index']);
                }
            } catch (\PDOException $e) {
                $this->Flash->error(
                    'A cash balance for this date already exists.'
                );
            }

            $this->Flash->error('The cash balance could not be saved.');
        }

        $this->set(compact('cashBalance', 'expectedAmount'));
    }

    public function index()
    {
        $cashBalances = $this->CashBalances
            ->find()
            ->order(['balance_date' => 'DESC'])
            ->all();
        
        // Últimos 7 días
        $startDate = FrozenDate::today()->subDays(6);


        $last7Days = $this->CashBalances
            ->find()
            ->select([
                'balance_date',
                'expected_amount',
                'actual_amount'
            ])
            ->where([
                'balance_date >=' => $startDate->format('Y-m-d')
            ])
            ->order(['balance_date' => 'ASC'])
            ->enableHydration(false)
            ->toArray();

        $labels = [];
        $expectedData = [];
        $actualData = [];

        foreach ($last7Days as $row) {
            $labels[] = $row['balance_date']->format('d-m');
            $expectedData[] = (float)$row['expected_amount'];
            $actualData[] = (float)$row['actual_amount'];
        }

        $this->set(compact(
            'cashBalances',
            'labels',
            'expectedData',
            'actualData'
        ));
        #$this->set(compact('cashBalances'));
    }

    public function today()
    {
        $today = FrozenDate::today();

        // Obtener la cuadratura de hoy
        $cashBalance = $this->CashBalances
            ->find()
            ->where(['balance_date' => $today])
            ->first();

        if (!$cashBalance) {
            $this->Flash->error('No existe cuadratura registrada para hoy.');
            return $this->redirect(['action' => 'index']);
        }

        // Obtener pedidos cerrados de hoy
        $ordersTable = $this->fetchTable('Orders');
        $orders = $ordersTable
            ->find('closedToday')
            ->contain(['Products'])
            ->all();

        //  Calcular totales por pedido
        $totalDia = 0;
        $totalesPorPedido = [];

        foreach ($orders as $order) {
            $totalPedido = 0;

            foreach ($order->products as $product) {
                $totalPedido +=
                    $product->price * $product->_joinData->quantity;
            }

            $totalesPorPedido[$order->id] = $totalPedido;
            $totalDia += $totalPedido;
        }

        //Enviar datos a la vista
        $this->set(compact(
            'cashBalance',
            'totalesPorPedido',
            'totalDia',
            'today'
        ));
    }

    public function view($id = null)
    {
        $cashBalance = $this->CashBalances->get($id);

        $this->set(compact('cashBalance'));
    }

    
}
