<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PreferredCountriesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PreferredCountriesTable Test Case
 */
class PreferredCountriesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PreferredCountriesTable
     */
    protected $PreferredCountries;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.PreferredCountries',
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
        $config = $this->getTableLocator()->exists('PreferredCountries') ? [] : ['className' => PreferredCountriesTable::class];
        $this->PreferredCountries = $this->getTableLocator()->get('PreferredCountries', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->PreferredCountries);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\PreferredCountriesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
