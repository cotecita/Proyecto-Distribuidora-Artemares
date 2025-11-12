<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Dashboard Controller
 *
 */

class DashboardController extends AppController
{
    public function index()
    {
        $productsTable = $this->getTableLocator()->get('Products');
        $categoriesTable = $this->getTableLocator()->get('Categories');
        $ordersTable = $this->getTableLocator()->get('Orders');
        $ordersProductsTable = $this->getTableLocator()->get('OrdersProducts');

        // 1. total de productos
        $totalProducts = $productsTable->find()->count();

        // 2. total de categorías
        $totalCategories = $categoriesTable->find()->count();

        // 3. top 5 productos mas vendidos
        $productsMostSold = $ordersProductsTable->find()
            ->select([
                'product_id',
                'total_quantity' => 'SUM(OrdersProducts.quantity)',
                'Products__name' => 'Products.name' 
            ])
            ->matching('Orders', function ($q) {
                return $q->where(['Orders.status' => 'closed']);
            })
            ->matching('Products')
            ->group(['OrdersProducts.product_id', 'Products.name'])
            ->order(['total_quantity' => 'DESC'])
            ->limit(5)
            ->all();

        // 4. productos por categoria
        $productsByCategory = $categoriesTable->find()
            ->select([
                'id',
                'name',
                'total_products' => $categoriesTable->Products->find()->func()->count('Products.id')
            ])
            ->leftJoinWith('Products')
            ->group(['Categories.id'])
            ->all();

        // 5. pedidos en proceso
        $pendingOrders = $ordersTable->find()
            ->where(['status' => 'in_process'])
            ->order(['created' => 'DESC']);

        // 6. 5 pedidos mas recientes
        $recentOrders = $ordersTable->find()
            ->order(['created' => 'DESC'])
            ->limit(5);

        // 7. alerta pedidos pendientes: in process
        $alerts = $pendingOrders;

        // 8. accesos rápidos
        $quickAccess = [
            ['label' => 'Agregar Producto', 'url' => ['controller' => 'Products', 'action' => 'add']],
            ['label' => 'Agregar Pedido', 'url' => ['controller' => 'Orders', 'action' => 'add']],
            ['label' => 'Ver Pedidos', 'url' => ['controller' => 'Orders', 'action' => 'index']],
            ['label' => 'Ver Categorías', 'url' => ['controller' => 'Categories', 'action' => 'index']],
        ];

        // 9. Evolución de ventas por fecha
        $salesEvolution = $ordersProductsTable->find()
            ->select([
                'date' => 'DATE(OrdersProducts.created)',
                'total_quantity' => 'SUM(OrdersProducts.quantity)'
            ])
            ->matching('Orders', function ($q) {
                return $q->where(['Orders.status' => 'closed']);
            })
            ->group('date')
            ->order(['date' => 'ASC'])
            ->all();

        $this->set(compact(
            'totalProducts',
            'totalCategories',
            'productsMostSold',
            'productsByCategory',
            'pendingOrders',
            'recentOrders',
            'alerts',
            'quickAccess',
            'salesEvolution'
        ));
    }
}