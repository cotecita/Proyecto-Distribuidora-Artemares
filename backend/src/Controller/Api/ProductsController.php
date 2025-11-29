<?php
declare(strict_types=1);

namespace App\Controller\Api;

use App\Controller\AppController;

class ProductsController extends AppController
{
    public function index()
    {
        // solo permitir GET
        $this->request->allowMethod(['get']);

        //obtener datos
        $products = $this->Products
            ->find()
            ->contain(['Categories'])
            ->all();

        // devolver json manual
        $response = $this->getResponse()
            ->withType('application/json')
            ->withStringBody(json_encode(['products' => $products], JSON_UNESCAPED_UNICODE));

        return $response;
    }
}
