<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\WorkingcountriesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\WorkingcountriesTable Test Case
 */
class WorkingcountriesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\WorkingcountriesTable
     */
    protected $Workingcountries;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Workingcountries',
        'app.Countries',
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Workingcountries') ? [] : ['className' => WorkingcountriesTable::class];
        $this->Workingcountries = $this->getTableLocator()->get('Workingcountries', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Workingcountries);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\WorkingcountriesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\WorkingcountriesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
