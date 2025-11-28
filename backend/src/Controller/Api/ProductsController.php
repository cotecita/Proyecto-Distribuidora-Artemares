<?php
declare(strict_types=1);

namespace App\Controller\Api;

use App\Controller\AppController;

class ProductsController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->request->allowMethod(['get']); 
        $this->viewBuilder()->setClassName('Json');
    }

    public function index()
    {

        $products = $this->Products->find('all')
            ->contain(['Categories']) 
            ->toArray();

        $this->set([
            'products' => $products,
            '_serialize' => ['products']
        ]);
    }
}

