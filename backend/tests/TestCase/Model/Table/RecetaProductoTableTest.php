<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RecetaProductoTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RecetaProductoTable Test Case
 */
class RecetaProductoTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RecetaProductoTable
     */
    protected $RecetaProducto;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.RecetaProducto',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('RecetaProducto') ? [] : ['className' => RecetaProductoTable::class];
        $this->RecetaProducto = $this->getTableLocator()->get('RecetaProducto', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->RecetaProducto);

        parent::tearDown();
    }
}
