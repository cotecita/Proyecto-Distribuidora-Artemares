<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InformacionNutricionalTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InformacionNutricionalTable Test Case
 */
class InformacionNutricionalTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\InformacionNutricionalTable
     */
    protected $InformacionNutricional;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.InformacionNutricional',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('InformacionNutricional') ? [] : ['className' => InformacionNutricionalTable::class];
        $this->InformacionNutricional = $this->getTableLocator()->get('InformacionNutricional', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->InformacionNutricional);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\InformacionNutricionalTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @link \App\Model\Table\InformacionNutricionalTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
