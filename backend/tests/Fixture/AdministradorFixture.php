<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AdministradorFixture
 */
class AdministradorFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'administrador';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id_admin' => 1,
                'username' => 'Lorem ipsum dolor sit amet',
                'password' => 'Lorem ipsum dolor sit amet',
                'email' => 'Lorem ipsum dolor sit amet',
                'created_at' => 1759977950,
                'nombre_completo' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
