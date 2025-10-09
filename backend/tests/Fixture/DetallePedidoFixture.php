<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DetallePedidoFixture
 */
class DetallePedidoFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'detalle_pedido';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id_detalle' => 1,
                'id_pedido' => 1,
                'id_producto' => 1,
                'cantidad' => 1,
            ],
        ];
        parent::init();
    }
}
