<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\XmlCountriesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\XmlCountriesTable Test Case
 */
class XmlCountriesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\XmlCountriesTable
     */
    protected $XmlCountries;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.XmlCountries',
        'app.XmlSheets',
        'app.XmlSubmissions',
        'app.XmlVisatypes',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('XmlCountries') ? [] : ['className' => XmlCountriesTable::class];
        $this->XmlCountries = $this->getTableLocator()->get('XmlCountries', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->XmlCountries);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\XmlCountriesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\XmlCountriesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
