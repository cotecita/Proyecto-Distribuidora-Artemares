<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ImagenProductoFixture
 */
class ImagenProductoFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'imagen_producto';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id_imagen' => 1,
                'id_producto' => 1,
                'url_small' => 'Lorem ipsum dolor sit amet',
                'url_medium' => 'Lorem ipsum dolor sit amet',
                'url_grande' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
