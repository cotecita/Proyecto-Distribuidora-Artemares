<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RecetaTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RecetaTable Test Case
 */
class RecetaTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RecetaTable
     */
    protected $Receta;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Receta',
        'app.Producto',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Receta') ? [] : ['className' => RecetaTable::class];
        $this->Receta = $this->getTableLocator()->get('Receta', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Receta);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\RecetaTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
