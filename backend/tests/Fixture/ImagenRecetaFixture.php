<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ImagenRecetaFixture
 */
class ImagenRecetaFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'imagen_receta';
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
                'id_receta' => 1,
                'url_small' => 'Lorem ipsum dolor sit amet',
                'url_medium' => 'Lorem ipsum dolor sit amet',
                'url_grande' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
