<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\XmlSheetsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\XmlSheetsTable Test Case
 */
class XmlSheetsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\XmlSheetsTable
     */
    protected $XmlSheets;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.XmlSheets',
        'app.Users',
        'app.XmlCountries',
        'app.XmlSubmissions',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('XmlSheets') ? [] : ['className' => XmlSheetsTable::class];
        $this->XmlSheets = $this->getTableLocator()->get('XmlSheets', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->XmlSheets);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\XmlSheetsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\XmlSheetsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
