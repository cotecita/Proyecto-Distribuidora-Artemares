<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ImagenRecetaTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ImagenRecetaTable Test Case
 */
class ImagenRecetaTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ImagenRecetaTable
     */
    protected $ImagenReceta;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.ImagenReceta',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('ImagenReceta') ? [] : ['className' => ImagenRecetaTable::class];
        $this->ImagenReceta = $this->getTableLocator()->get('ImagenReceta', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->ImagenReceta);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\ImagenRecetaTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
