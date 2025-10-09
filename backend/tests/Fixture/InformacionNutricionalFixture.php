<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * InformacionNutricionalFixture
 */
class InformacionNutricionalFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'informacion_nutricional';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id_info' => 1,
                'id_producto' => 1,
                'medicion' => 'Lorem ipsum dolor sit amet',
                'calorias' => 1.5,
                'proteinas' => 1.5,
                'grasas_totales' => 1.5,
                'carbohidratos' => 1.5,
                'sodio' => 1.5,
                'colesterol' => 1.5,
            ],
        ];
        parent::init();
    }
}
