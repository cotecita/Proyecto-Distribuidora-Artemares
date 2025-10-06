<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProductoFixture
 */
class ProductoFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'producto';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id_producto' => 1,
                'nombre' => 'Lorem ipsum dolor sit amet',
                'descripcion' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'precio' => 1.5,
                'stock' => 1,
                'cantidad_formato' => 1.5,
                'formato' => 'Lorem ipsum dolor ',
                'id_categoria' => 1,
            ],
        ];
        parent::init();
    }
}
