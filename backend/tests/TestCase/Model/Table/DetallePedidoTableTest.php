<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DetallePedidoTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DetallePedidoTable Test Case
 */
class DetallePedidoTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DetallePedidoTable
     */
    protected $DetallePedido;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.DetallePedido',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('DetallePedido') ? [] : ['className' => DetallePedidoTable::class];
        $this->DetallePedido = $this->getTableLocator()->get('DetallePedido', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->DetallePedido);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\DetallePedidoTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
