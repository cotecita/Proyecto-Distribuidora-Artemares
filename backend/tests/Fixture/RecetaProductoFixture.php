<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RecetaProductoFixture
 */
class RecetaProductoFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'receta_producto';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id_receta' => 1,
                'id_producto' => 1,
            ],
        ];
        parent::init();
    }
}
