<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ImagenProductoTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ImagenProductoTable Test Case
 */
class ImagenProductoTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ImagenProductoTable
     */
    protected $ImagenProducto;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.ImagenProducto',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('ImagenProducto') ? [] : ['className' => ImagenProductoTable::class];
        $this->ImagenProducto = $this->getTableLocator()->get('ImagenProducto', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->ImagenProducto);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\ImagenProductoTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
